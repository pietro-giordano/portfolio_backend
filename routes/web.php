<?php

use Illuminate\Support\Facades\Route;
// Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\MessageController;
use Illuminate\Support\Facades\Artisan;

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

Route::prefix('admin')->name('admin.')->get('/dashboard', function () {
      return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
      Route::resource('projects', ProjectController::class);
      Route::resource('skills', SkillController::class);
      Route::resource('messages', MessageController::class);
});

Route::middleware('auth')->group(function () {
      Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
      Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
      Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// per ricreare symlink anche nell'host (una volta nell'hosting lanciare l'url in browser 'www.example.com/public/linkstorage' e creerà nuovi symlink)
Route::get('/linkstorage', function () {
      Artisan::call('storage:link');
});

require __DIR__ . '/auth.php';
