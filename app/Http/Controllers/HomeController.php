<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Donations;
use App\Models\User;
use App\Models\Donor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $patientsTotal = Patient::get()->count();

        //counting the all donations
        $patientsIds = DB::table('Patients')
        ->where('Patients.isAccepted', 1)
        ->pluck('id')
        ->flatten();

        $amount_remaining = 0;
        $subtractor = 0;
        foreach($patientsIds as $patientId){
            $donations = DB::table('donations')
                                ->join('Patients', 'donations.patients_Id', '=', 'Patients.id')
                                ->select('donations.*', 'Patients.amount', 'Patients.amount_remaining')
                                ->where('donations.patients_Id', $patientId)
                                ->where('donations.is_subtracted', 0)
                                ->get();
           
            $patient = DB::table('Patients')->where('id', $patientId)->get(); 
          
            foreach($donations as $donation){
                    $subtractor += $donation->amount_donated;   
            }
          
            if(isset($patient) && $subtractor > 0){
                
                $amount_remaining = $patient[0]->amount_remaining - $subtractor; 
                Patient::where('id', $patient[0]->id)->update([
                    'amount_remaining'  => $amount_remaining
                ]);
            
                foreach($donations as $donation){
                    Donations::where('id', $donation->id)->update([
                        'is_subtracted' => 1
                    ]);
                }
                
            }
            $amount_remaining = 0;
            $subtractor = 0;
        }

        $donationsTotal = 0;
        $allDonations = DB::table('donations')->get();
        foreach($allDonations as $donation){
            $donationsTotal += $donation->amount_donated;
        }

        //getting recent patients
        $recentPatients = DB::table('Patients')
                          ->orderBy('created_at', 'desc')
                          ->limit(3)
                          ->get();
        //recent activities
        $recentPatient = DB::table('Patients')
                          ->orderBy('created_at', 'desc')
                          ->limit(1)
                          ->get();
        $diff_in_Seconds = 0;
        $from = 0;
        $to = 0;
        
        $from = Carbon::createFromFormat('Y-m-d H:s:i', $recentPatient[0]->created_at);
        $to = Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());
        $difference = $to->diffInMinutes($from);
        $diff_in_Seconds = gmdate('H:i:s',$difference);
            
        $difference = 0;
        $from = 0;
        $to = 0;

        //amount donated
        $donors = DB::table('donors')
                        ->pluck('id')
                        ->flatten();
        
        $amountDonated = 0;
        foreach($donors as $donor){
            
            $donations = DB::table('donations')
                                ->where('donor_id', $donor)
                                ->get();
            
            foreach($donations as $donation){
                $amountDonated += $donation->amount_donated;
            }
            
            Donor::where('id', $donor)->update([
                'amount_donated' =>  $amountDonated
            ]);
            $amountDonated = 0;
            
        }

        //best donors
        $topDonors= DB::table('donors')
                        ->join('users', 'donors.user_id', '=', 'users.id')
                        ->select('users.*', 'donors.amount_donated')
                        ->orderBy('donors.amount_donated', 'desc')
                        ->limit(5)
                        ->get();

        return view('home',
        [
            'patientsTotal' => $patientsTotal,
            'donationsTotal' => $donationsTotal,
            'recentPatients' => $recentPatients,
            'diff_in_hours' => $diff_in_Seconds,
            'donors' => $topDonors
        ]);

        
    }

    public function healthWorker(){
        return view('healthWorker');
    }
}
