<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => ['auth','role:super-admin|admin|user']], function() {
    Route::resource('permissions',PermissionController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('users',UserController::class);

    Route::get('roles/{roldeId}/give-permissions',[RoleController::class,'addPermissionToRole']);
    Route::put('roles/{roldeId}/give-permissions',[RoleController::class,'givePermissionToRole']);

    Route::get('permissions/{id}/delete',[PermissionController::class,'destroy']);
    Route::get('roles/{id}/delete',[RoleController::class,'destroy'])->middleware('permission:delete role');
    Route::get('users/{id}/delete',[UserController::class,'destroy']);
});

require __DIR__.'/auth.php';
