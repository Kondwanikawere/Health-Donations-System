<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donor;
use App\Models\Patient;
use App\Models\Donations;
use Illuminate\Support\Facades\DB;

class DonorController extends Controller
{
    public function index()
    {             

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

        $donors = DB::table('donors')
                    ->join('users', 'users.id', '=', 'donors.user_id')
                    ->select('users.*', 'donors.user_id', 'donors.amount_donated', 'donors.id as donor_id')
                    ->get();

        return view('donations.allDonors',
            [
             'donors' => $donors,
             ]
        );
    }
    
public function verifyDonor($id)
{
$donor = User::findOrFail($id);
$donor->isVerified = true;
$donor->token = Str::random(60); // Generate a new token upon verification
$donor->save();

return response()->json([
'message' => 'Donor verified successfully',
'token' => $donor->token
]);
}

public function allDonations(int $id){
    $donations = DB::table('donations')
                            ->join('donors', 'donations.donor_id', '=', 'donors.id')
                            ->join('users', 'users.id', '=', 'donors.user_id')
                            ->where('donations.donor_id', $id)
                            ->select('donations.id', 'donations.amount_donated', 'donations.mode', 'donations.patients_Id', 'donations.created_at', 'users.name')
                            ->orderBy('created_at', 'desc')
                            ->get();

    return view('donations.allDonorDonations',
        ['donations' => $donations]
    );
}


}

