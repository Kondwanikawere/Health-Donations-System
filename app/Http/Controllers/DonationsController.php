<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Donations;
use Illuminate\Support\Facades\DB;

class DonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {             
        $patients = Patient::get()->where('isAccepted', '=', 1);

        $patientsIds = DB::table('Patients')
        ->where('Patients.isAccepted', 1)
        ->pluck('id')
        ->flatten();

        $amount_remaining = 0;
        $subtractor = 0;
        $counter = 0;
        foreach($patientsIds as $patientId){
            $donations = DB::table('donations')
                                ->join('Patients', 'donations.patients_Id', '=', 'Patients.id')
                                ->select('donations.*', 'Patients.amount', 'Patients.amount_remaining')
                                ->where('donations.patients_Id', $patientId)
                                ->where('donations.is_subtracted', 0)
                                ->get();
           
            $patient = Patient::get()->where('id', $patientId); 
            foreach($donations as $donation){
                    $subtractor += $donation->amount_donated;   
            }
           
            if(isset($patient[$counter]) && $subtractor > 0){
                $amount_remaining = $patient[$counter]->amount_remaining - $subtractor; 
                Patient::where('id', $patient[$counter]->id)->update([
                    'amount_remaining'  => $amount_remaining
                ]);
            
                foreach($donations as $donation){
                    Donations::where('id', $donation->id)->update([
                        'is_subtracted' => 1
                    ]);
                }
                
            }
            $counter++;
            $amount_remaining = 0;
            $subtractor = 0;
        }

        foreach($patientsIds as $patientId){
            $records[$patientId] = DB::table('donations')
                        ->join('Patients', 'donations.patients_Id', '=', 'Patients.id')
                        ->select('donations.*', 'Patients.firstName', 'Patients.surname','Patients.surname','Patients.amount', 'Patients.amount_remaining')
                        ->where('donations.patients_Id', $patientId)
                        ->orderBY('created_at', 'desc')
                        ->limit(1)
                        ->get();
        }

        return view('donations.donations',
            ['patientsDonations' => $patients,
             'records' => $records,
             'patientsIds' => $patientsIds
             ]
        );
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $patient = Donations::find($id);
        $patient->delete();
        return redirect()->back()->with('status', 'Patient deleted successfully');  
    }


    public function viewDonations(int $id){
        $patientsDonations = DB::table('donations')
                            ->join('Patients', 'donations.patients_Id', '=', 'Patients.id')
                            ->join('donors', 'donations.donor_id', '=', 'donors.id')
                            ->join('users', 'users.id', '=', 'donors.user_id')
                            ->where('donations.patients_Id', $id)
                            ->select('donations.*', 'Patients.firstName', 'Patients.Disease', 'Patients.amount', 'Patients.surname', 'Patients.isAccepted', 'users.name as name')
                            ->orderBy('created_at', 'desc')
                            ->get();

    return view('donations.patientsDonations',
        ['patientsDonations' => $patientsDonations]
    );
    }
}
