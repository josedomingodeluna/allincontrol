<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BranchController;
use App\Http\Controllers\FolioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ContactController;

// Sales Controllers
use App\Http\Controllers\QuoteController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Project
Route::prefix('project')->group(function() {
    Route::get('/consulta', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/registro', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/guardar', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/editar/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/actualizar/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::get('/eliminar/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::post('/importar', [ProjectController::class, 'import'])->name('project.import');

});

// Employee
Route::prefix('empleado')->group(function() {
    Route::get('/consulta', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/registro', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/guardar', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/editar/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('/actualizar/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('/eliminar/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
});

// Role
Route::prefix('rol')->group(function() {
    Route::get('/consulta', [RoleController::class, 'index'])->name('role.index');
    Route::get('/registro', [RoleController::class, 'create'])->name('role.create');
    Route::post('/guardar', [RoleController::class, 'store'])->name('role.store');
    Route::get('/editar/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::post('/actualizar/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::get('/eliminar/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
});

// Customer
Route::prefix('cliente')->group(function() {
    Route::get('/consulta', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/registro', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/guardar', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/editar/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/actualizar/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/eliminar/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
});

// Customer Contacts
Route::prefix('contacto')->group(function() {
    Route::get('/consulta', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/registro', [ContactController::class, 'create'])->name('contact.create');
    Route::get('/porcliente/{id}', [ContactController::class, 'createForCustomer'])->name('contact.createForCustomer');
    Route::post('/guardar', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/editar/{id}', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('/actualizar/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::get('/eliminar/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
});

// User
Route::prefix('usuario')->group(function() {
    Route::get('/consulta', [UserController::class, 'index'])->name('user.index');
    Route::get('/registro', [UserController::class, 'create'])->name('user.create');
    Route::post('/guardar', [UserController::class, 'store'])->name('user.store');
    Route::get('/editar/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/actualizar/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/eliminar/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/cerrarsesion', [UserController::class, 'logout'])->name('user.logout');
});