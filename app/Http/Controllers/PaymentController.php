<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;

use Session;
use Stripe;

class PaymentController extends Controller
{
    public function cash_payment()
    {
        if(Auth::check())
        {
            $userid = auth()->user()->id;
            $cart = Cart::where('user_id', $userid)->get();
            if($cart->isEmpty())
            {
                return ('Cart is empty');
            }
            foreach($cart as $cart)
            {
                $order = new Order();
                $order->product_id = $cart->product_id;
                $order->customer_id = $cart->user_id;
                $order->price = $cart->price;
                $order->quantity = $cart->quantity;
                $order->deliveryteam_id = '1';

                $order->save();

                $cartid = $cart->id;
                $cartinfo = Cart::find($cartid);
                $cartinfo->delete();

            }
            return redirect()->route('index');
        }

    }

    public function stripe_payment($total)
    {
        return view('pages.stripe_payment', compact('total'));
    }

    public function stripe_payment_post(Request $request, $total)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $total * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Thanks for your payment."
        ]);

        
            $userid = auth()->user()->id;
            $cart = Cart::where('user_id', $userid)->get();
            if($cart->isEmpty())
            {
                return ('Cart is empty');
            }
            foreach($cart as $cart)
            {
                $order = new Order();
                $order->cart_id = $cart->id;
                $order->deliveryteam_id = '1';

                $order->save();

                $cartid = $cart->id;
                $cartinfo = Cart::find($cartid);
                $cartinfo->delete();

            }
        

        Session::flash('success', 'Payment Successful! Your order will be delivered soon.');
        return back();
    }
}
