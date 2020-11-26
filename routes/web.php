<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

use App\Http\Controllers\Doctor\VisitController as DoctorVisitController;
use App\Http\Controllers\Patient\VisitController as PatientVisitController;
use App\Http\Controllers\Admin\VisitController as AdminVisitController;

use App\Http\Controllers\Doctor\HomeController as DoctorHomeController;
use App\Http\Controllers\Patient\HomeController as PatientHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;

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

Route::get('/', [PageController::class,  'welcome'])->name('welcome');
Route::get('/about', [PageController::class,  'about'])->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/doctor/home', [DoctorHomeController::class, 'index'])->name('doctor.home');
Route::get('/patient/home', [PatientHomeController::class, 'index'])->name('patient.home');
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin.home');

Route::get('/doctor/visits/', [DoctorVisitController::class, 'index'])->name('doctor.visits.index');
Route::get('/doctor/visits/{id}', [DoctorVisitController::class, 'show'])->name('doctor.visits.show');

Route::get('/patient/visits/', [PatientVisitController::class, 'index'])->name('patient.visits.index');
Route::get('/patient/visits/{id}', [PatientVisitController::class, 'show'])->name('patient.visits.show');

Route::get('/admin/visits/', [AdminVisitController::class, 'index'])->name('admin.visits.index');
Route::get('/admin/visits/create', [AdminVisitController::class, 'create'])->name('admin.visits.create');
Route::get('/admin/visits/{id}', [AdminVisitController::class, 'show'])->name('admin.visits.show');
Route::post('/admin/visits/store', [AdminVisitController::class, 'store'])->name('admin.visits.store');
Route::get('/admin/visits/{id}/edit', [AdminVisitController::class, 'edit'])->name('admin.visits.edit');
Route::put('/admin/visits/{id}', [AdminVisitController::class, 'update'])->name('admin.visits.update');
Route::delete('/admin/visits/{id}', [AdminVisitController::class, 'destroy'])->name('admin.visits.destroy');
