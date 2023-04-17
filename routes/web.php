<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\roleController;
use App\Http\Controllers\userController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\newpdwController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\LeavesController;

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


Route::get('/', '\App\Http\Controllers\indexController@index',)->middleware('auth');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




});
Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', roleController::class);
    Route::resource('users', userController::class);
    Route::resource('myprofile',myprofileController ::class);

});

// ----------------------------- form holiday ------------------------------//
Route::controller(HolidayController::class)->group(function () {
    Route::get('form/holidays/new', 'holiday')->middleware('auth')->name('form/holidays/new');
    Route::post('form/holidays/save', 'saveRecord')->middleware('auth')->name('form/holidays/save');
    Route::post('form/holidays/update', 'updateRecord')->middleware('auth')->name('form/holidays/update');
});

// ----------------------------- form leaves ------------------------------//
Route::controller(LeavesController::class)->group(function () {
    Route::get('form/leavesettings/page', 'leaveSettings')->middleware('auth')->name('form/leavesettings/page');
    Route::get('form/leaves/new', 'leaves')->middleware('auth')->name('form/leaves/new');
    Route::get('form/leavesemployee/new', 'leavesEmployee')->middleware('auth')->name('form/leavesemployee/new');
    Route::post('form/leaves/save', 'saveRecord')->middleware('auth')->name('form/leaves/save');
    Route::post('form/leaves/edit', 'editRecordLeave')->middleware('auth')->name('form/leaves/edit');
    Route::post('form/leaves/edit/delete','deleteLeave')->middleware('auth')->name('form/leaves/edit/delete');
});



require __DIR__.'/auth.php';
