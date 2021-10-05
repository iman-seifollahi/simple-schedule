<?php

namespace App\Http\Livewire\Profile;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewRequest extends Component
{

    public $shift;
    public $date;

    protected $listeners = ['changeDate'];

    public function mount()
    {
        $this->shift = 'morning';
        $this->date = Carbon::now()->format('Y/m/d');
    }

    //Change the Date in Back-End For Store
    public function changeDate($value)
    {
        $this->date = $value;
    }

    //Change the Shift in Back-End For Store
    public function changeShift($value)
    {
        $this->shift = $value;
    }

    //Store In DataBase
    public function sendRequest()
    {
       $user = Auth::user();
       $user->schedules()->create([
           'shift' => $this->shift,
           'date' => $this->date
       ]);

       //Send Flash Message
        $this->emit('toast' , 'success' , 'Request sent');
    }

    public function render()
    {
        return view('livewire.profile.new-request')->layout('livewire.profile.layouts.master');
    }
}
