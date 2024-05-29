<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/users/{userId}/projects', [UserController::class, 'projects'])->name('projects.index');
Route::get('/users/{userId}/projects/create', [UserController::class, 'createProject'])->name('projects.create');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/{userId}/projects', [UserController::class, 'storeProject'])->name('projects.store');
Route::get('/users/{userId}/projects/{projectId}/edit', [UserController::class, 'editProject'])->name('projects.edit');
Route::put('/users/{userId}/projects/{projectId}', [UserController::class, 'updateProject'])->name('projects.update');
Route::delete('/users/{userId}/projects/{projectId}', [UserController::class, 'deleteProject'])->name('projects.delete');