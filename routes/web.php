<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
route::get('/single_product/{id}', [HomeController::class, 'single_product'])->name('single_product');
route::get('/menu', [HomeController::class, 'menu'])->name('menu');

//authentications
route::get('/admin/login', [AuthController::class, 'adminlogin'])->name('adminlogin');
route::post('/admin/loginpost', [AuthController::class, 'adminloginpost'])->name('adminloginpost');
route::get('/admin/register', [AuthController::class, 'adminregister'])->name('adminregister');
route::post('/admin/registerpost', [AuthController::class, 'adminregisterpost'])->name('adminregisterpost');
route::get('/employee/login', [AuthController::class, 'employeeLogin'])->name('employeelogin');
route::post('/employee/loginpost', [AuthController::class, 'employeeLoginPost'])->name('employeeloginpost');
route::get('/employee/register', [AuthController::class, 'employeeRegister'])->name('employeeregister');
route::post('/employee/registerpost', [AuthController::class, 'employeeregisterpost'])->name('employeeregisterpost');
route::get('/login', [AuthController::class, 'login'])->name('login');
route::post('/loginpost', [AuthController::class, 'loginpost'])->name('loginpost');
route::get('/logout', [AuthController::class, 'logout'])->name('logout');
route::get('/register', [AuthController::class, 'register'])->name('register');
route::post('/registerpost', [AuthController::class, 'registerpost'])->name('registerpost');
//authentications end

route::middleware('auth')->group(function(){
    route::get('/cart', [HomeController::class, 'cart'])->name('cart');
    route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart');
    route::get('/delete_cart/{id}', [HomeController::class, 'delete_cart'])->name('delete_cart');
    route::get('/cashpay', [PaymentController::class, 'cash_payment'])->name('cash_payment');
    route::get('/stripepay/{total}', [PaymentController::class, 'stripe_payment'])->name('stripe_payment');
    route::post('/stripepaypost/{total}', [PaymentController::class, 'stripe_payment_post'])->name('stripe_post');
    route::get('/printpdf/{id}', [HomeController::class, 'printpdf'])->name('printpdf');
});

//admin routes
route::middleware('admin')->group(function(){
    route::get('/employeelist', [AdminController::class, 'employeelist'])->name('employeelist');
    route::get('/adminlist', [AdminController::class, 'adminlist'])->name('adminlist');
});

route::middleware('employee')->group(function(){
    route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    route::get('/customerlist', [AdminController::class, 'customerlist'])->name('customerlist');
    route::get('/orderlist', [AdminController::class, 'orderlist'])->name('orderlist');
    route::get('/productlist', [AdminController::class, 'productlist'])->name('productlist');
    route::post('/productadd', [AdminController::class, 'productadd'])->name('productadd');
    route::post('/productupdate/{id}', [AdminController::class, 'productupdate'])->name('productupdate');
    route::get('/productdelete/{id}', [AdminController::class, 'productdelete'])->name('productdelete');
    route::get('/delivered/{id}', [AdminController::class, 'delivered'])->name('delivered');
    route::get('/deliverylist', [AdminController::class, 'deliverylist'])->name('deliverylist');
    route::post('/deliveryteamadd', [AdminController::class, 'deliveryteamadd'])->name('deliveryteamadd');
});