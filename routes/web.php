<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
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
    return view('auth.login'); // This route points to the login view
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home/healthWorker', [App\Http\Controllers\HomeController::class, 'showhealthwoker'])->name('healthWorker');


//HealthWorker routes
Route::view('/home/healthWorker','healthWorker.healthWorker' )->name('healthWorker');
Route::get('/home/healthWorkerRegister', [App\Http\Controllers\HealthWorkerController::class, 'healthWorkerRegister'])->name('healthWorkerRegister');



route::middleware(['auth', 'isAdmin'])->group(function () {
//patient routes
    Route::post('/home/PatientStore', [App\Http\Controllers\PatientController::class, 'store'])->name('patientStore');
    Route::get('/home/ViewPendingPatients', [App\Http\Controllers\PatientController::class, 'viewPendingPatients'])->name('viewPendingPatients');
    Route::get('/home/ViewAllPatients', [App\Http\Controllers\PatientController::class, 'index'])->name('viewAllPatients');
    Route::get('/home/ViewAcceptedPatients/', [App\Http\Controllers\PatientController::class, 'viewAcceptedPatients'])->name('viewAcceptedPatients');
    Route::get('/home/ViewDeniedPatients', [App\Http\Controllers\PatientController::class, 'viewDeniedPatients'])->name('viewDeniedPatients');
    Route::get('/home/RegisterPatients', [App\Http\Controllers\PatientController::class, 'registerPatients'])->name('registerPatients');
    Route::get('/home/EditPatient/{patient}', [App\Http\Controllers\PatientController::class, 'edit'])->name('editPatient');
    Route::PUT('/home/updatePatient/{patient}', [App\Http\Controllers\PatientController::class, 'update'])->name('updatePatient');
    Route::DELETE('/home/deletePatient/{patient}', [App\Http\Controllers\PatientController::class, 'destroy'])->name('deletePatient');
    Route::PUT('/home/acceptPatient/{patient}', [App\Http\Controllers\PatientController::class, 'acceptPatient'])->name('acceptPatient');
    Route::PUT('/home/denyPatient/{patient}', [App\Http\Controllers\PatientController::class, 'denyPatient'])->name('denyPatient');
    Route::PUT('/home/pendPatient/{patient}', [App\Http\Controllers\PatientController::class, 'pendPatient'])->name('pendPatient');
    Route::get('/home/allPatientDetails/{patient}', [App\Http\Controllers\PatientController::class, 'allPatientDetails'])->name('allPatientDetails');
    Route::get('/home/helpReceived', [App\Http\Controllers\PatientController::class, 'helpReceived'])->name('viewHelpReceived');
//donations

    Route::get('/home/donations', [App\Http\Controllers\DonationsController::class, 'index'])->name('viewPatientsDonations');
    Route::DELETE('/home/deletePatientDonation/{patient}', [App\Http\Controllers\DonationsController::class, 'destroy'])->name('deletePatientDonation');
    Route::get('/home/patientsDonations/{patient}', [App\Http\Controllers\DonationsController::class, 'viewDonations'])->name('viewDonations');
    Route::get('/home/allDonors', [App\Http\Controllers\DonorController::class, 'index'])->name('viewAllDonors');
    Route::get('/home/allDonorDonations/{donor}', [App\Http\Controllers\DonorController::class, 'allDonations'])->name('allDonorDonations');
//donation campaigns 
    Route::get('/home/donationsCampaigns', [App\Http\Controllers\DonationCampaignController::class, 'index'])->name('viewAllCampaigns');
    Route::get('/home/activeCampaigns', [App\Http\Controllers\DonationCampaignController::class, 'activeCampaigns'])->name('activeCampaigns');
    Route::get('/home/nonActiveCampaigns', [App\Http\Controllers\DonationCampaignController::class, 'nonActiveCampaigns'])->name('nonActiveCampaigns');
//report
    Route::get('/home/report', [App\Http\Controllers\reportController::class, 'index'])->name('viewReport');

});


