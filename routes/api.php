<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/post',[App\Http\Controllers\Api\HomepageController::class,'post']);
Route::get('/kategori',[App\Http\Controllers\Api\HomepageController::class,'kategori']);

Route::group(['middleware' => ['api','cors']], function ($router) {
    Route::get('login',[App\Http\Controllers\Api\AuthController::class,'v_login'])->name('api/login');
    Route::post('login',[App\Http\Controllers\Api\AuthController::class,'login']);
    Route::post('register',[App\Http\Controllers\Api\AuthController::class,'register']);
    Route::post('logout', [App\Http\Controllers\Api\AuthController::class,'logout']);
    Route::post('refresh', [App\Http\Controllers\Api\AuthController::class,'refresh']);
    Route::get('me', [App\Http\Controllers\Api\AuthController::class,'me']);
});

// Modul
Route::get('/auth/modul',[App\Http\Controllers\Api\Backoffice\ModulController::class,'index']);
Route::get('/auth/modul/{id}',[App\Http\Controllers\Api\Backoffice\ModulController::class,'show']);
Route::post('/auth/modul',[App\Http\Controllers\Api\Backoffice\ModulController::class,'store']);
Route::put('/auth/modul/{id}',[App\Http\Controllers\Api\Backoffice\ModulController::class,'update']);
Route::delete('/auth/modul/{id}',[App\Http\Controllers\Api\Backoffice\ModulController::class,'destroy']);

// Role
Route::get('/auth/role',[App\Http\Controllers\Api\Backoffice\RoleController::class,'index']);
Route::get('/auth/role/{id}',[App\Http\Controllers\Api\Backoffice\RoleController::class,'show']);
Route::post('/auth/role',[App\Http\Controllers\Api\Backoffice\RoleController::class,'store']);
Route::put('/auth/role/{id}',[App\Http\Controllers\Api\Backoffice\RoleController::class,'update']);
Route::delete('/auth/role/{id}',[App\Http\Controllers\Api\Backoffice\RoleController::class,'destroy']);

// Role Has Permisson
Route::get('/auth/role-has-permission',[App\Http\Controllers\Api\Backoffice\RoleHasPermissionController::class,'index']);
Route::post('/auth/role-has-permission',[App\Http\Controllers\Api\Backoffice\RoleHasPermissionController::class,'store']);
Route::delete('/auth/role-has-permission',[App\Http\Controllers\Api\Backoffice\RoleHasPermissionController::class,'destroy']);

// Kategori
Route::group(['middleware' => ['auth','rolehaspermission:kategori']], function () {
    Route::get('/auth/kategori',[App\Http\Controllers\Api\Backoffice\KategoriController::class,'index']);
    Route::post('/auth/kategori',[App\Http\Controllers\Api\Backoffice\KategoriController::class,'store']);
    Route::get('/auth/kategori/{id}',[App\Http\Controllers\Api\Backoffice\KategoriController::class,'show']);
    Route::put('/auth/kategori/{id}',[App\Http\Controllers\Api\Backoffice\KategoriController::class,'update']);
    Route::delete('/auth/kategori/{id}',[App\Http\Controllers\Api\Backoffice\KategoriController::class,'destroy']);
});

// User
Route::group(['middleware' => ['auth','rolehaspermission:user']], function () {
    Route::get('/auth/user',[App\Http\Controllers\Api\Backoffice\UserController::class,'index']);
    Route::get('/auth/user/{id}',[App\Http\Controllers\Api\Backoffice\UserController::class,'show']);
    Route::post('/auth/user',[App\Http\Controllers\Api\Backoffice\UserController::class,'store']);
    Route::put('/auth/user/{id}',[App\Http\Controllers\Api\Backoffice\UserController::class,'update']);
    Route::delete('/auth/user/{id}',[App\Http\Controllers\Api\Backoffice\UserController::class,'destroy']);
});

// Post
Route::group(['middleware' => ['auth','rolehaspermission:post']], function () {
    Route::get('/auth/post',[App\Http\Controllers\Api\Backoffice\PostController::class,'index']);
    Route::get('/auth/post/{id}',[App\Http\Controllers\Api\Backoffice\PostController::class,'show']);
    Route::post('/auth/post',[App\Http\Controllers\Api\Backoffice\PostController::class,'store']);
    Route::put('/auth/post/{id}',[App\Http\Controllers\Api\Backoffice\PostController::class,'update']);
    Route::delete('/auth/post/{id}',[App\Http\Controllers\Api\Backoffice\PostController::class,'destroy']);
});

Route::get('/kategori/{slug}',[App\Http\Controllers\Api\HomepageController::class,'show_kategori']);
Route::get('/author/{username}',[App\Http\Controllers\Api\HomepageController::class,'author']);
Route::get('/{slug}',[App\Http\Controllers\Api\HomepageController::class,'show_post']);
