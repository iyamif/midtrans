<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


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

        return view('payment', compact('name', 'totalPrice'));
    }

    public function creditCard(Request $request)
    {
        // $serverKey = 'YOUR_SERVER_KEY'; // Ganti dengan server key Anda
        $orderID = $request->input('order_id');
        $grossAmount = $request->input('gross_amount');
        $token_id =    $request->input('token_id');

        $serverKey = 'SB-Mid-server-1YuTSNBEVzy9orheSKz-zLYB';
        $serverKeySandbox = 'SB-Mid-server-1YuTSNBEVzy9orheSKz-zLYB';

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
            'Authorization' => 'Basic ' . base64_encode($serverKeySandbox . ':'),
            'Content-Type' => 'application/json',
        ])->post('https://api.sandbox.midtrans.com/v2/charge', $data);

        //	dd($response);

        if ($response->successful()) {
            return response()->json(['success' => true, 'data' => $response->json()]);
        } else {
            return response()->json(['success' => false, 'error' => $response->json()], $response->status());
        }
    }

    public function virtualAccount(Request $request)
    {
        // $serverKey = 'YOUR_SERVER_KEY'; // Ganti dengan server key Anda
        $orderID = $request->input('order_id');
        $grossAmount = $request->input('gross_amount');
        $bank = $request->input('bank');

        $serverKey = 'SB-Mid-server-1YuTSNBEVzy9orheSKz-zLYB';
        $serverKeySandbox = 'SB-Mid-server-1YuTSNBEVzy9orheSKz-zLYB';

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
            'Authorization' => 'Basic ' . base64_encode($serverKeySandbox . ':'),
            'Content-Type' => 'application/json',
        ])->post('https://api.sandbox.midtrans.com/v2/charge', $data);

        //	dd($response);

        if ($response->successful()) {
            return response()->json(['success' => true, 'data' => $response->json()]);
        } else {
            return response()->json(['success' => false, 'error' => $response->json()], $response->status());
        }
    }


    public function qris(Request $request)
    {
        $orderID = $request->input('order_id');
        $grossAmount = $request->input('gross_amount');
        $bank = $request->input('bank');

        $serverKey = 'SB-Mid-server-1YuTSNBEVzy9orheSKz-zLYB';
        $serverKeySandbox = 'SB-Mid-server-1YuTSNBEVzy9orheSKz-zLYB';

        // dd($bank);

        $data = [
            'payment_type' => 'qris',
            'transaction_details' => [
                'order_id' => $orderID,
                'gross_amount' => $grossAmount,
            ]

        ];

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Basic TWlkLXNlcnZlci1yTXhvcVFQakhEck1rM0RKSUNwZ1UxUDk6',
            // 'Authorization' => 'Basic ' . base64_encode($serverKeySandbox . ':'),
            'Content-Type' => 'application/json',
            // ])->post('https://api.sandbox.midtrans.com/v2/charge', $data);
        ])->post('https://api.midtrans.com/v2/charge', $data);

        //	dd($response);

        if ($response->successful()) {
            return response()->json(['success' => true, 'data' => $response->json()]);
        } else {
            return response()->json(['success' => false, 'error' => $response->json()], $response->status());
        }
    }

    public function gopay(Request $request)
    {
        $orderID = $request->input('order_id');
        $grossAmount = $request->input('gross_amount');
        $bank = $request->input('bank');

        $serverKey = 'SB-Mid-server-1YuTSNBEVzy9orheSKz-zLYB';
        $serverKeySandbox = 'SB-Mid-server-1YuTSNBEVzy9orheSKz-zLYB';

        $data = [
            'payment_type' => 'gopay',
            'transaction_details' => [
                'order_id' => $orderID,
                'gross_amount' => $grossAmount,
            ]

        ];

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Basic TWlkLXNlcnZlci1yTXhvcVFQakhEck1rM0RKSUNwZ1UxUDk6',
            // 'Authorization' => 'Basic ' . base64_encode($serverKeySandbox . ':'),
            'Content-Type' => 'application/json',
            // ])->post('https://api.sandbox.midtrans.com/v2/charge', $data);
        ])->post('https://api.midtrans.com/v2/charge', $data);

        //	dd($response);

        if ($response->successful()) {
            return response()->json(['success' => true, 'data' => $response->json()]);
        } else {
            return response()->json(['success' => false, 'error' => $response->json()], $response->status());
        }
    }
}
