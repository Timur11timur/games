<div class="game mt-8">
    <div class="relative inline-block">
        <a href="{{ route('games.show', ['slug' => $game['slug']]) }}">
            <img src="{{ $game['coverBigUrl'] }}" alt="game cover"
                 class="hover:opacity-75 transition ease-in-out duration-150">
        </a>
        @if(isset($game['total_rating']) && !is_null($game['total_rating']))
            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                 style="right: -20px; bottom: -20px;">
                <div class="font-semibold text-xs flex justify-center items-center h-full">{{ $game['total_rating'] }}</div>
            </div>
        @endif
    </div>
    <a href="{{ route('games.show', ['slug' => $game['slug']]) }}" class="block text-base font-semibold leading-tight hover:text-gray-400">{{ $game['name'] }}</a>
    @if(!is_null($game['platforms']))
        <div class="text-gray-400 mt-1">{{ $game['platforms'] }}</div>
    @endif
</div>
