<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Support\Facades\Mail;
use App\Mail\mailgift;
//use App\Gift;

class Home extends Controller {

	public function index(Request $request) {
        
        $items = Item::paginate(8);

        if ($request->ajax()) {
            
            if(count($items) > 0){
                $view = view('data',compact('items'))->render();
            }else{
                $view = "";
            }

            return response()->json(['html'=>$view]);

        }
        return view('welcome',compact('items'));
    }

    public function giftcard(Request $request) {
        return view('giftcard');
    }

    public function thankyou (Request $request, $txId) {

        $payment = DB::table('payments')
            -> join('gifts', 'gifts.id' , '=', 'payments.gift')
            -> where([
                'tx_id' => $txId,
                'tx_status' => 'success'
            ]) -> get();

        if(count($payment) == 1){

            $payment[0] -> data = json_decode($payment[0] -> data);

            if($request -> has('dp')){

                $pdf = PDF::loadView('giftpdf', ["payment" => $payment[0]]);
                return $pdf->download("HU1 gift card #{$payment[0] -> gift_no}.pdf");
            
            }else if($request -> has('email')){

                Mail::to($request -> input('email')) -> send(new mailgift($payment[0]));
                return response() -> json([
                    'success' => 'true'
                ]);

            }
            
            return view('thankyou', ["payment" => $payment[0]]);

        }else{
            return redirect() -> back();
        }

    }

    public function support () {
        return view('support');
    }

    public function userterms () {
        return view('userterms');
    }
    public function productThankyou(Request $request, $txId){

        $payment = DB::table('payments')
            -> join('orders', 'orders.id' , '=', 'payments.order')
            -> where([
                'tx_id' => $txId,
                'tx_status' => 'success'
            ]) -> get();

        if(count($payment) == 1){

            $payment[0] -> data = json_decode($payment[0] -> data);

            if($request -> has('dp')){

                $pdf = PDF::loadView('invoicepdf', ["payment" => $payment[0]]);
  
                return $pdf->download("HU1 Invoice #{$payment[0] -> order}.pdf");
            
            }
            
            return view('productThankyou', ["payment" => $payment[0]]);

        }else{
            return redirect() -> back();
        }

    }
    public function giftCardDetails(Request $request, $giftNo){

        $gift = DB::table('gifts') -> where('gift_no', $giftNo) -> get();

        if(count($gift) == 1){
            return response() -> json([
                'error' => '',
                'balance' => $gift[0] -> amount - $gift[0] -> amount_used,
                'currency' => $gift[0] -> currency
            ]);
        }else{
            return response() -> json([
                'error' => 'Invalid Gift Card Number!'
            ]);
        }

    }
}