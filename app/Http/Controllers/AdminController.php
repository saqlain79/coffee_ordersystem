<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\DeliveryTeam;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function customerlist()
    {
        // $customerlist = DB::table('users')->where('role', 'customer')->paginate(10);
        $customerlist = DB::table('users')
            ->join('customers', 'users.id', '=', 'customers.cid')
            ->select('users.*', 'customers.*')
            ->paginate(10);
        return view ('admin.pages.customerlist', compact('customerlist'));
    }

    public function employeelist()
    {
        $employeelist = DB::table('users')
            ->join('employees', 'users.id', '=', 'employees.eid')
            ->select('users.*', 'employees.*')
            ->paginate(10);
        return view ('admin.pages.employeelist', compact('employeelist'));
    }

    public function adminlist()
    {
        $adminlist = DB::table('users')
            ->join('admins', 'users.id', '=', 'admins.aid')
            ->select('users.*', 'admins.*')
            ->paginate(10);
        return view ('admin.pages.adminlist', compact('adminlist'));
    }

    public function productlist()
    {
        $productlist = Product::all();
        return view ('admin.pages.productlist', compact('productlist'));
    }

    public function productadd(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->catagory = $request->catagory;
        $product->type = $request->type;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        
        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('img', $imagename);
        $product->image = $imagename;

        $product->save();

        return redirect()->back();
    }

    public function productupdate(Request $request,$id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->catagory = $request->catagory;
        $product->type = $request->type;
        $product->price = $request->price;
        $product->sale_price = $request->sale_price;
        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('images', $imagename);
            $product->image = $imagename;
        }

        $product->save();
        return redirect()->back();
    }

    public function productdelete()
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }

    public function orderlist()
    {
        $order = DB::table('orders')
            ->join('users', 'orders.customer_id', '=', 'users.id')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*', 'users.lastname', 'users.email', 'users.contact', 'users.address', 'products.name')
            ->paginate(10);
        return view('admin.pages.orders', compact('order'));
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status = 'delivered';
        $order->save();
        return redirect()->back();
    }

    public function deliverylist()
    {
        $deliverylist = DeliveryTeam::all();
        return view('admin.pages.deliverylist', compact('deliverylist'));
    }

    public function deliveryteamadd(Request $request)
    {
        $dteam = new DeliveryTeam();
        $dteam->name = $request->name;
        $dteam->nid = $request->nid;
        $dteam->address = $request->address;
        $dteam->contact = $request->contact;

        // $image = $request->file('image');
        // $imagename = $request->name.'.'.$image->getClientOriginalExtension();
        // $request->image->move('img.dteam', $imagename);

        // $dteam->image = $imagename;
        $dteam->save();

        return redirect()->back();
    }
}
