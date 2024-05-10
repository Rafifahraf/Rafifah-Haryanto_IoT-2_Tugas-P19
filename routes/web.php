<?php

use App\Models\device;
use App\Models\log;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/device', function(){
    $data = device::all();
    return view('device', ['data'=>$data]);
});

Route::get('/device/{id}', function($id){
    $data = device::where('id', '=', $id)->get();
    return view('DetailDevice',  ['data'=>$data]);
});

Route::get('/log', function(){
    $data = log::with('Device')->get();
    return view('log', ['nilai'=>$data]);
});




