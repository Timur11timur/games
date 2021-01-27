<div wire:init="loadMostAnticipated"
     class="most-anticipated-container space-y-10 mt-8">
    @forelse($mostAnticipated as $anticipated)
        <div class="game flex">
            <a href="#">
                <img src="{{ str_replace('thumb', 'cover_small', $anticipated['cover']['url']) }}" alt="game cover"
                     class="w-16 hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="ml-4">
                <a href="#" class="hover:text-gray-300">{{ $anticipated['name'] }}</a>
                <div class="text-gray-400 text-sm mt-1">{{ \Carbon\Carbon::parse($anticipated['first_release_date'])->format('M d, Y') }}</div>
            </div>
        </div>
    @empty
        <div class="mt-8 ml-2">
            @include('layouts.spinner')
        </div>
    @endforelse
</div>
