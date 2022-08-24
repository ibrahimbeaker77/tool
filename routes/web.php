<?php
use Illuminate\Support\Facades\Route;

/* Laravel Roles & Permissions */
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;

/* Admin Dashboard */
use App\Http\Controllers\AdminController;

/* Users */
use App\Http\Controllers\UserController;

/* Blogs */
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BlogCategoriesController;

/* Profile */
use App\Http\Controllers\ProfileController;

/* Subscribers */
use App\Http\Controllers\SubscribersController;

/* Social links */
use App\Http\Controllers\SocialLinksController;

/* Contact Us */
use App\Http\Controllers\ContactController;

/* FAQs */
use App\Http\Controllers\FaqsController;

/* Testimonials */
use App\Http\Controllers\TestimonialsController;

/* Advertise */
use App\Http\Controllers\AdvertiseController;

/* Pages */
use App\Http\Controllers\PagesController;

/* Packages */
use App\Http\Controllers\PackagesController;

/* Company information */
use App\Http\Controllers\CompanyInformationController;

/* Tools */
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\ToolCategoriesController;
 
//get sidebar
use App\Http\Controllers\primeController;

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

// Route::get('/', function ()
// {
//     return view('frontend.index');
// });

Route::get('/',[primeController::class, 'toolPrime']);

Auth::routes();

Route::group(['middleware' => ['auth', 'verified', 'Admin']], function()
{
    Route::resource('/permissions', PermissionsController::class);
    Route::resource('/roles', RolesController::class);
    Route::resource('/users', UserController::class);

    Route::get('/dashboard', [AdminController::class,'index'])->name('dashboard');
    Route::resource('/profile', ProfileController::class);
    Route::resource('/subscribers', SubscribersController::class);
    Route::resource('/social-links', SocialLinksController::class);
    Route::resource('/contact', ContactController::class);

    Route::resource('/blogs', BlogsController::class);
    Route::resource('/blogs-category', BlogCategoriesController::class);

    Route::resource('/faqs', FaqsController::class);
    Route::resource('/testimonials', TestimonialsController::class);
    Route::resource('/advertise', AdvertiseController::class);
    Route::resource('/pages', PagesController::class);
    Route::resource('/packages', PackagesController::class);
    Route::resource('/company-information', CompanyInformationController::class);

    Route::resource('/tools', ToolsController::class);
    Route::resource('/tools-category', ToolCategoriesController::class);
});