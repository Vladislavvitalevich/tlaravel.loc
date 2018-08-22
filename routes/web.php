<?php

Route::group(['middleware' => 'web'], function(){

	Route::match(['get', 'post'], '/', [ 'uses' 	=> 'IndexController@execute', 
										'as' 	=> 'home']);

	Route::post('email', [ 'uses' 	=> 'EmailController@contactUs', 
										'as' 	=> 'contactUs']);

	Route::get('/page/{alias}', ['uses' => 'PageController@execute',
								 'as' 	=> 'page']);

	Route::auth();
});

/*Route::middleware('auth')->prefix('/admin')->group(function () {

	Route::get('/', function(){

	});

	Route::group(['prefix' => 'pages'], function(){
		Route::get('/', [	'uses' 	=> 'PagesController@execute', 'as' 	=> 'pages' ])

		Route::match(['get', 'post'], '/add', [	'uses' 	=> 'PagesAddController@execute', 'as' 	=> 'pageAdd']);
		Route::match(['get','post', 'delete'], '/edit/{page}', ['uses' 	=> 'PagesEditContrller@execute', 'as' 	=> 'pageEdit' ])
	})	

	Route::group(['prefix' => 'portfoilios'], function(){
		Route::get('/', [	'uses' 	=> 'PortfolioController@execute', 
							'as' 	=> 'portfolio' ])

		Route::match(['get', 'post'], '/add', [	'uses' 	=> 'PortfolioAddController@execute', 
												'as' 	=> 'portfolioAdd']);
		Route::match(['get','post', 'delete'], '/edit/{portfolio}', ['uses' => 'PortfolioEditContrller@execute', 
																	 'as' 	=> 'portfolioEdit' ])
	})

	Route::group(['prefix' => 'services'], function(){
		Route::get('/', [	'uses' 	=> 'ServiceController@execute', 
							'as' 	=> 'service' ])

		Route::match(['get', 'post'], '/add', [	'uses' 	=> 'ServiceAddController@execute', 
												'as' 	=> 'serviceAdd']);
		Route::match(['get','post', 'delete'], '/edit/{service}', ['uses' => 'ServiceEditContrller@execute', 
																	 'as' 	=> 'serviceEdit' ])
	})
})*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
