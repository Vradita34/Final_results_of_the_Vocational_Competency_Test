<?php

use App\Http\Controllers\AdminControler;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(ReaderController::class)->group(function(){
    Route::get('/','homepage')->name('dashboard');
    Route::get('/book_detail/{id}','book_detail')->name('book_detail');
    Route::middleware('auth')->group(function(){
        Route::get('/book_viewer/{id}','book_viewer')->name('book_viewer');
        Route::get('/collection','collection')->name('collection');
        Route::get('/myPermissions','myPermissions')->name('myPermissions');
        Route::post('/send_request_permit/{id}','send_request_permit')->name('send_request_permit');
        Route::post('/addCollection/{id}','addCollection')->name('addCollection');
        Route::post('/addIzin/{id}','addIzin')->name('addIzin');
        Route::put('/editReview/{id}','editReview')->name('editReview');
        Route::put('/updateProfile','updateProfile')->name('updateProfile');
        Route::post('/addReview/{id}','addReview')->name('addReview');
        Route::delete('/deleteReview/{id}','deleteReview')->name('deleteReview');
        Route::delete('/removeCollection/{id}','removeCollection')->name('removeCollection');
        Route::delete('/cancelPermission/{id}','cancelPermission')->name('cancelPermission');
    });
});

Route::middleware(['auth','role:admin,librarian'])->group(function(){
    Route::controller(AdminControler::class)->group(function(){
        Route::get('/dashboardAdmin','dashboard')->name('dashboardAdmin');
        Route::get('/newPermissions','newPermissions')->name('newPermissions');
        Route::get('/oldPermissions','oldPermissions')->name('oldPermissions');
        Route::put('/handlePermissions/{id}','handlePermissions')->name('handlePermissions');
        Route::get('/printPermissions','printPermission')->name('printPermission');
        Route::get('/printBookPopular','printBookPopular')->name('printBookPopular');
    });
    Route::resource('/users',UserController::class);
    Route::resource('/category',CategoryController::class);
    Route::resource('/genres',GenresController::class);
    Route::resource('/authors',AuthorsController::class);
    Route::resource('/books',BookController::class);

});
Route::middleware(['guest'])->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('/login','login')->name('login');
        Route::get('/register','register')->name('register');
        Route::post('/register_action','register_action')->name('register_action');
        Route::post('/login_action','login_action')->name('login_action');
    });

});

Route::post('/logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');
