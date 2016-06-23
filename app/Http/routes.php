<?php

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

use App\Task;
use App\Good;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


// главная страница
Route::get('/', function () {
        if (Auth::check())
        {
            return view('tasks');
        }else{
            return redirect('auth/login');
        }

    });



// ??
Route::get('../', function () {

        return redirect('/');
});


// список товаров
Route::post('form-data', function (){
    return Response::json(Good::all());
});

// Список заказов
Route::post('orders', function (){
    $userId = Auth::id();
    return  Response::json(DB::table('goods_into_orders')
        ->select('orders.idorder','goods_into_orders.idgood','goods.good_price', 'goods_into_orders.countgood','goods.good_name')
        ->join('orders', 'goods_into_orders.idorder', '=', 'orders.idorder')
        ->join('users', 'orders.iduser', '=', 'users.id')
        ->join('goods', 'goods_into_orders.idgood', '=', 'goods.idgood')
        ->where('orders.iduser', $userId)
        ->get()
    );
});

//Удаление заказа
Route::post('delete_order', 'SetData@delete_order');

// Сохранение заказов в БД
Route::post('save_order', 'SetData@save_order');




// Маршруты аутентификации
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('logout', array('as' => 'logout', 'uses' => 'Auth\AuthController@logout'));
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Регистрация
Route::post('auth/register', 'AdvancedReg@register');






