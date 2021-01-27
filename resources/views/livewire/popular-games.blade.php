<div wire:init="loadPopularGames"
    class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
    @forelse($popularGames as $popularGame)
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="#">
                    <img src="{{ str_replace('thumb', 'cover_big', $popularGame['cover']['url']) }}" alt="game cover"
                         class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                @if(isset($popularGame['total_rating']))
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                         style="right: -20px; bottom: -20px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">{{ round($popularGame['total_rating']) }}%</div>
                    </div>
                @endif
            </div>
            <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-3">{{ $popularGame['name'] }}</a>
            <div class="text-gray-400 mt-1">{{ implode (', ',array_map(function($item) {return $item['abbreviation'];}, $popularGame['platforms'])) }}</div>
        </div>
    @empty
        @for($i=0;$i<12;$i++)
            <div class="game mt-8">
                <div class="relative inline-block">
                    <div class="bg-gray-800 w-44 h-56"></div>
                </div>
                <div class="bg-gray-700 mt-3 rounded w-38 h-5"></div>
                <div class="bg-gray-700 mt-2 rounded w-24 h-9"></div>
            </div>
        @endfor
    @endforelse
</div>
