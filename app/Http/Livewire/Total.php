<?php

namespace App\Http\Livewire;
use App\Models\Tour;

use Livewire\Component;

class Total extends Component
{
    public $total = 0;
    public function total(){
        $this->total = 9;
        
    }
    public function render()
    {
        return view('livewire.total');
    }
}
