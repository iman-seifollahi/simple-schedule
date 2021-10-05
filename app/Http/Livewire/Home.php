<?php

namespace App\Http\Livewire;

use App\Models\Job;
use App\Models\Schedule;
use Carbon\Carbon;
use Livewire\Component;

class Home extends Component
{
    public $scheduleWeek;
    public $selectedDay;


    public function mount()
    {
        $this->selectedDay = Carbon::now();
        $this->selectedWeek();
    }

    //Changing The Current Day For Get Schedules ($status receive From The Front-End)
    public function changeWeek($status)
    {
        if ($status == 'next') {
            $this->selectedDay = $this->selectedDay->add(1, 'week');
        } elseif ($status == 'previous') {
            $this->selectedDay = $this->selectedDay->sub(1, 'week');
        }
        $this->selectedWeek();
    }

    //Get Schedules Of Selected Week ( By categorizing by jobs and days of the week)
    public function selectedWeek()
    {
        $jobsSchedule = collect();

        foreach (Job::all() as $job) {

            $jobSchedule = collect();
            $jobsId = array();

            foreach ($job->users as $user) {
                array_push($jobsId, $user->id);
            }

            for ($i = 0; $i < 7; $i++) {
                $hours = Schedule::where('status', 1)->whereIn('user_id', $jobsId)->whereDate('date', $this->selectedDay->startOfWeek()->addDays($i))->get();
                $jobSchedule->put($this->selectedDay->startOfWeek()->addDays($i)->toString(), collect($hours));
            }

            $jobsSchedule->put($job->name, collect($jobSchedule));
        }
        $this->scheduleWeek = $jobsSchedule;

    }

    public function render()
    {
        return view('livewire.home');
    }
}
