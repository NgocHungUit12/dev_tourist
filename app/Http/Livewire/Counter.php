<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tour;

class Counter extends Component
{
    use WithPagination;

    public $quantity;


    public function render()
    {
        $tours = Tour::all();
        return view('livewire.counter ', compact('tours'));
    }
}
