<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\SiteSettingsControllers;
use App\Http\Controllers\AboutControllers;
use App\Http\Controllers\PortfoliosController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
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
// portfolio
Route::get('portfolio/{slug}',[FrontendController::class, 'frontendPort'])->name('frontendPort');
// Dashboard
Route::get('dashboard',[BackendController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
//site settings
Route::get('site-settings',[SiteSettingsControllers::class, 'siteSettings'])->middleware(['auth'])->name('siteSettings');
Route::get('dashboard/site-settings/edit-site-settings/{slug}',[SiteSettingsControllers::class, 'siteSettingsEdit'])->middleware(['auth'])->name('siteSettingsEdit');
Route::post('dashboard/site-settings/update-site-settings',[SiteSettingsControllers::class, 'siteSettingsUpdate'])->middleware(['auth'])->name('siteSettingsUpdate');
// about
Route::get('dashboard/about-settings',[AboutControllers::class, 'aboutSettings'])->middleware(['auth'])->name('aboutSettings');
Route::get('dashboard/about-settings/about-settings-edit/{slug}',[AboutControllers::class, 'aboutSettingsEdit'])->middleware(['auth'])->name('aboutSettingsEdit');
Route::post('dashboard/about-settings/update-about-settings',[AboutControllers::class, 'aboutSettingsUpdate'])->middleware(['auth'])->name('aboutSettingsUpdate');
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
Route::get('socials',[SocialController::class,'SocialView'])->middleware(['auth'])->name('SocialView');
Route::get('add-social',[SocialController::class,'SocialAdd'])->middleware(['auth'])->name('SocialAdd');
Route::post('post-social',[SocialController::class,'SocialPost'])->middleware(['auth'])->name('SocialPost');
Route::get('edit-social/{id}',[SocialController::class,'socialEdit'])->middleware(['auth'])->name('socialEdit');
Route::post('update-social',[SocialController::class,'SocialUpdate'])->middleware(['auth'])->name('SocialUpdate');
Route::post('update-social-priority',[SocialController::class,'socialPriorityUpdate'])->middleware(['auth'])->name('socialPriorityUpdate');
Route::get('delete-social/{id}',[SocialController::class,'SocialDelete'])->middleware(['auth'])->name('SocialDelete');
Route::get('get/master-url/{socialId}',[SocialController::class,'SocialId'])->middleware(['auth'])->name('SocialId');
// social sites
Route::get('social-sites',[SocialController::class,'SocialSiteView'])->middleware(['auth'])->name('SocialSiteView');
Route::get('add-social-site',[SocialController::class,'SocialSiteAdd'])->middleware(['auth'])->name('SocialSiteAdd');
Route::get('delete-social-site/{id}',[SocialController::class,'SocialSiteDelete'])->middleware(['auth'])->name('SocialSiteDelete');
Route::post('post-social-site',[SocialController::class,'SocialSitePost'])->middleware(['auth'])->name('SocialSitePost');
Route::get('edit-social-site/{id}',[SocialController::class,'SocialSiteEdit'])->middleware(['auth'])->name('SocialSiteEdit');
Route::post('update-social-site',[SocialController::class,'SocialSiteUpdate'])->middleware(['auth'])->name('SocialSiteUpdate');
// Portfolios
Route::get('dashboard/portfolios',[PortfoliosController::class,'PortfolioView'])->middleware(['auth'])->name('PortfolioView');
Route::get('dashboard/portfolios/{slug}/details',[PortfoliosController::class,'PortfolioDetails'])->middleware(['auth'])->name('PortfolioDetails');
Route::get('dashboard/portfolios/add-portfolio',[PortfoliosController::class,'PortfolioAdd'])->middleware(['auth'])->name('PortfolioAdd');
Route::post('dashboard/portfolios/post-portfolio',[PortfoliosController::class,'PortfolioPost'])->middleware(['auth'])->name('PortfolioPost');
Route::get('dashboard/portfolios/{slug}/edit-portfolio',[PortfoliosController::class,'PortfolioEdit'])->middleware(['auth'])->name('PortfolioEdit');
Route::post('dashboard/portfolios/update-portfolio',[PortfoliosController::class,'PortfolioUpdate'])->middleware(['auth'])->name('PortfolioUpdate');
Route::get('dashboard/portfolios/{slug}/delete-portfolio',[PortfoliosController::class,'PortfolioDelete'])->middleware(['auth'])->name('PortfolioDelete');
// Roles
Route::get('dashboard/role/assign/user',[RoleController::class,'assignUser'])->middleware(['auth'])->name('assign.user');
Route::post('dashboard/role/assign/user/post',[RoleController::class,'assignUserPost'])->middleware(['auth'])->name('assign.user.post');
Route::get('dashboard/user/role/edit/{id}',[RoleController::class,'userRoleEdit'])->middleware(['auth'])->name('user.role.edit');
Route::post('dashboard/user/role/edit/post',[RoleController::class,'userRoleEditPost'])->middleware(['auth'])->name('user.role.edit.post');
Route::resource('role', RoleController::class)->middleware(['auth']);
// Service
Route::get('get/icon/{id}',[ServiceController::class, 'getIcon'])->name('getIcon')->middleware(['auth']);
Route::resource('service', ServiceController::class);


require __DIR__.'/auth.php';
