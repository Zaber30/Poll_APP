<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Poll;

use function Laravel\Prompts\alert;

class CreatePoll extends Component
{
    public $title;
    public $options=[];
    public function render()
    {
        return view('livewire.create-poll');
    }
    protected $rules=[
         'title'=>'required|min:4|max:255',
        //   'options'=>'required|array|min|max:10',
          'options.*'=>'required|min:1|max:255'
    ];

    protected $messages=[
         'options.*'=>"the option can't be empty.",
    ];
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function addOption(){
        $this->options[]='';
    }
    public function removeOption($index){
        unset($this->options[$index]);
        $this->options=array_values($this->options);

    }
    public function createPoll(){
        $this->validate();

        $poll=Poll::create([
            'title'=>$this->title
        ])->options()->createMany(
            collect($this->options)->map(fn($option)=>['name'=>$option])->all()
        );
    //    foreach($this->options as $optionName){
    //      $poll->options()->create(['name'=>$optionName]);
    //    }
     $this->reset(['title','options']);
     $this->dispatch('pollCreated');

       
    }
    // public function mount(){

    // }
}
