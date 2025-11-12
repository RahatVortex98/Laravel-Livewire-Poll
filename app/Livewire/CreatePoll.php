<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Poll;

class CreatePoll extends Component
{
    public $title='';
    public $options=['first','second'];

    //validation

    protected $rules=[
        'title'=> 'required',
        'options'=>'required|array|min:1|max:10',
        'options.*'=>'required|min:1|max:255'
    ];
    public function render()
    {
        return view('livewire.create-poll');
    }
    public function addOption(){
        $this->options[]='';
    }
    
    
    public function removeOption($index){
    unset($this->options[$index]);
    $this->options = array_values($this->options); // reindex array
}
  public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createPoll(){

        $this->validate();  
        $poll=Poll::create([
            'title'=>$this->title,

        ]);
        foreach($this->options as $optionName){
            $poll->options()->create(['name'=>$optionName]);
        }

        $this->reset(['title','options']);
       $this->dispatch('pollCreated');

    }
    


}
