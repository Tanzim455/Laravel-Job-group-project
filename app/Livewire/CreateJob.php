<?php

namespace App\Livewire;

use App\Http\Requests\JobPostRequest;
use App\Models\Category;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
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

      public $job_location_type=[];

      public $category_id='';
      
    
     public $tags;
    //  public $all_location_type;
    

     public function mount(){
        $this->job_location_type=['remote','onsite','hybrid'];
        
        
     }
    public function savejobs(){
        
        
      
            $validated = $this->validate();
            $job = Job::create($validated);
            // Rest of your code
           
                
                if (!empty($this->tags)) {
                    $job->tags()->attach($this->tags);
                    
                }
                $this->reset();
         session()->flash('success', 'Job has been added successfully');
           
    }
    protected function rules(): array
    {
        return (new JobPostRequest())->rules();
    }
   
    public function render()
    {   
        $categories=Category::select('id','name')->get();
        $allTags=Tag::all();
        
       
        return view('livewire.create-job',compact('categories','allTags'));
    }
}
