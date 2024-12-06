<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Patient;
use App\Models\Donations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class RecentActivityCard extends Component
{
    public $diff_in_hours;

    public function recentPatientRegistration(){
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
        $this->diff_in_hours = $diff_in_Seconds;
    }

    public function render()
    {
        return view('livewire.recent-activity-card');
    }
}
