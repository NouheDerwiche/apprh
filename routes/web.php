<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\roleController;
use App\Http\Controllers\userController;
use App\Http\Controllers\CongeController;

use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\newpdwController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FicheDePaieController;

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
    Route::resource('projet', ProjetController::class);
    Route::get('/tache', [TacheController::class, 'index'])->name('tache.index');
    Route::get('/tache/create', [TacheController::class, 'create'])->name('tache.create');
    Route::post('/tache', [TacheController::class, 'store'])->name('tache.store');
    Route::get('/tache/{id}', [TacheController::class, 'show'])->name('tache.show');
    Route::get('/tache/{id}/edit', [TacheController::class, 'edit'])->name('tache.edit');
    Route::patch('/tache/{id}', [TacheController::class, 'update'])->name('tache.update');
    Route::delete('/tache/{id}', [TacheController::class, 'destroy'])->name('tache.destroy');



});

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', roleController::class);
    Route::resource('users', userController::class);
    Route::resource('fiche_de_paie', FicheDePaieController::class);
    Route::get('/fiche_de_paie/{id}/imprimer', [FicheDePaieController::class, 'imprimer'])->name('fiche_de_paie.imprimer');

    Route::post('/send-email', [userController::class, 'sendEmail'])->name('send.email');
    Route::get('/send-email', [userController::class, 'sendEmail'])->name('send.email');


    Route::post('/update-solde', [userController::class, 'updateSolde'])->name('update-solde');

    Route::resource('myprofile',myprofileController ::class);
    Route::resource("projets", ProjetController::class);


});




// ----------------------------- form jour_Feries ------------------------------//

Route::group(['middleware' => ['auth']], function() {
Route::get('/holidays', [HolidayController::class, 'index'])->name('holidays.index');
Route::get('/holidays/create', [HolidayController::class, 'create'])->name('holidays.create');
Route::post('/holidays', [HolidayController::class, 'store'])->name('holidays.store');
Route::get('/holidays/{id}/edit', [HolidayController::class, 'edit'])->name('holidays.edit');
Route::put('/holidays/{id}', [HolidayController::class, 'update'])->name('holidays.update');
Route::delete('/holidays/{id}', [HolidayController::class, 'destroy'])->name('holidays.destroy');
Route::get('/holidays/{id}', [HolidayController::class, 'show'])->name('holidays.show');


});
// ----------------------------- form leaves ------------------------------//

Route::group(['middleware' => ['auth']], function() {
Route::get('/conges', [CongeController::class, 'index'])->name('conges.index');
Route::get('/conges/create', [CongeController::class, 'create'])->name('conges.create');
Route::post('/conges', [CongeController::class, 'store'])->name('conges.store');
Route::get('/conges/{conge}/edit', [CongeController::class, 'edit'])->name('conges.edit');
Route::put('/conges/{conge}', [CongeController::class, 'update'])->name('conges.update');
Route::delete('/conges/{conge}', [CongeController::class, 'destroy'])->name('conges.destroy');
Route::get('conges/{conge}', [CongeController::class, 'show'])->name('conges.show');

Route::get('/user/conges', [CongeController::class, 'userConges'])->name('conges.user');
//////
Route::get('/conges/{x}/{y}', [CongeController::class, 'congestate']);

/////

Route::get('/users/{user}/conges', [CongeController::class, 'showLeaves'])->name('users.conges');
});


require __DIR__.'/auth.php';
