<?php

namespace App\Livewire;
use App\Models\Poll;
use Livewire\Component;

class PollsView extends Component
{
    public function render()
    {
        $polls=Poll::with('options')->get();
        return view('livewire.polls-view',compact('polls'));
    }
}
