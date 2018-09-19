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

Route::middleware('auth')->prefix('/admin')->group(function () {

	Route::get('/', function(){
		
		if(view()->exists('admin.index')){
			$data = ['title' => 'Admin Panel'];

			return view('admin.index', $data);
		}

	});

	//admin/pages
	Route::group(['prefix'=>'pages'],function() {
		
		///admin/pages
		Route::get('/',['uses'=>'PagesController@execute','as'=>'pages']);
		
		//admin/pages/add
		Route::match(['get','post'],'/add',['uses'=>'PagesAddController@execute','as'=>'pagesAdd']);
		//admin/edit/2
		Route::match(['get','post','delete'],'/edit/{page}',['uses'=>'PagesEditController@execute','as'=>'pagesEdit']);
		
	});
	
	
	Route::group(['prefix'=>'portfolios'],function() {
		
		
		Route::get('/',['uses'=>'PortfolioController@execute','as'=>'portfolio']);
		
		
		Route::match(['get','post'],'/add',['uses'=>'PortfolioAddController@execute','as'=>'portfolioAdd']);
		
		Route::match(['get','post','delete'],'/edit/{portfolio}',['uses'=>'PortfolioEditController@execute','as'=>'portfolioEdit']);
		
	});
	
	
	Route::group(['prefix'=>'services'],function() {
		
		
		Route::get('/',['uses'=>'ServiceController@execute','as'=>'services']);
		
		
		Route::match(['get','post'],'/add',['uses'=>'ServiceAddController@execute','as'=>'serviceAdd']);
		
		Route::match(['get','post','delete'],'/edit/{service}',['uses'=>'ServiceEditController@execute','as'=>'serviceEdit']);
		
	});

})

?>
