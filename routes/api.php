<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationCampaignController;

// Auth routes
Route::post('signUp', [AuthController::class, 'signUp']);
Route::post('signIn', [AuthController::class, 'signIn']);
Route::post('verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('resend-otp', [AuthController::class, 'resendOtp']);           // Resend OTP
Route::post('forgot-password', [AuthController::class, 'forgotPassword']);  // Request OTP for password reset
Route::post('reset-password', [AuthController::class, 'resetPassword']);    // Reset password with OTP

// Protected routes that need authentication
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/profile', [AuthController::class, 'getProfile']);
Route::middleware('auth:sanctum')->post('campaigns/create', [CampaignController::class, 'createCampaign']);

Route::apiResource('donation-campaigns', DonationCampaignController::class);


// Public routes
Route::get('/donation-campaigns', [DonationCampaignController::class, 'index']); // List Campaigns
Route::get('/donation-campaigns/{id}', [DonationCampaignController::class, 'show']); // Show Campaign

// Protected routes - require authentication
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/donation-campaigns', [DonationCampaignController::class, 'store']); // Create Campaign
    Route::put('/donation-campaigns/{id}', [DonationCampaignController::class, 'update']); // Update Campaign
    Route::delete('/donation-campaigns/{id}', [DonationCampaignController::class, 'destroy']); // Delete Campaign

    // Additional authenticated routes
  
});
