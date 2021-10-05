<?php

namespace App\Http\Livewire\Profile\Layouts;

use App\Models\Schedule;
use Livewire\Component;

class Sidebar extends Component
{
    public $requestsNumber;

    public function mount()
    {
        $this->updateRequestsNumber();
    }

    //Get the number of unverified requests
    public function updateRequestsNumber()
    {
        $this->requestsNumber = count(Schedule::where('status' , 0)->get());
    }

    public function render()
    {
        return view('livewire.profile.layouts.sidebar');
    }
}
