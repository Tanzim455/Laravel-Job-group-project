<?php

namespace App\Livewire;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Component;

class Tags extends Component
{
    use RefreshDatabase;
    public $name;
    public function savetags(){
        $this->validate([
            'name'=>'required|min:3|unique:tags'
        ]);
        
        Tag::create([
          'name'=>$this->name
        ]);
    }
    public function update($id){
        $tag=Tag::find($id);
        $tag->update([
          'name'=>$this->name
        ]);
    }
    public function render()
    {
        $tags=Tag::select('name')->paginate(10);
        return view('livewire.tags',compact('tags'));
    }
}
