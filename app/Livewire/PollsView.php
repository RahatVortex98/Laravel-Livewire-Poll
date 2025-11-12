<?php

namespace App\Livewire;

use App\Models\Poll;
use App\Models\Vote;
use App\Models\Option;
use Livewire\Component;

class PollsView extends Component
{
    protected $listeners = ['pollCreated' => 'render'];

    public function vote($optionId)
    {
        $option = Option::findOrFail($optionId);

        // Create a vote record
        Vote::create([
            'poll_id' => $option->poll_id,
            'option_id' => $option->id,
            // 'user_id' => auth()->id(), // Optional if you track users
        ]);

        // Flash message (shows once)
        session()->flash('message', 'Thanks for voting!');
    }

    public function render()
    {
        $polls = Poll::with('options.votes')->latest()->get();

        return view('livewire.polls-view', compact('polls'));
    }
}
