<?php
 

Route::get('login', 'Auth\LoginController@showLoginForm')->name('student.login');
Route::get('student-password/reset', 'Auth\ForgetPasswordController@sendResetLinkEmail')->name('student.password.email');
Route::get('student-password/reset', 'Auth\ForgetPasswordController@showLinkRequestForm')->name('student.password.request');
Route::get('logout', 'Auth\LoginController@logout')->name('student.logout.get');
Route::post('login', 'Auth\LoginController@login');
Route::group(['middleware' => 'student'], function() {
	Route::get('dashboard', 'DashboardController@index')->name('student.dashboard');
		//--------------------------Agent------------------------------------------ 
     Route::get('list', 'AgentController@index')->name('agent.list');
     Route::get('form', 'AgentController@create')->name('agent.form');
     Route::post('add', 'AgentController@store')->name('agent.post');
     Route::get('{agent}/view', 'AgentController@show')->name('agent.view');
     Route::get('{agent}/edit', 'AgentController@edit')->name('agent.edit');
     Route::get('{agent}/delete', 'AgentController@destroy')->name('agent.delete'); 

     Route::group(['prefix' => 'policy'], function() {
        Route::get('form', 'PolicyController@create')->name('policy.form'); 
        Route::post('store', 'PolicyController@store')->name('policy.post'); 
     });
});
 

 