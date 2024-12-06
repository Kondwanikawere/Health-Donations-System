<?php

// app/Http/Livewire/TopDonorsChart.php

namespace App\Http\Livewire;

use Livewire\Component;

class TopDonorsChart extends Component
{
    public $donorNames = ['John Doe', 'Jane Smith', 'Alice Johnson', 'Bob Brown', 'Charlie Davis'];
    public $donorAmounts = [500, 300, 400, 200, 100];

    public function render()
    {
        return view('livewire.top-donors-chart');
    }
}
