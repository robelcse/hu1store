<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class order extends Controller
{
    public function placeOrder(Request $request){

        $name = explode(' ', $request -> input('nameOnCard'));
        $expireDate = explode(' / ', $request -> input('cardExpDate'));

        if(count($name) < 2){
            return response() -> json([
                'error' => 'Please enter full name writen on your card.'
            ]);
        }

        if(count($expireDate) < 2){
            return response() -> json([
                'error' => 'Invalid Expire date! Please enter MM / YY.'
            ]);
        }
        
        $item = DB::table('items') -> where('id', $request -> input('itemid')) -> get();

        if(count($item) == 1){

            $orderId = DB::table('orders') -> insertGetId([
                'name' => $request -> input('fullname'),
                'email' => $request -> input('email'),
                'item' => $request -> input('itemid'),
                'item_price' => $item[0] -> price,
                'currency' => 'usd',
                'address_line_1' => $request -> input('addressLine1'),
                'address_line_2' => $request -> input('addressLine2'),
                'country' => $request -> input('country'),
                'city' => $request -> input('city'),
                'state' => $request -> input('state'),
                'zip' => $request -> input('zip')
            ]);

            if($request -> input('paymentMethod') == "card"){

                $api = curl_init();
                curl_setopt_array($api, array(
                    CURLOPT_URL => 'https://sandbox.bluesnap.com/services/2/transactions',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json',
                        'Accept: application/json',
                        'Authorization: Basic '.base64_encode('API_1606587756509896582451:Aus@13$64')
                    ),
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => json_encode(array(
                        'cardTransactionType' => "AUTH_CAPTURE",
                        'amount' => $item[0] -> price,
                        'currency' => "USD",
                        'cardHolderInfo' => array(
                            "firstName" => $name[0],
                            "lastName" => $name[1],
                            "email" => $request -> input('email'),
                            "zip" => $request -> input('zip')
                        ),
                        "creditCard" => array(
                            "cardNumber" => $request -> input('cardNumber'),
                            "securityCode" => $request -> input('cardvc'),
                            "expirationMonth" => $expireDate[0],
                            "expirationYear" => "20".$expireDate[1],
                        )
                    ))
                ));

                $data = curl_exec($api);
                $resp = json_decode($data);

                if(
                    isset($resp -> processingInfo -> processingStatus) &&
                    $resp -> processingInfo -> processingStatus == "success"
                ){

                    DB::table('payments') -> insert([
                        'order' => $orderId,
                        'name' => $request -> input('nameOnCard'),
                        'tx_id' => $resp -> transactionId,
                        'tx_status' => 'success',
                        'payment_method' => 'card',
                        'amount' => $item[0] -> price,
                        'currency' => 'usd',
                        'data' => $data
                    ]);

                    DB::table('orders') -> where('id', $orderId) -> update([
                        'payment_status' => 'paid'
                    ]);

                    return response() -> json([
                        'error' => "",
                        "txId" => $resp -> transactionId
                    ]);

                }else{

                    DB::table('payments') -> insert([
                        'order' => $orderId,
                        'name' => $request -> input('nameOnCard'),
                        'tx_id' => isset($resp -> transactionId)?$resp -> transactionId:'',
                        'tx_status' => 'error',
                        'payment_method' => 'card',
                        'amount' => $item[0] -> price,
                        'currency' => 'usd',
                        'data' => $data
                    ]);

                    return response() -> json([
                        'error' => 'Card Declined! Please check card details and try again'
                    ]);

                }

            }

        }else{
            return response() -> json([
                'error' => 'Product out of stock'
            ]);
        }

    }

    public function giftCard(Request $request){

        $name = explode(' ', $request -> input('nameOnCard'));
        $expireDate = explode(' / ', $request -> input('cardExpDate'));

        if(count($name) < 2){
            return response() -> json([
                'error' => 'Please enter full name writen on your card.'
            ]);
        }

        if(count($expireDate) < 2){
            return response() -> json([
                'error' => 'Invalid Expire date! Please enter MM / YY.'
            ]);
        }

        if($request -> input('paymentMethod') == "card"){

            $api = curl_init();
            curl_setopt_array($api, array(
                CURLOPT_URL => 'https://sandbox.bluesnap.com/services/2/transactions',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Accept: application/json',
                    'Authorization: Basic '.base64_encode('API_1606587756509896582451:Aus@13$64')
                ),
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode(array(
                    'cardTransactionType' => "AUTH_CAPTURE",
                    'amount' => $request -> input('amount'),
                    'currency' => "USD",
                    'cardHolderInfo' => array(
                        "firstName" => $name[0],
                        "lastName" => $name[1]
                    ),
                    "creditCard" => array(
                        "cardNumber" => $request -> input('cardNumber'),
                        "securityCode" => $request -> input('cardvc'),
                        "expirationMonth" => $expireDate[0],
                        "expirationYear" => "20".$expireDate[1]
                    )
                ))
            ));

            $data = curl_exec($api);
            $resp = json_decode($data);

            if(
                isset($resp -> processingInfo -> processingStatus) &&
                $resp -> processingInfo -> processingStatus == "success"
            ){

                $giftId = DB::table('gifts') -> insertGetId([
                    'amount' => $request -> input('amount'),
                    'currency' => 'usd',
                    'message' => $request -> input('message'),
                    'theme' => $request -> input('theme')
                ]);

                $giftNo = $giftId.time();

                DB::table('gifts') -> where(['id' => $giftId]) -> update(['gift_no' => $giftNo]);

                DB::table('payments') -> insert([
                    'gift' => $giftId,
                    'name' => $request -> input('nameOnCard'),
                    'tx_id' => $resp -> transactionId,
                    'tx_status' => 'success',
                    'payment_method' => 'card',
                    'amount' => $request -> input('amount'),
                    'currency' => 'usd',
                    'data' => $data
                ]);

                return response() -> json([
                    'error' => "",
                    "txId" => $resp -> transactionId
                ]);

            }else{

                DB::table('payments') -> insert([
                    'name' => $request -> input('nameOnCard'),
                    'tx_id' => isset($resp -> transactionId)?$resp -> transactionId:'',
                    'tx_status' => 'error',
                    'payment_method' => 'card',
                    'amount' => $request -> input('amount'),
                    'currency' => 'usd',
                    'data' => $data
                ]);

                return response() -> json([
                    'error' => 'Card Declined! Please check card details and try again'
                ]);

            }

        }

    }

}
