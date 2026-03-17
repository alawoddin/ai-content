<?php

use App\Http\Controllers\Backend\Admin\DocumentController;
use App\Http\Controllers\Backend\Admin\PlanController;
use App\Http\Controllers\Backend\Admin\TemplateController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\Client\UserController;
use App\Http\Controllers\Backend\Client\UserTemplateController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/// User Routes 
Route::middleware(['auth', IsUser::class])->group(function () {

Route::get('/dashboard', function () {
    return view('client.index');
})->name('dashboard');


 Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');

  Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');

  Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
  Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
  Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update'); 


  Route::controller(UserTemplateController::class)->group(function(){
    Route::get('/user/template', 'UserTemplate')->name('user.template');
    Route::get('/user/details/template/{id}', 'UserDetailsTemplate')->name('user.details.template');
    Route::post('/user/content/generate/{id}', 'UserContentGenerate')->name('user.content.generate');


    ///user document route

    Route::get('/user/document', 'UserDocument')->name('user.document');
    
  });

  




});
/// Eend User Routes 

///Admin Route
Route::prefix('admin')->middleware(['auth' ,IsAdmin::class ])->group(function () {


Route::get('/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
Route::post('/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/password/update', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

    Route::controller(PlanController::class)->group(function() {
        Route::get('/all/plans' , 'AllPlans')->name('all.plans');
        Route::get('/add/plans' , 'AddPlans')->name('add.plans');
        Route::post('/store/plans', 'StorePlans')->name('store.plans');
        Route::get('/edit/plans/{id}' , 'EditPlans')->name('edit.plans');
        Route::post('/update/plans', 'UpdatePlans')->name('update.plans');
        Route::get('/delete/plans/{id}', 'DeletePlans')->name('delete.plans');
    });

    Route::controller(TemplateController::class)->group(function() {
        Route::get('/all/template' , 'AllTemplate')->name('all.template');
        Route::get('/add/template', 'AddTemplate')->name('add.template'); 
        Route::post('/store/template', 'StoreTemplate')->name('store.template');

        Route::get('/edit/template/{id}', 'EditTemplate')->name('edit.template'); 
        Route::post('/update/template/{id}', 'UpdateTemplate')->name('update.template');
        Route::get('/details/template/{id}', 'DetailsTemplate')->name('details.template');
        Route::post('/content/generate/{id}', 'AdminContentGenerate')->name('content.generate');
    });

    Route::controller(DocumentController::class)->group(function() {
        Route::get('/all/doucment' , 'AdminDocument')->name("all.doucment");
        Route::get('/edit/document/{id}', 'EditAdminDocument')->name('edit.document');
        Route::post('/update/document/{id}', 'AdminUpdateDocument')->name('update.document'); 
        Route::get('/delete/document/{id}', 'DeleteAdminDocument')->name('delete.document');
    });

});

//End Admin  Route 









Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
  