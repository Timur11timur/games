<div wire:init="loadRecentlyReviewed"
     class="recently-reviewed-container space-y-12 mt-8">
    @forelse($recentlyReviewed as $reviewed)
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative flex-none">
                <a href="#">
                    <img src="{{ str_replace('thumb', 'cover_big', $reviewed['cover']['url']) }}" alt="game cover"
                         class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                </a>
                @if(isset($reviewed['total_rating']))
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                         style="right: -20px; bottom: -20px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">{{ round($reviewed['total_rating']) }}%</div>
                    </div>
                @endif
            </div>
            <div class="ml-12">
                <a href="#" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">{{ $reviewed['name'] }}</a>
                <div class="text-gray-400 mt-1">{{ implode (', ',array_map(function($item) {return $item['abbreviation'];}, $reviewed['platforms'])) }}</div>
                <p class="text-gray-400 mt-6 hidden lg:block">{{ $reviewed['summary'] }}</p>
            </div>
        </div>
    @empty
        <div class="mt-8 ml-2">
            @include('layouts.spinner')
        </div>
    @endforelse
</div>
