<?php

Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
 
Route::get('admin-password/reset', 'Auth\ForgetPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset', 'Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout.get');
Route::post('login', 'Auth\LoginController@login');
 
Route::group(['middleware' => 'admin'], function() {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	//---------------account-----------------------------------------	
	Route::prefix('account')->group(function () {
	    Route::get('form', 'AccountController@form')->name('admin.account.form');
	    Route::post('store', 'AccountController@store')->name('admin.account.post');
		Route::get('list', 'AccountController@index')->name('admin.account.list');
		Route::get('edit/{account}', 'AccountController@edit')->name('admin.account.edit');
		Route::post('update/{account}', 'AccountController@update')->name('admin.account.edit.post');
		Route::get('delete/{account}', 'AccountController@destroy')->name('admin.account.delete');
		Route::get('status/{account}', 'AccountController@status')->name('admin.account.status');	 
		Route::get('r--status/{account}', 'AccountController@rstatus')->name('admin.account.r_status');	 
		Route::get('w-status/{account}', 'AccountController@wstatus')->name('admin.account.w_status');	 
		Route::get('d-status/{account}', 'AccountController@dstatus')->name('admin.account.d_status');
		Route::get('minu/{account}', 'AccountController@minu')->name('admin.account.minu');				
		// Route::get('status/{minu}', 'AccountController@minustatus')->name('admin.minu.status'); 
	});	 
	
	//--------------------------Agent------------------------------------------

	 Route::group(['prefix' => 'agent'], function() {
	     Route::get('list', 'AgentController@index')->name('admin.agent.list');
	     Route::get('form', 'AgentController@create')->name('admin.agent.form');
	     Route::post('add', 'AgentController@store')->name('admin.agent.post');
	     Route::get('{agent}/view', 'AgentController@show')->name('admin.agent.view');
	     Route::get('{agent}/edit', 'AgentController@edit')->name('admin.agent.edit');
	     Route::get('{agent}/delete', 'AgentController@destroy')->name('admin.agent.delete');
	     Route::get('{agent}/profileedit', 'AgentController@profileedit')->name('admin.agent.profileedit'); 
	     });	 	
	 // ---------------Subject----------------------------------------
	 Route::group(['prefix' => 'activity'], function() {
	     Route::get('/', 'ActivityController@index')->name('admin.activity.list');
	     Route::get('delete/{activity}', 'ActivityController@destroy')->name('admin.activity.delete');
         
	 });
	
	 

});