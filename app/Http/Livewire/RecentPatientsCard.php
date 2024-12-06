<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RecentPatientsCard extends Component
{
    public $recentPatients;

    public function mount($recentPatients){
        $this->recentPatients = $recentPatients;
    }
    
    public function render()
    {
        return view('livewire.recent-patients-card');
    }
}
