<?php

use App\Livewire\CreateRole;
use App\Livewire\PermissionComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    // Route::get('/roles&permissions', PostComponent::class . '@getPosts');
    // Route::post('/roles', CreateRole::class . '@createRole')->name('roles.create');
    // Route::put('/roles/{id}', CreateRole::class . '@updateRole')->name('roles.update');
    // Route::delete('/roles/{id}', CreateRole::class . '@deleteRole')->name('roles.update');
    // Route::post('/permissions', PermissionComponent::class . '@createRole')->name('roles.create');
    // Route::put('/permissions/{id}', PermissionComponent::class . '@updateRole')->name('roles.update');
    // Route::delete('/permissions/{id}', PermissionComponent::class . '@deleteRole')->name('roles.update');
});
