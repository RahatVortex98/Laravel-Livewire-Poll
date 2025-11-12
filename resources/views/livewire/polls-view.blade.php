<div>
    @if (session()->has('message'))
        <div class="text-green-600 mb-3">{{ session('message') }}</div>
    @endif

    @forelse ($polls as $poll)
        <div class="mb-4 border-b pb-3">
            <h3 class="mb-2 text-xl font-semibold">{{ $poll->title }}</h3>

            @foreach ($poll->options as $option)
                <div class="mb-2 flex items-center gap-2">
                    <button class="btn" wire:click="vote({{ $option->id }})">Vote</button>
                    <span>{{ $option->name }}</span>
                    <span class="text-gray-500 text-sm">({{ $option->votes->count() }})</span>
                </div>
            @endforeach
        </div>
    @empty
        <p>No polls found.</p>
    @endforelse
</div>
