<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\SiteSettingsControllers;
use App\Http\Controllers\AboutControllers;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TestimonialControllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Frontend
Route::get('/',[FrontendController::class, 'frontend'])->name('frontend');
// Dashboard
Route::get('dashboard',[BackendController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
//site settings
Route::get('site-settings',[SiteSettingsControllers::class, 'siteSettings'])->middleware(['auth'])->name('siteSettings');
Route::get('edit-site-settings/{slug}',[SiteSettingsControllers::class, 'siteSettingsEdit'])->middleware(['auth'])->name('siteSettingsEdit');
Route::post('update-site-settings',[SiteSettingsControllers::class, 'siteSettingsUpdate'])->middleware(['auth'])->name('siteSettingsUpdate');
// about
Route::get('about-settings',[AboutControllers::class, 'aboutSettings'])->middleware(['auth'])->name('aboutSettings');
Route::get('about-settings-edit/{slug}',[AboutControllers::class, 'aboutSettingsEdit'])->middleware(['auth'])->name('aboutSettingsEdit');
Route::post('update-about-settings',[AboutControllers::class, 'aboutSettingsUpdate'])->middleware(['auth'])->name('aboutSettingsUpdate');
// Testimonial
Route::get('testimonial-list',[TestimonialControllers::class, 'testimonialView'])->middleware(['auth'])->name('testimonialView');
Route::get('add-testimonial',[TestimonialControllers::class, 'testimonialAdd'])->middleware(['auth'])->name('testimonialAdd');
Route::post('update-testimonial',[TestimonialControllers::class, 'testimonialUpdate'])->middleware(['auth'])->name('testimonialUpdate');
Route::get('testimonial-delete/{id}',[TestimonialControllers::class, 'testimonialDelete'])->middleware(['auth'])->name('testimonialDelete');
Route::get('testimonial-edit/{id}',[TestimonialControllers::class, 'testimonialEdit'])->middleware(['auth'])->name('testimonialEdit');
Route::post('testimonial-edit-update',[TestimonialControllers::class, 'testimonialEditUpdate'])->middleware(['auth'])->name('testimonialEditUpdate');
// Skill
Route::get('skills',[SkillController::class, 'skillView'])->middleware(['auth'])->name('skillView');
Route::get('add-skill',[SkillController::class, 'skillAdd'])->middleware(['auth'])->name('skillAdd');
Route::post('update-skill',[SkillController::class, 'skillUpdate'])->middleware(['auth'])->name('skillUpdate');
Route::get('delete-skill/{id}',[SkillController::class, 'skillDelete'])->middleware(['auth'])->name('skillDelete');
Route::get('edit-skill/{slug}',[SkillController::class, 'skillEdit'])->middleware(['auth'])->name('skillEdit');
Route::post('update-edit-skill',[SkillController::class, 'skillEditUpdate'])->middleware(['auth'])->name('skillEditUpdate');
// Social
Route::get('add-social',[SocialController::class,'SocialAdd'])->middleware(['auth'])->name('SocialAdd');
Route::post('post-social',[SocialController::class,'SocialPost'])->middleware(['auth'])->name('SocialPost');
Route::get('socials',[SocialController::class,'SocialView'])->middleware(['auth'])->name('SocialView');
require __DIR__.'/auth.php';
