<?php

Route::get(
    'cache-clear',
    function () {
        \Artisan::call('cache:clear');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    \Artisan::call('clear-compiled');
    \Artisan::call('config:cache');

        return 'cleared';
    }
);

Route::redirect('/', 'admin/home');

Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
	//Home Route
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/save-draft', 'HomeController@saveDraft')->name('save-draft');
    Route::post('/save-event', 'HomeController@saveEvent')->name('save-event');
    Route::post('/send-message', 'HomeController@sendMessage')->name('send-message');
    Route::post('/send-message-emp', 'HomeController@sendMessageToEmployee')->name('send-message-emp');
    Route::get('/get-draft', 'HomeController@getDraft')->name('get-draft');
    Route::get('/get-draft-emp', 'HomeController@getDraftEmp')->name('get-draft-emp');
    Route::post('/emp-info', 'HomeController@empInfo')->name('emp-info');
    Route::post('/edit-profile', 'HomeController@editProfile')->name('edit-profile');
    Route::post('/update-profile', 'HomeController@updateProfile')->name('update-profile');
    Route::get('/calendar-info', 'HomeController@calendarInfo')->name('calendar-info');
    Route::post('/edit-draft', 'HomeController@editDraft')->name('edit-draft');
    Route::post('/update-draft', 'HomeController@updateDraft')->name('update-draft');
    Route::post('/update-draft-form', 'HomeController@updateDraftForm')->name('update-draft-form');
    Route::post('/save-send-draft', 'HomeController@saveSendDraft')->name('save-send-draft');
    Route::post('/send-message-woc', 'HomeController@sendMessageWoc')->name('send-message-woc');
    Route::post('/draft-filter', 'HomeController@draftFilter')->name('filter.draft');

    //Home Route
    Route::get('/blank', function(){
        return view('admin.blank');
    });

    Route::get('/fullcalendar','FullCalendarController@index')->name('fullcalendar-index');

    //Permission Route
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');

    //Roles Route
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    
    //Users Route
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
});
