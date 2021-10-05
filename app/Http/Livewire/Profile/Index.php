<?php

namespace App\Http\Livewire\Profile;

use App\Models\Job;
use App\Models\Schedule;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $requestsNumber;
    public $users;
    public $jobs;

    public function mount()
    {
        $this->requestsNumber = count(Schedule::where('status' , 0)->get());
        $this->users = count(User::all());
        $this->jobs = count(Job::all());
    }

    public function render()
    {
        return view('livewire.profile.index');
    }
}
