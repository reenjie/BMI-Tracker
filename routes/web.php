<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Bmi;
use App\Http\Livewire\Age;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Ranges_model;
use App\Http\Livewire\Recommendation_model;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;
use App\Http\Controllers\CalculationCOntroller;
use App\Http\Controllers\RandomBmiController;
use App\Http\Controllers\RangesController;


use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;


use Illuminate\Http\Request;

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

Route::get('/', function() {
    return redirect('/login');
});

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');

Route::get('/BMI', Bmi::class)->name('BMI');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');
Route::get('endTempSession',function(){
    session()->forget('Temp_userBMI');
    session()->forget('bmi');
    return redirect('/BMI');
})->name('endTempSession');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
  
    Route::get('/profile', Profile::class)->name('profile');
 
    Route::get('BMI-ranges',Ranges_model::class)->name('BMI-ranges');

    Route::get('Recommendation',Recommendation_model::class)->name('Recommendation');

    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');

    Route::get('/MyProfile', UserProfile::class)->name('myProfile');
    Route::get('/user-management', UserManagement::class)->name('user-management');

    Route::get('/Age-ranges', Age::class)->name('Age-ranges');

   
});


Route::controller(CalculationCOntroller::class)->group(function(){
    Route::prefix('calculate')->name('calc.')->group(function(){ 
        
        Route::post('bmi','bmi')->name('bmi');
    
    });


});


Route::controller(RandomBmiController::class)->group(function(){
    Route::prefix('Random')->name('rand.')->group(function(){
        Route::get('store','store')->name('store');
        Route::get('index','index')->name('index');
        Route::get('index','index')->name('index');
        Route::post('update','update')->name('update');
        Route::get('destroy','destroy')->name('destroy');

    });

});

Route::controller(RangesController::class)->group(function(){
    Route::prefix('BMI')->name('bmirange.')->group(function(){
        Route::get('store','store')->name('store');
      
        Route::get('index','index')->name('index');
        Route::post('update','update')->name('update');
        Route::get('destroy','destroy')->name('destroy');

    });

});




