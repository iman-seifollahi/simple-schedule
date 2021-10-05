<?php

namespace App\Http\Livewire\Profile;

use App\Models\Schedule;
use Livewire\Component;

class Requests extends Component
{
    public $requests;

    public function mount()
    {
        $this->getRequests();
    }

    //Get the unverified requests
    public function getRequests()
    {
        $this->requests = Schedule::where('status' , 0)->get();
    }

    //Approve Request By Changing status (== 1) In DataBase
    public function Approve($scheduleId)
    {
        $schedule = Schedule::find($scheduleId);
        $schedule->update([
            'status' => 1
        ]);
        $this->getRequests();
        $this->emit('updateRequestsNumber');
        $this->emit('toast' , 'success' , 'The Request Was Accepted');
    }


    //Decline Request By Deleting Request In DataBase
    public function Decline($scheduleId)
    {
        Schedule::find($scheduleId)->delete();
        $this->getRequests();
        $this->emit('toast' , 'error' , 'The Request Was Not Accepted');
    }


    public function render()
    {
        return view('livewire.profile.requests')->layout('livewire.profile.layouts.master');
    }
}
