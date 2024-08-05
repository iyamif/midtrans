<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Order;
use Str;
use DB;

class PaymentController extends Controller
{
    //
    public function directApi()
    {

        return view('order');
    }

    public function paymentApi(Request $request)
    {
        $name = $request->input('name');
        $totalPrice = $request->input('total_price');
        $orderCode = Str::random(3).'-'.Date('Ymd');

        return view('payment', compact('name', 'totalPrice','orderCode'));
    }

    public function save(){

    }

    public function creditCard(Request $request)
    {

        try{
            DB::beginTransaction();
            // $serverKey = 'YOUR_SERVER_KEY'; // Ganti dengan server key Anda
            $orderID = $request->input('order_id');
            $grossAmount = $request->input('gross_amount');
            $token_id =    $request->input('token_id');
            $name =    $request->input('name');
            $serverKey = env('MIDTRANS_SERVER_KEY');

            $order = Order::create([
                'shop_id' => 1,
                'order_code' => $orderID,
                'name' => $name,
                'phone' => '999999999',
                'address' => 'Jalan Dummy',
                'note' => 'Lorem Ipsum',
                'total' => $grossAmount,
                'status' => 0,
                'status_payment' => 'Unpaid'
            ]);

            $data = [
                'payment_type' => 'credit_card',
                'transaction_details' => [
                    'order_id' => $orderID,
                    'gross_amount' => $grossAmount,
                ],
                'credit_card' => [
                    'token_id' => $token_id,
                    'authentication' => true
                ],
                // 'customer_details' => [
                // 	'first_name'
                // ],
            ];

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Authorization' => 'Basic TWlkLXNlcnZlci1yTXhvcVFQakhEck1rM0RKSUNwZ1UxUDk6',
                'Authorization' => 'Basic ' . base64_encode($serverKey . ':'),
                'Content-Type' => 'application/json',
            ])->post(env('URL_MIDTRANS'), $data);

            //	dd($response);

            if ($response->successful()) {
                DB::commit();
                return response()->json(['success' => true, 'data' => $response->json()],200);
            } else {
                DB::rollBack();
                return response()->json(['success' => false, 'error' => $response->json()], $response->status());
            }
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function virtualAccount(Request $request)
    {
        try{
            DB::beginTransaction();
            // $serverKey = 'YOUR_SERVER_KEY'; // Ganti dengan server key Anda
            $orderID = $request->input('order_id');
            $grossAmount = $request->input('gross_amount');
            $bank = $request->input('bank');
            $name =    $request->input('name');

            $serverKey = env('MIDTRANS_SERVER_KEY');

            $order = Order::create([
                'shop_id' => 1,
                'order_code' => $orderID,
                'name' => $name,
                'phone' => '999999999',
                'address' => 'Jalan Dummy',
                'note' => 'Lorem Ipsum',
                'total' => $grossAmount,
                'status' => 0,
                'status_payment' => 'Unpaid'
            ]);

            $data = [
                'payment_type' => 'bank_transfer',
                'transaction_details' => [
                    'order_id' => $orderID,
                    'gross_amount' => $grossAmount,
                ],
                'bank_transfer' => [
                    'bank' => $bank,
                ],
            ];

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                // 'Authorization' => 'Basic TWlkLXNlcnZlci1yTXhvcVFQakhEck1rM0RKSUNwZ1UxUDk6',
                'Authorization' => 'Basic ' . base64_encode($serverKey . ':'),
                'Content-Type' => 'application/json',
            ])->post(env('URL_MIDTRANS'), $data);

            //	dd($response);

            if ($response->successful()) {
                DB::commit();
                return response()->json(['success' => true, 'data' => $response->json()],200);
            } else {
                DB::rollBack();
                return response()->json(['success' => false, 'error' => $response->json()], $response->status());
            }
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
        
    }


    public function qris(Request $request)
    {
        try{
            DB::beginTransaction();

            $orderID = $request->input('order_id');
            $grossAmount = $request->input('gross_amount');
            $bank = $request->input('bank');
            $name =    $request->input('name');
    
            $serverKey = env('MIDTRANS_SERVER_KEY');

            $order = Order::create([
                'shop_id' => 1,
                'order_code' => $orderID,
                'name' => $name,
                'phone' => '999999999',
                'address' => 'Jalan Dummy',
                'note' => 'Lorem Ipsum',
                'total' => $grossAmount,
                'status' => 0,
                'status_payment' => 'Unpaid'
            ]);

    
            $data = [
                'payment_type' => 'qris',
                'transaction_details' => [
                    'order_id' => $orderID,
                    'gross_amount' => $grossAmount,
                ]
    
            ];
    
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode($serverKey . ':'),
                'Content-Type' => 'application/json',
                // ])->post('https://api.sandbox.midtrans.com/v2/charge', $data);
            ])->post(env('URL_MIDTRANS'), $data);
    
            //	dd($response);
    
            if ($response->successful()) {
                DB::commit();
                return response()->json(['success' => true, 'data' => $response->json()],200);
            } else {
                DB::rollBack();
                return response()->json(['success' => false, 'error' => $response->json()], $response->status());
            }

        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
       
    }

    public function gopay(Request $request)
    {
        try{
            DB::beginTransaction();

            $orderID = $request->input('order_id');
            $grossAmount = $request->input('gross_amount');
            $bank = $request->input('bank');
            $name =    $request->input('name');
    
            $serverKey = env('MIDTRANS_SERVER_KEY');

            $order = Order::create([
                'shop_id' => 1,
                'order_code' => $orderID,
                'name' => $name,
                'phone' => '999999999',
                'address' => 'Jalan Dummy',
                'note' => 'Lorem Ipsum',
                'total' => $grossAmount,
                'status' => 0,
                'status_payment' => 'Unpaid'
            ]);
    
            $data = [
                'payment_type' => 'gopay',
                'transaction_details' => [
                    'order_id' => $orderID,
                    'gross_amount' => $grossAmount,
                ]
    
            ];
    
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode($serverKey . ':'),
                'Content-Type' => 'application/json',
                // ])->post('https://api.sandbox.midtrans.com/v2/charge', $data);
            ])->post(env('URL_MIDTRANS'), $data);
    
            //	dd($response);
    
            if ($response->successful()) {
                DB::commit();
                return response()->json(['success' => true, 'data' => $response->json()],200);
            } else {
                DB::rollBack();
                return response()->json(['success' => false, 'error' => $response->json()], $response->status());
            }
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
        
    }
}
