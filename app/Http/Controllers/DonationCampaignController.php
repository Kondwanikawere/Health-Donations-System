<?php

namespace App\Http\Controllers;

use App\Models\DonationCampaign;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Donations;
use App\Models\Campaign;
use Illuminate\Support\Facades\DB;

class DonationCampaignController extends Controller
{
    public function index()
    {
       // return DonationCampaign::with('organizer', 'comments')->get();
        $campaigns = Campaign::get();

        return view('campaign.allCampaigns',
            ['campaigns' => $campaigns]
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'target_amount' => 'required|numeric|min:0',
            'category' => 'nullable|string',
            'location' => 'required|string',
            'completion_date' => 'nullable|date',
            'is_urgent' => 'boolean',
         
        ]);

      $validated['user_id'] = auth()->id();

    // Create the campaign

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('campaign_images', 'public');
        }

        $campaign = DonationCampaign::create($validated);

        return response()->json([
            'message' => 'Campaign created successfully',
            'campaign' => $campaign
        ], 201);
    }

    public function show(DonationCampaign $campaign)
    {
        return $campaign->load('organizer', 'comments');
    }

    public function update(Request $request, DonationCampaign $campaign)
    {
        if ($request->user()->id !== $campaign->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'target_amount' => 'sometimes|required|numeric|min:0',
            'completion_date' => 'nullable|date',
            'is_urgent' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('campaigns', 'public');
        }

        $campaign->update($validated);
        return response()->json([
            'message' => 'Campaign updated successfully',
            'campaign' => $campaign
        ]);
    }

    public function destroy(Request $request, DonationCampaign $campaign)
    {
        if ($request->user()->id !== $campaign->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $campaign->delete();
        return response()->noContent();
    }

    public function activeCampaigns(){
        // return DonationCampaign::with('organizer', 'comments')->get();

        $campaigns = DB::table('campaigns')
                        ->join('Patients', 'Patients.id','=','campaigns.patient_id')
                        ->where('Patients.amount_remaining', '!=', 0)
                        ->where('Patients.dateline', '!=', now())
                        ->get();

        return view('campaign.activeCampaigns',
            ['campaigns' => $campaigns]
        );
    }

    public function nonActiveCampaigns(){
        // return DonationCampaign::with('organizer', 'comments')->get();
        $campaigns = DB::table('campaigns')
                        ->join('Patients', 'Patients.id','=','campaigns.patient_id')
                        ->where('Patients.amount_remaining', '=', 0)
                        ->where('Patients.dateline', '!=', now())
                        ->get();

        return view('campaign.nonActiveCampaigns',
            ['campaigns' => $campaigns]
        );
    }
}
