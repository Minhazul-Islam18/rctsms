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
use App\Livewire\ClassRoutineComponent;
use App\Livewire\ClassSyllabusComponent;
use App\Livewire\CoCurriculumComponent;
use App\Livewire\DashboardComponent;
use App\Livewire\Frontend\AcademicClassesPageComponent;
use App\Livewire\Frontend\ClassRoutinesPageComponent;
use App\Livewire\Frontend\CoCurriculumPageComponent;
use App\Livewire\Frontend\ContactPageComponent;
use App\Livewire\Frontend\FormerCommitteePageComponent;
use App\Livewire\Frontend\FormerStaffsPageComponent;
use App\Livewire\Frontend\FormerTeacherStaffsPageComponent;
use App\Livewire\Frontend\HomepageComponent;
use App\Livewire\Frontend\InstituteHistoryPageComponent;
use App\Livewire\Frontend\InstitutionalCommitteePageComponent;
use App\Livewire\Frontend\NoticepageComponent;
use App\Livewire\Frontend\PersonpageComponent;
use App\Livewire\Frontend\QualityAcceptancePageComponent;
use App\Livewire\Frontend\StaffsPageComponent;
use App\Livewire\Frontend\StudentsPageComponent;
use App\Livewire\Frontend\SyllabusPageComponent;
use App\Livewire\Frontend\TeachersPageComponent;
use App\Livewire\Frontend\TeachingPermissionPageComponent;
use App\Livewire\HeaderFooterSettingsComponent;
use App\Livewire\InstitutionCommitteeComponent;
use App\Livewire\QualityAcceptanceComponent;
use App\Livewire\TeachersStaffsComponent;
use App\Livewire\TeachingPermissionComponent;
use App\Models\CoCurriculum;

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
Route::get('/routines', ClassRoutinesPageComponent::class)->name('routines-page');
Route::get('/syllabuses', SyllabusPageComponent::class)->name('syllabuses-page');
Route::get('/co-curriculums', CoCurriculumPageComponent::class)->name('co-curriculums-page');
Route::get('/contact', ContactPageComponent::class)->name('contact-page');
Route::get('/students', StudentsPageComponent::class)->name('students-page');
Route::get('/institute-history', InstituteHistoryPageComponent::class)->name('institute-history-page');
Route::get('/former-teachers', FormerTeacherStaffsPageComponent::class)->name('former-teachers-page');
Route::get('/former-staffs', FormerStaffsPageComponent::class)->name('former-staffs-page');
Route::get('/teachers', TeachersPageComponent::class)->name('teachers-page');
Route::get('/staffs', StaffsPageComponent::class)->name('staffs-page');
Route::get('/acceptances', QualityAcceptancePageComponent::class)->name('acceptances-page');
Route::get('/former-committees', FormerCommitteePageComponent::class)->name('former-committees-page');
Route::get('/committees', InstitutionalCommitteePageComponent::class)->name('committees-page');
Route::get('/academic-classes', AcademicClassesPageComponent::class)->name('academic-classes-page');
Route::get('/teaching-permission', TeachingPermissionPageComponent::class)->name('teaching-permission-page');
// Route::get('/teaching-permission', TeachingPermissionPageComponent::class)->name('teaching-permission');
Route::get('/notice/{title}', NoticepageComponent::class)->name('notice-page');
Route::get('/person/{id}', PersonpageComponent::class)->name('person-page');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'admin']], function () {
    Route::get('/co-curriculum', CoCurriculumComponent::class)->name('co-curriculum');
    Route::get('/syllabus', ClassSyllabusComponent::class)->name('syllabus');
    Route::get('/routines', ClassRoutineComponent::class)->name('routines');
    // Route::get('/students', TeachingPermissionComponent::class)->name('students');
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
    Route::get('/', DashboardComponent::class)->name('admin.dashboard');
    Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
    Route::get('/settings', GeneralSettingsComponent::class)->name('admin-settings');
    Route::get('/settings/school', SchoolProfileComponent::class)->name('school-settings');
    Route::get('/settings/roles', CreateRole::class)->name('role-settings');
    Route::get('/settings/permissions', PermissionComponent::class)->name('permission-settings');
    Route::get('/settings/header-footer', HeaderFooterSettingsComponent::class)->name('header-footer-settings');
});
