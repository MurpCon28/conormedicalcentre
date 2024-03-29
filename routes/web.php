<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

use App\Http\Controllers\Doctor\VisitController as DoctorVisitController;
use App\Http\Controllers\Patient\VisitController as PatientVisitController;
use App\Http\Controllers\Admin\VisitController as AdminVisitController;

use App\Http\Controllers\Doctor\HomeController as DoctorHomeController;
use App\Http\Controllers\Patient\HomeController as PatientHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;

use App\Http\Controllers\Doctor\DoctorController as DoctorViewController;
use App\Http\Controllers\Doctor\PatientController as DoctorPatientViewController;
use App\Http\Controllers\Patient\PatientController as PatientViewController;
use App\Http\Controllers\Patient\DoctorController as PatientDoctorViewController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\PatientController as AdminPatientController;

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

Route::get('/doctor/doctors/', [DoctorViewController::class, 'index'])->name('doctor.doctors.index');
Route::get('/doctor/doctors/{id}', [DoctorViewController::class, 'show'])->name('doctor.doctors.show');
Route::get('/doctor/patients/', [DoctorPatientViewController::class, 'index'])->name('doctor.patients.index');
Route::get('/doctor/patients/{id}', [DoctorPatientViewController::class, 'show'])->name('doctor.patients.show');

Route::get('/patient/patients/', [PatientViewController::class, 'index'])->name('patient.patients.index');
Route::get('/patient/patients/{id}', [PatientViewController::class, 'show'])->name('patient.patients.show');
Route::get('/patient/doctors/', [PatientDoctorViewController::class, 'index'])->name('patient.doctors.index');
Route::get('/patient/doctors/{id}', [PatientDoctorViewController::class, 'show'])->name('patient.doctors.show');

Route::get('/admin/doctors/', [AdminDoctorController::class, 'index'])->name('admin.doctors.index');
Route::get('/admin/doctors/create', [AdminDoctorController::class, 'create'])->name('admin.doctors.create');
Route::get('/admin/doctors/{id}', [AdminDoctorController::class, 'show'])->name('admin.doctors.show');
Route::post('/admin/doctors/store', [AdminDoctorController::class, 'store'])->name('admin.doctors.store');
Route::get('/admin/doctors/{id}/edit', [AdminDoctorController::class, 'edit'])->name('admin.doctors.edit');
Route::put('/admin/doctors/{id}', [AdminDoctorController::class, 'update'])->name('admin.doctors.update');
Route::delete('/admin/doctors/{id}', [AdminDoctorController::class, 'destroy'])->name('admin.doctors.destroy');

Route::get('/admin/patients/', [AdminPatientController::class, 'index'])->name('admin.patients.index');
Route::get('/admin/patients/create', [AdminPatientController::class, 'create'])->name('admin.patients.create');
Route::get('/admin/patients/{id}', [AdminPatientController::class, 'show'])->name('admin.patients.show');
Route::post('/admin/patients/store', [AdminPatientController::class, 'store'])->name('admin.patients.store');
Route::get('/admin/patients/{id}/edit', [AdminPatientController::class, 'edit'])->name('admin.patients.edit');
Route::put('/admin/patients/{id}', [AdminPatientController::class, 'update'])->name('admin.patients.update');
Route::delete('/admin/patients/{id}', [AdminPatientController::class, 'destroy'])->name('admin.patients.destroy');
