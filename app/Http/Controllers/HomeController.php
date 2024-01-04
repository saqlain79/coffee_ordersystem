<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->where('catagory', 'drinks')
            ->select('products.*')
            ->limit(5)
            ->get();
        $products2 = DB::table('products')
            ->where('catagory', 'foods')
            ->select('products.*')
            ->limit(5)
            ->get();
        return view('index', compact('products', 'products2'));
    }

    public function single_product($id)
    {
        $products = Product::find($id);
        return view('pages.single_product', compact('products'));
    }

    public function menu()
    {
        $products = Product::all();
        return view('pages.menu', compact('products'));
    }

    public function cart()
    {
        if(Auth::check())
        {
            $id = Auth::id();
            $carts = Cart::where('user_id', $id)->get();
            return view('pages.cart', compact('carts'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function add_cart(Request $request, $id)
    {
        if(auth()->user())
        {
            $userid = auth()->user()->id;
            $product = Product::find($id);
            $product_exist = Cart::where('user_id', $userid)->where('product_id', $id)->first();

            if($product_exist)
            {
                $cart = Cart::find($product_exist)->first();
                $cart->quantity = $cart->quantity + $request->quantity;
                $cart->product_title = $product->name;
                $cart->image = $product->image;
                if($product->sale_price != 0)
                {
                    $cart->price = $product->sale_price*$cart->quantity;
                }
                else
                {
                    $cart->price = $product->price * $cart->quantity;
                }

                $cart->save();
                return redirect()->route('cart');
            }
            else
            {
                $cart = new Cart();
                $cart->user_id = $userid;
                $cart->product_id = $id;
                $cart->quantity = $request->quantity;
                $cart->product_title = $product->name;
                $cart->image = $product->image;
                if($product->sale_price != 0)
                {
                    $cart->price = $product->sale_price*$cart->quantity;
                }
                else
                {
                    $cart->price = $product->price * $cart->quantity;
                }
                
                $cart->save();
                return redirect()->route('cart');
            }
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function delete_cart($id)
    {
        if(Auth::check())
        {
            $cart = Cart::find($id);
            $cart->delete();
            return redirect()->route('cart');
        }
        return redirect()->route('login');
    }

    public function printpdf($id)
    {
        $invoice = DB::table('orders')
            ->join('users', 'orders.customer_id', '=', 'users.id')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->join('delivery_teams', 'orders.deliveryteam_id', '=', 'delivery_teams.id')
            ->select('orders.*', 'users.*', 'products.*', 'products.name as product_name', 'delivery_teams.*', 'delivery_teams.name as deliveryteam_name', 'orders.price as final_price','products.id as productid')
            ->get();
        $invoicenumber = 'INV-'.date('YmdHis').$id;
        $order = Order::find($id);
        $pdf = Pdf::loadView('pages.pdf', compact('order', 'invoice', 'invoicenumber'));
        return $pdf->stream();
    }

}
