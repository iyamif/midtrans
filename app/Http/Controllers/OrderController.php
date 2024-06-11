<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(){
        return view('home');
    }

    public function katalog(){
        return view('katalog');
    }
    public function checkout(Request $request){
        $latestOrder = Order::orderBy('id', 'desc')->first();

        $nextOrderId = $latestOrder ? $latestOrder->id + 1 : 1;

        $order = Order::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'qty' => 1,
            'total_price' => $request->total_price,
            'status' => 'Unpaid'
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
                'order_id' => $nextOrderId,
                'gross_amount' =>$request->total_price,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'last_name' => null,
                'phone' => $request->phone
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
      
        return view('checkout', compact('snapToken', 'order'));
    }
    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' or $request->transaction_status == 'settlement'){
                $order = Order::find($request->order_id);
                $order->update(['status' => 'Paid']);
            }
        }
    }
    public function invoice($id){
        $order = Order::find($id);
        return view('invoice', compact('order'));
    }
}
