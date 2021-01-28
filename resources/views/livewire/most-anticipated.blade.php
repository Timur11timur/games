<div wire:init="loadMostAnticipated"
     class="most-anticipated-container space-y-10 mt-8">
    @forelse($mostAnticipated as $anticipated)
        <div class="game flex">
            <a href="{{ route('games.show', ['slug' => $anticipated['slug']]) }}">
                <img src="{{ $anticipated['coverSmallUrl'] }}" alt="game cover"
                     class="w-16 hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="ml-4">
                <a href="{{ route('games.show', ['slug' => $anticipated['slug']]) }}" class="hover:text-gray-300">{{ $anticipated['name'] }}</a>
                <div class="text-gray-400 text-sm mt-1">{{ $anticipated['releaseDate'] }}</div>
            </div>
        </div>
    @empty
        @for($i=0;$i<4;$i++)
            <div class="game flex">
                <div class="bg-gray-800 w-14 h-20"></div>
                <div class="ml-4">
                    <div class="bg-gray-700 w-40 h-5 rounded mt-1"></div>
                    <div class="bg-gray-700 w-24 h-4 rounded mt-3"></div>
                </div>
            </div>
        @endfor
    @endforelse
</div>
