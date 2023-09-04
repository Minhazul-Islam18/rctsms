<?php

use App\Livewire\CreateRole;
use App\Livewire\PermissionComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\NoticeBoardComponent;
use App\Livewire\PhotoGalleryComponent;
use Illuminate\Support\Facades\Artisan;
use App\Livewire\SchoolProfileComponent;
use App\Livewire\HomepageSliderComponent;
use App\Livewire\ImportantLinksComponent;
use App\Livewire\GeneralSettingsComponent;
use App\Livewire\HomepageWidgetsComponent;
use App\Http\Controllers\BackendController;
use App\Livewire\ClasslistComponent;
use App\Livewire\DashboardComponent;
use App\Livewire\Frontend\HomepageComponent;
use App\Livewire\Frontend\NoticepageComponent;
use App\Livewire\Frontend\PersonpageComponent;
use App\Livewire\Frontend\TeachingPermissionPageComponent;
use App\Livewire\HeaderFooterSettingsComponent;
use App\Livewire\InstitutionCommitteeComponent;
use App\Livewire\QualityAcceptanceComponent;
use App\Livewire\TeachersStaffsComponent;
use App\Livewire\TeachingPermissionComponent;

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

// Route::get('/test', function () {
//     return  Artisan::call('storage:link');
// });
Route::get('/', HomepageComponent::class)->name('home');
Route::get('/teaching-permission', TeachingPermissionPageComponent::class)->name('teaching-permission');
Route::get('/notice/{title}', NoticepageComponent::class)->name('notice-page');
Route::get('/person/{id}', PersonpageComponent::class)->name('person-page');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/teaching-permission', TeachingPermissionComponent::class)->name('teaching-permission');
    Route::get('/qualification-acceptance', QualityAcceptanceComponent::class)->name('qualification-acceptance');
    Route::get('/teachers-staffs', TeachersStaffsComponent::class)->name('teachers-staffs');
    Route::get('/committee', InstitutionCommitteeComponent::class)->name('committee');
    Route::get('/classes', ClasslistComponent::class)->name('classes');
    Route::get('/image-gallery', PhotoGalleryComponent::class)->name('image-gallery');
    Route::get('/slider-settings', HomepageSliderComponent::class)->name('slider-settings');
    Route::get('/notice', NoticeBoardComponent::class)->name('notice');
    Route::get('/homepage-widgets', HomepageWidgetsComponent::class)->name('homepage-widgets');
    Route::get('/important-links', ImportantLinksComponent::class)->name('important-links');
    Route::get('/', [BackendController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
    Route::get('/settings', GeneralSettingsComponent::class)->name('admin-settings');
    Route::get('/settings/school', SchoolProfileComponent::class)->name('school-settings');
    Route::get('/settings/roles', CreateRole::class)->name('role-settings');
    Route::get('/settings/permissions', PermissionComponent::class)->name('permission-settings');
    Route::get('/settings/header-footer', HeaderFooterSettingsComponent::class)->name('header-footer-settings');
});
