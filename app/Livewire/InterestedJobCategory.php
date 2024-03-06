<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\UserInterestedJobCategory;
use Livewire\Component;

class InterestedJobCategory extends Component
{
    public $category_id;
    
    public function saveInterestedCategory(){
        
        $this->validate([
            'category_id'=>'required|integer'
        ]);
          UserInterestedJobCategory::create([
                'category_id'=>$this->category_id,
                  
          ]);
          session()->flash('success', 'Interested category has been added successfully');
    }
    public function render()
    {
        $categories=Category::select('id','name')->get();
        return view('livewire.interested-job-category',compact('categories'));
    }
}
