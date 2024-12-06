<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign; // Assuming you have a Campaign model
use Illuminate\Support\Facades\Auth; // For getting the authenticated user

class CampaignController extends Controller
{
    // Create a new campaign for a patient
    public function createCampaign(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric|min:0',
            'patient_id' => 'required|exists:patients,id' // Assuming you have a patients table
        ]);

        // Create a new campaign
        $campaign = Campaign::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'goal_amount' => $validatedData['goal_amount'],
            'raised_amount' => 0, // Default to 0 when the campaign starts
            'status' => 'active', // Initial status is active
            'created_by' => Auth::id(), // Get the authenticated user (health worker)
            'patient_id' => $validatedData['patient_id']
        ]);

        return response()->json([
            'message' => 'Campaign created successfully!',
            'campaign' => $campaign
        ], 201); // HTTP Status Code 201: Created
    }

}
