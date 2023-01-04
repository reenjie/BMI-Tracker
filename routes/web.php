<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Bmi;
use App\Http\Livewire\Age_controller;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;


use App\Http\Livewire\Ranges_model;
use App\Http\Livewire\Recommendation_model;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;
use App\Http\Livewire\Mealplan;



use App\Http\Controllers\CalculationCOntroller;
use App\Http\Controllers\RandomBmiController;
use App\Http\Controllers\RangesController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\AgeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MealplanController;





/* Users */
use App\Http\Livewire\Userlanding;

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
    return redirect('/BMI');
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

    Route::get('/Age-ranges', Age_controller::class)->name('Age-ranges');
    Route::get('/Information',Userlanding::class)->name('Information');

    
    Route::get('/Meal-Plan',Mealplan::class)->name('Meal-Plan');

   
});


Route::controller(CalculationCOntroller::class)->group(function(){
    Route::prefix('calculate')->name('calc.')->group(function(){ 
        
        Route::post('bmi','bmi')->name('bmi');
        Route::post('calculateTER','ter')->name('dbwter');

        Route::get('recalculate','Recalculate')->name('Recalculate');
    
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

Route::controller(RecommendationController::class)->group(function(){
    Route::prefix('Recommend')->name('rec.')->group(function(){
        Route::post('store','store')->name('store');
      
        Route::get('index','index')->name('index');
        Route::post('update','update')->name('update');
        Route::get('destroy','destroy')->name('destroy');

    });

});

Route::controller(AgeController::class)->group(function(){
    Route::prefix('age')->name('age.')->group(function(){
        Route::post('store','store')->name('store');
      
        Route::get('index','index')->name('index');
        Route::post('update','update')->name('update');
        Route::get('destroy','destroy')->name('destroy');


    });

});

Route::controller(UserController::class)->group(function(){
    Route::prefix('user')->name('user.')->group(function(){
      
        Route::get('destroy','destroy')->name('destroy');

        Route::get('verify','verify')->name('verify');
        Route::post('store','store')->name('store');
        
        Route::post('changepass','changepass')->name('changepass');
    });

});

Route::controller(MealplanController::class)->group(function(){
    Route::prefix('mealplan')->name('meal.')->group(function(){
      
     Route::post('saveplan','saveplan')->name('saveplan');
     Route::get('updatecontent','updatecontent')->name('updatecontent');

     Route::get('manage','manage')->name('manage');
     Route::get('mealcontent','mealcontent')->name('mealcontent');

       
    });

});






