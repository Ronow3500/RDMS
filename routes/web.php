<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController;
//use RespondentController;
use App\Http\Controllers\RespondentController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\SubCountyController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SubLocationController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\ConstituencyController;
use App\Http\Controllers\AgeGroupController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\EducationLevelController;
use App\Http\Controllers\MaritalStatusController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\EthnicGroupController;
use App\Http\Controllers\EmploymentStatusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('dashboard', function () {
    return view('home.dashboard');
})->name('dashboard');

/**
 * User Profile Routes
 */
Route::prefix('user')->middleware(['auth'])->name('user.')->group(function ()
{
    Route::get('profile', ProfileController::class)->name('profile');
});

/**
 * Admin Users Route
 */
 Route::prefix('admin')->middleware(['auth','auth.is-admin'])->name('admin.')->group(function ()
 {
     Route::resource('/users', UserController::class);
 });

/**
 * Managers Route
 */
 Route::prefix('manager')->middleware('auth')->name('manager.')->group(function ()
 {
     Route::resource('/users', UserController::class);
 });

 /**
 * Respondents Filter Route
 */
 Route::get('respondents.filter', [RespondentController::class, 'filter'])->middleware('auth')->name('respondents.filter');
 // Respondents Resource Routes
 Route::middleware('auth')->resource('respondents', RespondentController::class);

/**
 * Excel/CSV Import & Export Routes
 */
Route::get('/import_form', [RespondentController::class, 'import_form'])->middleware('auth')->name('import_form');
Route::post('/respondents/import', [RespondentController::class, 'import'])->middleware(('auth'))->name('respondents.import');

Route::get('/export-excel', [RespondentController::class, 'exportIntoExcel'])->name('export-excel');
Route::get('/export-csv', [RespondentController::class, 'exportIntoCsv'])->name('export-csv');
// Filtered 
Route::get('/filtered-by-county-export-csv', [RespondentController::class, 'exportIntoExcelFilteredByCounty'])->name('filtered-by-county-export-csv');

Route::get('/user', [UserController::class, 'index']);

/**
 * CRUD Resource Routes
 */

// Gender Routes
 Route::middleware('auth')->resource('gender', GenderController::class);
 // Region Routes
 Route::middleware('auth')->resource('region', RegionController::class);
 // County Routes
 Route::middleware('auth')->resource('county', CountyController::class);
 // Sub County Routes
 Route::middleware('auth')->resource('sub_county', SubCountyController::class);
 // District Routes
 Route::middleware('auth')->resource('district', DistrictController::class);
 // Division Routes
 Route::middleware('auth')->resource('division', DivisionController::class);
 // Location Routes
 Route::middleware('auth')->resource('location', LocationController::class);
 // Sub Location Routes
 Route::middleware('auth')->resource('sub_location', SubLocationController::class);
 // Ward Routes
 Route::middleware('auth')->resource('ward', WardController::class);
 // Constituency Routes
 Route::middleware('auth')->resource('constituency', ConstituencyController::class);
 // Age Group Routes
 Route::middleware('auth')->resource('age_group', AgeGroupController::class);
 // Constituency Routes
 Route::middleware('auth')->resource('setting', SettingController::class);
 // Education Level Routes
 Route::middleware('auth')->resource('education_level', EducationLevelController::class);
 // Marital Status Routes
 Route::middleware('auth')->resource('marital_status', MaritalStatusController::class);
 // Religion Routes
 Route::middleware('auth')->resource('religion', ReligionController::class);
 // Religion Routes
 Route::middleware('auth')->resource('ethnic_group', EthnicGroupController::class);
 // Employment Status
Route::middleware('auth')->resource('employment_status', EmploymentStatusController::class);