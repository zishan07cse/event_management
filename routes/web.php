<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\GalleriesController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SpeakersController;
use App\Http\Controllers\Admin\SponsorsController;
use App\Http\Controllers\Admin\SubscriptionsController;
use App\Http\Controllers\Admin\VenueController;













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
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
// --------------------------------------------*/
// Route::middleware(['auth', 'user-access:user'])->group(function () {
  
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
// });
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
// Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
//     Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
// });
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/

// Route::group(['middleware' => 'auth', 'prefix' => 'user'], function() {
//     Route::get('home', [HomeController::class, 'adminHome'])->name('admin.home');
// });
 
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    Route::get('home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('admin', AdminController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('faq', FAQController::class);
    Route::resource('galleries', GalleriesController::class);
    Route::resource('hotel', HotelController::class);
    Route::resource('schedule', ScheduleController::class);
    Route::resource('settings', SettingsController::class);
    Route::resource('speakers', SpeakersController::class);
    Route::resource('sponsors', SponsorsController::class);
    Route::resource('subscription', SubscriptionsController::class);
    Route::resource('user', UserController::class);
    Route::resource('venues', VenueController::class);

    // change status //
   // Route::post('category/change_status', [CategoriesController::class, 'change_status'])->name('category.change_status');
   
    // change status //
});