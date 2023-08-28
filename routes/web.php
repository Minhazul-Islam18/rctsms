<?php

use App\Livewire\CreateRole;
use App\Livewire\PermissionComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Livewire\GeneralSettingsComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/dashboard', [BackendController::class, 'index'])->name('dashboard');
    Route::get('/settings', GeneralSettingsComponent::class)->name('admin-settings');
    Route::get('/settings/roles', CreateRole::class)->name('role-settings');
    Route::get('/settings/permissions', PermissionComponent::class)->name('permission-settings');
});
