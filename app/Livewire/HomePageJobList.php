<?php

namespace App\Livewire;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HomePageJobList extends Component
{
    public $search_location;
    public $search_salary;
    
    public function render()
    {



        $jobsIds= DB::table('jobs AS j1')
    ->select('j1.id', 'j1.company_id', 'j1.expiration_date')
    ->where('j1.expiration_date', '>=', Carbon::now()->format('Y-m-d'))
    ->whereRaw('(
        SELECT COUNT(*)
        FROM jobs AS j2
        WHERE j2.company_id = j1.company_id
        AND j2.expiration_date >= CURDATE() 
        AND j2.id <= j1.id
    ) <= 3')
    ->pluck('id')->toArray();

         
        if ($this->search_location) {

            $location_search_ids = Job::where('job_location', 'like', '%'.$this->search_location.'%')->pluck('id')->toArray();
            //Check whether search matches to the filtered Ids
            $check_ids = array_intersect($jobsIds, $location_search_ids);

            if (count($check_ids)) {

                $jobs = Job::where('job_location', 'like', '%'.$this->search_location.'%')
                    ->whereIn('id', $check_ids)
                    ->get();

                return view('livewire.home-page-job-list', compact('jobs'));

            } 
                
            $this->addError('search_location', 'Sorry the current location is not available');
            
        }
        if($this->search_salary){
            $location_search_ids = Job::where('min_salary','>=',$this->search_salary)->pluck('id')->toArray();
            //Check whether search matches to the filtered Ids
            
            $check_ids = array_intersect($jobsIds, $location_search_ids);

            if (count($check_ids)) {

                $jobs = Job::where('min_salary','>=',$this->search_salary)
                    ->whereIn('id', $check_ids)
                    ->get();
                 
                return view('livewire.home-page-job-list', compact('jobs'));

            } 
                
            $this->addError('search_salary', 'There are no jobs listed in this range');
        }
        
        $jobs = Job::whereIn('id', $jobsIds)->with('category', 'company', 'tags')->orderBy('id','DESC')->paginate(10);
        
        return view('livewire.home-page-job-list', compact('jobs'));

    }
}
