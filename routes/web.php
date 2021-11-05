<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;


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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::resourceVerbs([
    'create' => 'cadastrar',
    'edit' => 'editar'
]);

Route::get('/', function () {
    return redirect()->route('products.create');
});

/** Rotas para os produtos */
Route::resource('produtos/index', 'App\Http\Controllers\ProductController')->names('products')->parameters(['produtos' => 'product']);
Route::delete('/{id}', 'App\Http\Controllers\ProductController@destroy')->name('products.destroy');
Route::get('/{id}', 'App\Http\Controllers\ProductController@edit')->name('products.edit');



/** Rotas para os pedidos */
Route::resource('pedidos/index', 'App\Http\Controllers\OrderController')->names('orders')->parameters(['pedidos' => 'order']);
Route::get('pedidos/concluded', 'App\Http\Controllers\OrderController@concluded')->name('orders.concluded');
Route::delete('/{id}', 'App\Http\Controllers\OrderController@destroy')->name('orders.destroy');
Route::get('/{id}', 'App\Http\Controllers\OrderController@update')->name('orders.update');
Route::get('item-add/{id}', 'App\Http\Controllers\OrderController@addItem')->name('orders.addItem');
