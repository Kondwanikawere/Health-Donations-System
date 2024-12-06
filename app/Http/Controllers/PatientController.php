<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Donations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = DB::table('Patients')
                    ->orderBy('created_at', 'desc')
                    ->get();
        return view('patients.allPatients',
            ['patients' => $patients]
        );
    }

    //
    public function viewPendingPatients()
    {
        $patients = Patient::get()->where('isAccepted', '=', 3);
        return view('patients.pendingPatients',
            ['patients' => $patients]
        );
    }

    public function registerPatients(){
        return view('patients.registerPatients');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
             'disease' => 'required|string|max:255',
            'amount' => 'required|integer'
        ]);

        Patient::create([
            'firstName' => $request->firstName,
            'surname' => $request->surname,
            'disease' => $request->disease,
            'amount'  => $request -> amount,
            'amount_remaining'  => $request -> amount
        ]);

        return redirect('home/RegisterPatients')->with('status', 'Patient added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        return view('patients.editPatient', compact('patient') );
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
             'disease' => 'required|string|max:255',
            'amount' => 'required|integer'
        ]);

        $patient->update([
            'firstName' => $request->firstName,
            'surname' => $request->surname,
            'disease' => $request->disease,
            'amount'  => $request -> amount
        ]);

        return redirect()->to('home/EditPatient/'.$patient->id)->with('status', 'Patient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->back()->with('status', 'Patient deleted successfully');
    }

    public function viewAcceptedPatients()
    {
        $patients = Patient::get()->where('isAccepted', '=', 1);
        return view('patients.acceptedPatients',
            ['patients' => $patients]
        );
    }
    public function viewDeniedPatients()
    {
        $patients = Patient::get()->where('isAccepted', '=', 0);
        return view('patients.deniedPatients',
            ['patients' => $patients]
        );
    }

    public function acceptPatient(Request $request, Patient $patient)
    {

        $patient->update([
            'isAccepted' => 1, 
        ]);

        return redirect()->back()->with('status', 'Patient accepted successfully');
    }

    public function denyPatient(Request $request, Patient $patient)
    {
        $patient->update([
            'isAccepted' => 0, 
        ]);

        return redirect()->back()->with('status', 'Patient denied successfully');
    }

    public function pendPatient(Request $request, Patient $patient)
    {
        $patient->update([
            'isAccepted' => 3, 
        ]);

        return redirect()->back()->with('status', 'Patient put to pending successfully');
    }


    public function allPatientDetails(int $id){

        $patient = Patient::find($id);
        $donation = DB::table('donations')
                    ->where('patients_Id', $id)
                    ->orderBy('id', 'desc')
                    ->first();
        return view('patients.patientDetails',
            array('patient' => $patient, 'donation' => $donation)
        );
    }

    public function helpReceived(){
        $patients = DB::table('Patients')
                        ->where('isAccepted', 1)
                        ->where('amount_remaining', 0)
                        ->get();
        return view('patients.patientsHelpReceived',
               [
                'patients' => $patients
               ]
               );
    }
}
