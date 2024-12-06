<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TotalPatientsCard extends Component
{
    public $patientsTotal;

    public function mount($patientsTotal){
        $this->patientsTotal = $patientsTotal;
    }
    public function render()
    {
        return view('livewire.total-patients-card');
    }
}
