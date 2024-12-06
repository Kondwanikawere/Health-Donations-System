<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class reportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patientsTotal = Patient::get()->count();
        $acceptedPatients = Patient::get()
                            ->where('isAccepted', 1)
                            ->count();
         $deniedPatients = Patient::get()
                            ->where('isAccepted', 0)
                            ->count();
        $pendingPatients = Patient::get()
                            ->where('isAccepted', 3)
                            ->count();
        $percentaccepted = round(($acceptedPatients/$patientsTotal)*100, 2);
        $percentdenied = round(($deniedPatients/$patientsTotal)*100, 2);

        $patientsIds = DB::table('Patients')
            ->where('Patients.isAccepted', 1)
            ->pluck('id')
            ->flatten();
        foreach($patientsIds as $patientId){
                $patient[$patientId] = DB::table('Patients')
                            ->where('isAccepted', '=', 1)
                            ->where('id', '=', $patientId)
                            ->get();
                $records[$patientId] = DB::table('donations')
                            ->join('Patients', 'donations.patients_Id', '=', 'Patients.id')
                            ->select('donations.*', 'Patients.firstName', 'Patients.surname','Patients.amount', 'Patients.dateline', 'Patients.amount_remaining')
                            ->where('donations.patients_Id', $patientId)
                            ->orderBY('donations.created_at', 'desc')
                            ->get(); 
                $count[$patientId] = count($records[$patientId]);
                if(isset($patient[$patientId][0]->dateline)){
                    $daysremaining[$patientId] =  now()->diffInDays(Carbon::parse($patient[$patientId][0]->dateline));
                }
                
        }

    
        return view('report.report',
            ['patientsTotal' => $patientsTotal,
             'acceptedPatientsTotal' => $acceptedPatients,
             'deniedPatientsTotal' => $deniedPatients,
             'pendingPatientsTotal' => $pendingPatients,
             'percentaccepted' => $percentaccepted,
             'percentdenied' => $percentdenied,
             'records' => $records,
             'patientsIds' => $patientsIds,
             'recordscount' => $count,
             'daysremaining' => $daysremaining
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
    public function destroy(string $id)
    {
        //
    }
}
