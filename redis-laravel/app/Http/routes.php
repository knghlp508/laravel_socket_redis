<?php
use Illuminate\Support\Facades\Redis;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    //return view('welcome');
    //Redis::set('name','Ming');
    Cache::put('foo','bar',10);
    return Cache::get('foo');
});*/

/*Route::get('/', function () {
    $data=[
        'event'=>'aNewMessage',
        'data'=>['name'=>'Ming']
    ];
    Redis::publish('test-channel',json_encode($data));

    return view('welcome');
});*/

Route::get('/', function () {
    event(new \App\Events\ANewMessage(Request::query('name')));

    return view('welcome');
});
