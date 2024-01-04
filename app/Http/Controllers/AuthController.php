<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Customer;
use App\Models\Employee;



class AuthController extends Controller
{
    public function adminlogin()
    {
        return view('auth.login');
    }
    public function adminloginpost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
        ]);

        $success = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        if($success)
        {
            return redirect()->to(RouteServiceProvider::HOME);
        }
        return back()->with('loginError', 'Invalid Login Details');
    }
    public function employeeLogin()
    {
        return view('auth.login');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function loginpost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12',
        ]);

        $success = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        if($success)
        {
            return redirect()->to(RouteServiceProvider::HOME);
        }
        return back()->with('loginError', 'Invalid Login Details');
    }
    public function logout()
    {
        if(auth()->check())
        {
            auth()->logout();
            return redirect()->to('/');
        }
        return back()->with('Error', 'Login First');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function registerpost(Request $request)
    {

        $user = new User();
        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->address = request('address');
        $user->contact = request('contact');
        $user->email = request('email');
        $user->nid = request('nid');
        $user->role = 'customer';
        $user->password = Hash::make(request('password'));
        
        $user->save();

        $customer = new Customer();
        $customer->cid = $user->id;
        $customer->save();
        
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:8|max:12',
        ]);

        Auth::login($user);

        return redirect()->route('index');
    }

    public function employeeRegister()
    {
        return view('auth.employeeregister');
    }

    public function employeeregisterpost(Request $request)
    {
        $user = new User();
        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->address = request('address');
        $user->contact = request('contact');
        $user->email = request('email');
        $user->nid = request('nid');
        $user->role = 'employee';
        $user->password = Hash::make(request('password'));
        
        $user->save();

        $employee = new Employee();
        $employee->eid = $user->id;
        $employee->save();
        
        
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:8|max:12',
        ]);

        Auth::login($user);

        return redirect()->to(RouteServiceProvider::HOME);
    }

    public function adminregister()
    {
        return view('auth.adminregister');
    }

    public function adminregisterpost(Request $request)
    {
        $user = new User();
        $user->firstname = request('firstname');
        $user->lastname = request('lastname');
        $user->address = request('address');
        $user->contact = request('contact');
        $user->email = request('email');
        $user->nid = request('nid');
        $user->role = 'admin';
        $user->password = Hash::make(request('password'));
        
        $user->save();

        
        $admin = new Admin();
        $admin->aid = $user->id;
        $admin->save();
        
        
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'password' => 'required|min:8|max:12',
        ]);

        Auth::login($user);

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
