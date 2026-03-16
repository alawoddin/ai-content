<?php

use App\Http\Controllers\Backend\Admin\DocumentController;
use App\Http\Controllers\Backend\Admin\PlanController;
use App\Http\Controllers\Backend\Admin\TemplateController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

///User Route
Route::middleware(['auth' ,IsUser::class ])->group(function () {

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


});

//End User Route

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
        Route::get('/doucment' , 'AdminDocument')->name("admin.doucment");
    });

});

//End Admin  Route 









Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
  