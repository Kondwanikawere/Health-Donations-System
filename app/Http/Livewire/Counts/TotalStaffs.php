<?php

namespace App\Http\Livewire\Counts;

use Livewire\Component;

class TotalStaffs extends Component
{
    public $totalStaffs = 50; // Static number for now

    public function render()
    {
        return <<<'blade'


<div class=" p-4 bg-green-200 rounded-lg shadow-md flex items-center justify-between">
    <div>
        <h2 class="text-lg font-semibold">Total Staffs</h2>
        <p class="text-gray-500 mt-4">{{  $totalStaffs }}</p>
    </div>
    <div class="bg-green-200 p-2 rounded-full">
       <i class="fas fa-users fa-3x text-blue-500"></i>
    </div>
</div>

blade;
    }
}
