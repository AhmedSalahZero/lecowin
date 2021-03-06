<?php

use Illuminate\Support\Facades\Route;

/*
 * Admin Routes
 * */


Route::prefix('admin')->middleware('admin')->group(function()
{
    Route::get('/','Admin\HomePageController@index')->name('admin.home');
    Route::get('users','Admin\UsersController@index')->name('users.show');
    Route::Resource('libraries','Admin\LibrariesController');
    Route::get('transactions','Admin\TransactionsController@index')->name('transactions.index');
    Route::get('transactions/{user}','Admin\TransactionsController@show')->name('transactions.show');
    Route::post('transactions/{user}','Admin\TransactionsController@add')->name('add.transaction');
    Route::post('transactions/{user}/active','Admin\TransactionsController@ActivationUser')->name('admin.active');
    Route::get('settings','Admin\SettingsController@index')->name('settings.index');
    Route::post('settings','Admin\SettingsController@update')->name('settings.update');
    Route::get('setting/get/costs/{level}','Admin\SettingsController@getLevelCost')->name('costs.get');
    Route::post('setting/costs/store','Admin\SettingsController@storeLevelCost')->name('costs.update');
    Route::get('sendNotification','Admin\SettingsController@sendNotification')->name('admin.send.notification');
    Route::post('sendNotification','Admin\SettingsController@storeNotification')->name('admin.store.notification');
    Route::post('controlLiveChat','Admin\SettingsController@controlLiveChat')->name('admin.control.chat');


});
// GuestRoutes

    Route::middleware(['guest:web','localization'])->prefix('{lang}')->group(function (){
    Route::get('login','Guest\loginController@login')->name('login.index');
    Route::post('login','Guest\loginController@submitLogin')->name('login.submit');
    Route::get('register','Guest\RegisterController@index')->name('register.index');
    Route::get('register/{code}','Guest\RegisterController@registerUSer')->name('register.user');
    Route::post('register/{token}','Guest\RegisterController@store')->name('register.store');
    Route::get('forget-password','Guest\forgetPasswordController@index')->name('forget.password.index');
    Route::post('forget-password','Guest\forgetPasswordController@store')->name('forget.password.store');
    Route::get('password/reset/{token}/{email}','Guest\ResetPasswordController@index')->name('reset.password.index');
    Route::post('password/reset/{token}','Guest\ResetPasswordController@store')->name('reset.password.store');
    Route::get('verifyEmailAddress/{token}','Guest\verifyEmailController@index')->name('verify.email');

});

// Auth() [admin or user]

Route::middleware(['auth:web','expiredAccount','localization','markAsVisited'])->prefix('{lang}')->group(function (){

    Route::get('/logout','Admin\logoutController@logout')->name('admin.logout');

    Route::get('/account/setting','User\AccountController@setting')->name('user.account.setting');
    Route::post('/account/setting','User\AccountController@saveAccountInfo')->name('user.account.save');
    Route::post('/account/setting/changeProfileImage','user\AccountController@changeProfileImage')->name('user.account.change.image');
    Route::post('/account/setting/changePassportImage','user\AccountController@changePassportImage')->name('user.change.passport.image');

    Route::post('/account/setting/changeProfilePassword','user\AccountController@changeProfilePassword')->name('user.account.change.password');
    Route::get('/networkers','User\NetWorkerController@index')->name('user.networkers.show')->middleware('activatedUser');
    Route::get('/libraries','User\HomeController@show')->name('main.libraries.show');
    Route::get('/libraries/{library}','User\HomeController@showFile')->name('display.file');
    Route::resource('tasks' ,'User\tasksController');
    Route::get('calendar' ,'User\tasksController@calendar')->name('tasks.calendar');
    Route::get('/completedTask/{task}','User\tasksController@completedTask')->name('task.completed');
    Route::get('/archive/{task}','User\tasksController@archiveTask')->name('task.archive');
    Route::get('/archive','User\tasksController@getArchivedTasks')->name('get.archived.tasks');
    Route::post('/active/{user}','User\AccountController@activeMyAccount')->name('user.active');
    Route::get('userTransaction','User\TransactionsController@index')->name('user.transactions');
    Route::post('userTransaction','User\TransactionsController@confirmReceiver')->name('user.confirm.receiver');
    Route::post('transfer-money','User\TransactionsController@transferMoney')->name('user.transfer.money');
    Route::get('/wallet','User\TransactionsController@wallet')->name('wallet.index');
    Route::get('/','User\HomeController@index')->name('user.home');
    Route::post('/notifications/unread/{user}','User\HomeController@markNotificationsAsRead')->name('user.notifications.read');
    Route::post('change-transfer-password','User\AccountController@changeTransferPassword')->name('change.transfer.password');
    // linear netWorker
    Route::get('/networkers/linears','User\NetWorkerController@showLinear')->name('user.networkers.show.linear')->middleware('activatedUser');
    Route::get('/networkers/fourth','User\NetWorkerController@showFourth')->name('user.networkers.show.fourth')->middleware('activatedUser');
    Route::get('/networkers/my-parents','User\NetWorkerController@myParents')->name('user.networkers.show.my.parents')->middleware('activatedUser');
    Route::get('/networkers/my-children/{user}','User\NetWorkerController@myChildren')->name('user.networkers.show.my.children')->middleware('activatedUser');
    Route::post('/task/edit/{task}','User\tasksController@editWithAjax');
    Route::get('myGoal','User\tasksController@goals')->name('tasks.goals');
    Route::post('myGoal/store','User\tasksController@storeGoal')->name('tasks.goals.store'); //Ajax

});
Route::get('/profile/{code}','User\AccountController@index')->name('profile.index')->middleware('localization')->prefix('{lang}');
Route::redirect('/','/en');

