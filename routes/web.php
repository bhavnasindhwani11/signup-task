<?php

use App\Http\Controllers\AuthController;
use App\Mail\SignupOTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/signup', function(){
    return view('signup');
})->name('signup');
Route::post('send-email', function(Request $req){
    // $data = $req->all();
    $randomOTP = rand(100000, 999999);
    $data= [
        'email' => $req->sendEmail,
        
        'otp' => $randomOTP
    ];
    Mail::to($req->sendEmail)->send(new SignupOTP($randomOTP));
    return response()->json($data);
});
Route::post('users-insert', [AuthController::class, 'register'])->name('users.register');
Route::get('/login', function(){
    return view('login');
})->name('login')->middleware('guest');


Route::post('check-login', [AuthController::class, 'login'])->name('login.user');
Route::get('dashboard', function(){
    return view('dashboard');
})->name('dashboard');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('refresh-token', [AuthController::class, 'refresh']);