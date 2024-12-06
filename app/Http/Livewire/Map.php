<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Map extends Component
{
    public $donorName1;
    public $donorName2;
    public $donorName3;
    public $donorName4;
    public $donorName5;
    public $donorsAmount1;
    public $donorsAmount2;
    public $donorsAmount3;
    public $donorsAmount4;
    public $donorsAmount5;

    public function mount($donors){
        $this->donorName1 = $donors[0]->name;
        $this->donorsAmount1 = $donors[0]->amount_donated;
        $this->donorName2 = $donors[1]->name;
        $this->donorsAmount2 = $donors[1]->amount_donated;
        $this->donorName3 = $donors[2]->name;
        $this->donorsAmount3 = $donors[2]->amount_donated;
        $this->donorName4 = $donors[3]->name;
        $this->donorsAmount4 = $donors[3]->amount_donated;
        $this->donorName5 = $donors[4]->name;
        $this->donorsAmount5 = $donors[4]->amount_donated;
        
    }

    public function render()
    {
        return view('livewire.map');
    }
}
