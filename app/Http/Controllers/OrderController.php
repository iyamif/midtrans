<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use DB;
use Exception;
use Str;

class OrderController extends Controller
{

    public function index(Request $request){
        $name = $request->username;
        $phone = $request->phone;
        $total_price = $request->total_price;
        return view('home',compact('name', 'phone','total_price'));

    }

    public function companyProfile(){
        return view('company_profile');
    }

    public function katalog(){
        return view('katalog');
    }

    //order dari katalog
    public function checkout(Request $request){
        try{
            // $latestOrder = Order::orderBy('id', 'desc')->first();

            // $nextOrderId = $latestOrder ? $latestOrder->order_id + 1 : 1;

            DB::beginTransaction();
             // $order_id = Str::uuid();
            $order_code = Str::random(3).'-'.Date('Ymd');

            $order = Order::create([
                'shop_id' => 1,
                'order_code' => $order_code,
                'name' => $request->name,
                'phone' => '999999999',
                'address' => 'Jalan Dummy',
                'note' => 'Lorem Ipsum',
                'total' => $request->total_price,
                'status' => 0,
                'status_payment' => 'Unpaid'
            ]);

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;
            
            $params = array(
                'transaction_details' => array(
                    'order_id' => $order_code,
                    'gross_amount' =>$request->total_price,
                ),
                'customer_details' => array(
                    'first_name' => $request->name,
                    'last_name' => null,
                    'phone' => null
                ),
            );
            
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            DB::commit();
            return view('checkout', compact('snapToken', 'order'));
        }catch(\Exception $e){
            DB::rollBack();
            return redirect('/');
        }
        
    }

    //order langsung bypass
    public function saveOrder(Request $request){
        try{
            $order_code = Str::random(3).'-'.Date('Ymd');
            DB::beginTransaction();                                      

            $order = Order::create([
                'shop_id' => 1,
                'order_code' => $order_code,
                'name' => $request->name,
                'phone' => '999999999',
                'address' => 'Jalan Dummy',
                'note' => 'Lorem Ipsum',
                'total' => $request->total_price,
                'status' => 0,
                'status_payment' => 'Unpaid'
            ]);


                // Set your Merchant Server Key
                \Midtrans\Config::$serverKey = config('midtrans.server_key');
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = config('midtrans.is_production');
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = true;
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = true;  

            $params = array(
                'transaction_details' => array(
                    'order_id' => $order_code,
                    'gross_amount' =>$request->total_price,
                ),
                'customer_details' => array(
                    'first_name' => $request->name,
                    'last_name' => null,
                    'phone' => null
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            DB::commit();

            return response()->json(['status' => 'success', 'order_code'=>$order_code, 'token' => $snapToken],200);

            // return redirect()->route('clientOrderCode', $order_code);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['status' => 'failed'],500);
        }   
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' || $request->transaction_status == 'settlement'){
                $order = Order::where('order_code', $request->order_id)->first();
                $order->update(['status' => 9, 'status_payment' => 'Paid']);
            }else if($request->transaction_status == 'cancel'){
                $order = Order::where('order_code', $request->order_id)->first();
                $order->update(['status' => 0, 'status_payment' => 'Reject']);
            }
        }
    }
    public function invoice($id){
        $order = Order::where('order_code', $id)->first();
        return view('invoice', compact('order'));
    }

    public function getTransaksi()
    {
        $get_data = Order::all();
        // dd($get_data);
        $json = json_decode(json_encode($get_data));
        return response()->json(['status' => 'success', 'result' => $json]);
    }
}
