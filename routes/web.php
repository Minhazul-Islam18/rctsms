<?php

use App\Livewire\CreateRole;
use App\Livewire\PermissionComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Livewire\GeneralSettingsComponent;
use App\Livewire\HeaderFooterSettingsComponent;
use App\Livewire\HomepageWidgetsComponent;
use App\Livewire\ImportantLinksComponent;
use App\Livewire\NoticeBoardComponent;
use App\Livewire\SchoolProfileComponent;

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
    Route::get('/notice', NoticeBoardComponent::class)->name('notice');
    Route::get('/notice', NoticeBoardComponent::class)->name('notice');
    Route::get('/homepage-widgets', HomepageWidgetsComponent::class)->name('homepage-widgets');
    Route::get('/important-links', ImportantLinksComponent::class)->name('important-links');
    Route::get('/dashboard', [BackendController::class, 'index'])->name('dashboard');
    Route::get('/settings', GeneralSettingsComponent::class)->name('admin-settings');
    Route::get('/settings/school', SchoolProfileComponent::class)->name('school-settings');
    Route::get('/settings/roles', CreateRole::class)->name('role-settings');
    Route::get('/settings/permissions', PermissionComponent::class)->name('permission-settings');
    Route::get('/settings/header-footer', HeaderFooterSettingsComponent::class)->name('header-footer-settings');
});
