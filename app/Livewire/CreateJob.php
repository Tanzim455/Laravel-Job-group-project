<?php

namespace App\Livewire;

use App\Http\Requests\JobPostRequest;
use App\Models\Category;
use App\Models\Job;
use App\Models\Tag;
use Livewire\Component;

class CreateJob extends Component
{
    public  $title='';
    
     public  $description='';

     public $qualification ='';
    
     public  $min_experience='';
    
     public  $max_experience='';
    
     public  $min_salary='';
   
     public  $max_salary='';
    
     public  $apply_url='';
    
      public $expiration_date='';

      public $job_location='';

      public $job_location_type='';

      public $category_id='';
      
     public $company_id='';
     public $tags=[];
 
    public function save(){
         $validated=$this->validate();
        
        $job=Job::create($validated);

        if (!empty($this->tags)) {
            $job->tags()->attach($this->tags);
        }
    }
    protected function rules(): array
    {
        return (new JobPostRequest())->rules();
    }
   
    public function render()
    {   
        $categories=Category::select('id','name')->get();
        $tags=Tag::select('id','name')->get();
        return view('livewire.create-job',compact('categories','tags'));
    }
}
