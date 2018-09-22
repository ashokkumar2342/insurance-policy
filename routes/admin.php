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
		//---------------minu-----------------------------------------	
	Route::prefix('minu')->group(function () {
	    
		Route::get('status/{minu}', 'MinuController@status')->name('admin.minu.status');	 
		Route::get('r--status/{minu}', 'MinuController@rstatus')->name('admin.minu.r_status');	 
		Route::get('w-status/{minu}', 'MinuController@wstatus')->name('admin.minu.w_status');	 
		Route::get('d-status/{minu}', 'MinuController@dstatus')->name('admin.minu.d_status');
		Route::get('minu/{minu}', 'MinuController@minu')->name('admin.minu.minu');	 
	});
	//---------------Class create----------------------------------------
	Route::group(['prefix' => 'class'], function() {
	    Route::get('/', 'ClassTypeController@index')->name('admin.class.list');
	    Route::get('search', 'ClassTypeController@search')->name('admin.class.search');
	    Route::post('add', 'ClassTypeController@store')->name('admin.class.add');
	    Route::get('{classType}/edit', 'ClassTypeController@edit')->name('admin.class.edit');
	    Route::post('{classType}/update', 'ClassTypeController@update')->name('admin.class.update');
	    Route::get('{classType}/delete', 'ClassTypeController@destroy')->name('admin.class.delete');
	});
		//---------------Section Type create----------------------------------------
	Route::group(['prefix' => 'section'], function() {
	    Route::get('/', 'SectionTypeController@index')->name('admin.section.list');
	    Route::get('search', 'SectionTypeController@search')->name('admin.section.search');
	    Route::post('add', 'SectionTypeController@store')->name('admin.section.add');
	    Route::get('{sectionType}/edit', 'SectionTypeController@edit')->name('admin.section.edit');
	    Route::post('{sectionType}/update', 'SectionTypeController@update')->name('admin.section.update');
	    Route::get('{sectionType}/delete', 'SectionTypeController@destroy')->name('admin.section.delete');
	});
	// ---------------Section with class----------------------------------------
	Route::group(['prefix' => 'manage-section'], function() {
	    Route::get('/', 'SectionController@index')->name('admin.manageSection.list');
	    Route::get('search', 'SectionController@search')->name('admin.manageSection.search');
	    Route::post('add', 'SectionController@store')->name('admin.section.add');
	    Route::get('{manageSectionEdit}/edit', 'SectionController@edit')->name('admin.manageSection.edit');
	    Route::post('{manageSection}/update', 'SectionController@update')->name('admin.manageSection.update');
	    Route::get('{manageSection}/delete', 'SectionController@destroy')->name('admin.manageSection.delete');        
	});
		// ---------------User with class----------------------------------------
	Route::group(['prefix' => 'user-class'], function() {
	    Route::get('/', 'AccountController@userClass')->name('admin.userClass.list');	   
	    Route::post('add', 'AccountController@userClassStore')->name('admin.userClass.add');
	    // Route::get('{manageSectionEdit}/edit', 'SectionController@edit')->name('admin.manageSection.edit');
	    // Route::post('{manageSection}/update', 'SectionController@update')->name('admin.manageSection.update');
	    // Route::get('{manageSection}/delete', 'SectionController@destroy')->name('admin.manageSection.delete');        
	});
	//---------------Class fee----------------------------------------
	 Route::group(['prefix' => 'class-fee'], function() {
        Route::group(['prefix' => 'class-fee'], function() {
             Route::get('/', 'ClassFeeController@index')->name('admin.account.classfee.list');
            Route::post('add', 'ClassFeeController@store')->name('admin.account.classfee.add');
            Route::get('{classFee}/edit', 'ClassFeeController@edit')->name('admin.account.classfee.edit');
            Route::post('{classFee}/update', 'ClassFeeController@update')->name('admin.account.classfee.update');
            Route::get('{classFee}/delete', 'ClassFeeController@destroy')->name('admin.account.classfee.delete');
        });
    });
	//---------------Student------------------------------------------

	 Route::group(['prefix' => 'student'], function() {
	     Route::get('add', 'StudentController@create')->name('admin.student.form');
	     Route::get('{student}/view', 'StudentController@show')->name('admin.student.view');
	     Route::get('{student}/edit', 'StudentController@edit')->name('admin.student.edit');
	     Route::get('{student}/delete', 'StudentController@destroy')->name('admin.student.delete');
	     Route::get('{student}/profileedit', 'StudentController@profileedit')->name('admin.student.profileedit');
	     Route::get('{student}/totalfeeedit', 'StudentController@totalfeeedit')->name('admin.student.totalfeeedit');
	     Route::post('{student}/totalfeeupdate', 'StudentController@totalfeeupdate')->name('admin.student.totalfeeupdate');
	     Route::post('add', 'StudentController@store')->name('admin.student.post');
	      Route::post('{student}/update', 'StudentController@update')->name('admin.student.update');
	      Route::post('{student}/profileupdate', 'StudentController@profileupdate')->name('admin.student.profileupdate');

	     Route::get('list', 'StudentController@index')->name('admin.student.list'); 
	     Route::get('huda', 'StudentController@huda')->name('admin.student.huda');
	     Route::get('jind', 'StudentController@jind')->name('admin.student.jind'); 
	     Route::get('{student}/password-reset', 'StudentController@passwordReset')->name('admin.student.passwordreset'); 
	     Route::get('image/{image}', 'StudentController@image')->name('admin.student.image');
	     Route::post('image/{student}/update', 'StudentController@imageUpdate')->name('admin.student.profilepic.update');
	     Route::get('export', 'StudentController@excelData')->name('admin.student.excel');
	     Route::post('import', 'StudentController@importStudent')->name('admin.student.excel.import');
	      
	     });

	 		// ---------------Suject Type----------------------------------------
	 	Route::group(['prefix' => 'subject-type'], function() {
	 	    Route::get('/', 'SubjectTypeController@index')->name('admin.subjectType.list');	
	 	   // Route::get('search', 'SubjectTypeController@search')->name('admin.subject.search');
	 	   Route::post('SubjectType-add', 'SubjectTypeController@store')->name('admin.subjectType.add');
	 	   Route::get('{subjectType}/edit', 'SubjectTypeController@edit')->name('admin.subjectType.edit');
	 	   Route::post('{subjectType}/update', 'SubjectTypeController@update')->name('admin.subjectType.update');
	 	   Route::delete('{subjectType}/delete', 'SubjectTypeController@destroy')->name('admin.subjectType.delete');
	         
	 	}); 
  
	 	// ---------------Subject----------------------------------------
	 	Route::group(['prefix' => 'subject'], function() {
	 	    Route::get('/', 'SubjectController@index')->name('admin.subject.manageSubject');
	 	    Route::get('search', 'SubjectController@search')->name('admin.subject.search');
	 	    Route::post('add', 'SubjectController@store')->name('admin.subject.add');
	 	    Route::get('{manageSubjectEdit}/edit', 'SubjectController@edit')->name('admin.manageSubject.edit');
	 	    Route::post('{manageSubject}/update', 'SubjectController@update')->name('admin.manageSubject.update');
	 	    Route::get('{manageSubject}/delete', 'SubjectController@destroy')->name('admin.manageSubject.delete');        
	 	});
	 // ---------------Subject----------------------------------------
	 Route::group(['prefix' => 'activity'], function() {
	     Route::get('/', 'ActivityController@index')->name('admin.activity.list');
	     Route::get('delete/{activity}', 'ActivityController@destroy')->name('admin.activity.delete');
         
	 });
	
	 

});