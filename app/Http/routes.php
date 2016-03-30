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

Route::group(['middleware' => ['web']], function () {

	Route::get('/',['uses'=>'FrontController@index','as'=>'front.home']);
	Route::get('product/show/{id}/{product_name}',['uses'=>'FrontController@product_show','as'=>'product.detail']);
	Route::get('about-us',['uses'=>'FrontController@about','as'=>'front.about']);
	Route::get('product',['uses'=>'FrontController@product','as'=>'front.product']);
	Route::get('service',['uses'=>'FrontController@service','as'=>'front.service']);
	Route::get('buy',['uses'=>'FrontController@buy','as'=>'front.buy']);
	Route::get('contact',['uses'=>'FrontController@contact','as'=>'front.contact']);
	Route::post('contact-post',['uses'=>'FrontController@contact_post','as'=>'contact.post']);
	Route::post('product-post',['uses'=>'FrontController@product_post','as'=>'product.post']);
	Route::get('product-search',['uses'=>'FrontController@product_search','as'=>'product.search']);
    Route::get('testimonial',['uses'=>'FrontController@testimonial','as'=>'front.testimonial']);
    Route::post('testimonial-post',['uses'=>'FrontController@testimonial_post','as'=>'testimonial.post']);
	Route::get('products/category/{id}/{cat_name}',['uses'=>'FrontController@product_by_category','as'=>'front.product.category']);

    Route::get('login',['uses'=>'AuthenticateController@login','middleware'=>'guest']);
    Route::post('login/verify',['uses'=>'AuthenticateController@authCredentials','as'=>'login.verify']);
    
    Route::group(['middleware' => ['auth'],'prefix'=>'admin'],function(){	
    	Route::get('home',['uses'=>'HomeController@dashboard','as'=>'home']);
    	Route::get('logout',['uses'=>'AuthenticateController@logout','as'=>'logout']);


        Route::group(['prefix'=>'master'],function(){
            Route::get('user/list',['uses'=>'UsersController@index','as'=>'user.list']);
            Route::get('user/add',['uses'=>'UsersController@add','as'=>'user.add']);
            Route::post('user/store',['uses'=>'UsersController@store','as'=>'user.store']);
            Route::get('user/edit/{id}',['uses'=>'UsersController@edit','as'=>'user.edit']);
            Route::put('user/update/{id}',['uses'=>'UsersController@update','as'=>'user.update']);
            Route::get('user/show/{id}',['uses'=>'UsersController@show','as'=>'user.show']);
            Route::delete('user/delete/{id}',['uses'=>'UsersController@delete','as'=>'user.delete']);

            //Product
            Route::get('product/list',['uses'=>'ProductsController@index','as'=>'product.list']);
            Route::get('product/add',['uses'=>'ProductsController@add','as'=>'product.add']);
            Route::post('product/store',['uses'=>'ProductsController@store','as'=>'product.store']);
            Route::get('product/edit/{id}',['uses'=>'ProductsController@edit','as'=>'product.edit']);
            Route::put('product/update/{id}',['uses'=>'ProductsController@update','as'=>'product.update']);
            Route::get('product/show/{id}',['uses'=>'ProductsController@show','as'=>'product.show']);
            Route::delete('product/delete/{id}',['uses'=>'ProductsController@delete','as'=>'product.delete']);

            //Categories
            Route::get('category/list',['uses'=>'CategoriesController@index','as'=>'category.list']);
            Route::get('category/add',['uses'=>'CategoriesController@add','as'=>'category.add']);
            Route::post('category/store',['uses'=>'CategoriesController@store','as'=>'category.store']);
            Route::get('category/edit/{id}',['uses'=>'CategoriesController@edit','as'=>'category.edit']);
            Route::put('category/update/{id}',['uses'=>'CategoriesController@update','as'=>'category.update']);
            Route::get('category/show/{id}',['uses'=>'CategoriesController@show','as'=>'category.show']);
            Route::delete('category/delete/{id}',['uses'=>'CategoriesController@delete','as'=>'category.delete']);
        });
    	//User
    	

    	//Order
    	Route::get('order/list',['uses'=>'OrdersController@index','as'=>'order.list']);
    	Route::get('order/add',['uses'=>'OrdersController@add','as'=>'order.add']);
    	Route::post('order/store',['uses'=>'OrdersController@store','as'=>'order.store']);
    	Route::get('order/edit/{id}',['uses'=>'OrdersController@edit','as'=>'order.edit']);
    	Route::put('order/update',['uses'=>'OrdersController@update','as'=>'order.update']);
    	Route::get('order/show/{id}',['uses'=>'OrdersController@show','as'=>'order.show']);
    	Route::delete('order/delete/{id}',['uses'=>'OrdersController@delete','as'=>'order.delete']);

		//Contact
		Route::get('contact/list',['uses'=>'Contact@index','as'=>'contact.list']);

        //Testimonial
        Route::get('testimonial/list',['uses'=>'TestimonialController@index','as'=>'testimonial.list']);
        Route::get('testimonial/update/{id}/{status}',['uses'=>'TestimonialController@update','as'=>'testimonial.update']);

    });
});

