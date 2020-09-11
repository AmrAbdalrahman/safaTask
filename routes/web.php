<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {

    #item routes
    $router->group(['prefix' => 'items'], function () use ($router) {
        $router->get('/', 'ItemController@getItemsPagination');
    });


    #cart routes
    $router->group(['prefix' => 'cart'], function () use ($router) {
        $router->post('addOrUpdateItem', 'CartController@addItemCart');
        $router->post('removeItem', 'CartController@removeItemCart');
        $router->get('checkout/{customer_id}', 'CartController@userCheckout');
    });

    #order routes
    $router->group(['prefix' => 'order'], function () use ($router) {
        $router->get('TotalPurchase/{customer_id}', 'OrderController@TotalPurchase');
        $router->post('make', 'OrderController@makeOrder');
    });

});



