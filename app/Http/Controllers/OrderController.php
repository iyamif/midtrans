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

             // List of coffee items with their prices and product_ids
            $coffee_items = [
                ["product_id" => "1", "name" => "Kopi Arabika", "price" => 5000],
                ["product_id" => "2", "name" => "Kopi Robusta", "price" => 4000],
                ["product_id" => "3", "name" => "Kopi Luwak", "price" => 20000],
                ["product_id" => "4", "name" => "Kopi Toraja", "price" => 7000],
                ["product_id" => "5", "name" => "Kopi Gayo", "price" => 60000],
                ["product_id" => "6", "name" => "Kopi Bali Kintamani", "price" => 65000],
                ["product_id" => "7", "name" => "Kopi Papua", "price" => 75000],
                ["product_id" => "8", "name" => "Kopi Flores", "price" => 75000],
            ];

            // Generate random items
            $total_price = $request->total_price;
            
            $items = [];
            $current_total = 0;

            while ($current_total < $total_price) {
                $remaining = $total_price - $current_total;

                // Randomly select a coffee item
                $random_item = $coffee_items[array_rand($coffee_items)];

                // Ensure the item's price does not exceed the remaining total
                if ($random_item['price'] > $remaining) {
                    continue;
                }

                // Determine a random quantity such that the total price does not exceed the target
                $quantity = rand(1, min(100, floor($remaining / $random_item['price'])));
                $current_total += $random_item['price'] * $quantity;

                $items[] = [
                    "id" => $random_item['product_id'],
                    "price" => $random_item['price'],
                    "quantity" => $quantity,
                    "name" => $random_item['name'],
                    "brand" => $random_item['name'],
                    "category" => "Coffee",
                    "merchant_name" => "Toko Kopi",
                    "url" => null,
                ];
            }

            // Check if the total is not exactly the requested total price and adjust the last item
            if ($current_total != $total_price) {
                $adjustment = $current_total - $total_price;
                $last_item_index = count($items) - 1;

                // Adjust the last item's quantity or price
                $last_item_price = $items[$last_item_index]['price'];
                $last_item_quantity = $items[$last_item_index]['quantity'];

                // If adjusting the price of the last item doesn't cause it to become invalid
                if ($last_item_price - $adjustment > 0) {
                    $items[$last_item_index]['price'] -= $adjustment;
                } else {
                    // If the price becomes invalid, adjust the quantity instead
                    $new_quantity = max(1, $last_item_quantity - ceil($adjustment / $last_item_price));
                    $items[$last_item_index]['quantity'] = $new_quantity;
                    $items[$last_item_index]['price'] = $total_price - ($current_total - $last_item_price * $last_item_quantity);
                }
            }
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
                'item_details' => $items
            );

             // Set your Merchant Server Key
             \Midtrans\Config::$serverKey = config('midtrans.server_key');
             // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
             \Midtrans\Config::$isProduction = config('midtrans.is_production');
             // Set sanitization on (default)
             \Midtrans\Config::$isSanitized = true;
             // Set 3DS transaction for credit card to true
             \Midtrans\Config::$is3ds = true;  

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
        // $serverKey = config('midtrans.server_key');
        // $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        // if($hashed == $request->signature_key){
        //     if($request->transaction_status == 'capture' || $request->transaction_status == 'settlement'){
        //         $order = Order::where('order_code', $request->order_id)->first();
        //         $order->update(['status' => 'Paid']);
        //     }
        // }
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' || $request->transaction_status == 'settlement'){
                $order = Order::where('order_code', $request->order_id)->first();
                $order->update(['status_payment' => 'Paid']);
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
