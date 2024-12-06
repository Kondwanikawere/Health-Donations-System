<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DonationProgressCard extends Component
{
    public $donationsTotal;

    public function mount($donationsTotal){
        $this->donationsTotal = $donationsTotal;
    }

    public function render()
    {
        return view('livewire.donation-progress-card');
    }
}
