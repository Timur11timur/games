<div wire:init="loadRecentlyReviewed"
     class="recently-reviewed-container space-y-12 mt-8">
    @forelse($recentlyReviewed as $reviewed)
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative flex-none">
                <a href="{{ route('games.show', ['slug' => $reviewed['slug']]) }}">
                    <img src="{{ $reviewed['coverBigUrl'] }}" alt="game cover"
                         class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                </a>
                @if(isset($reviewed['total_rating']))
                    <div id="review_{{ $reviewed['slug'] }}" class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full text-xs"
                         style="right: -20px; bottom: -20px;">
                    </div>
                @endif
            </div>
            <div class="ml-12">
                <a href="{{ route('games.show', ['slug' => $reviewed['slug']]) }}" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">{{ $reviewed['name'] }}</a>
                <div class="text-gray-400 mt-1">{{ $reviewed['platforms'] }}</div>
                <p class="text-gray-400 mt-6 hidden lg:block">{{ $reviewed['summary'] }}</p>
            </div>
        </div>
    @empty
        @for($i=0;$i<3;$i++)
            <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                <div class="relative flex-none">
                    <div class="bg-gray-700 w-48 h-64"></div>
                </div>
                <div class="ml-12">
                    <div class="bg-gray-600 w-20 h-6 rounded mt-4"></div>
                    <div class="bg-gray-600 w-44 h-6 rounded mt-3"></div>
                    <div class="bg-gray-600 w-96 h-5 rounded mt-9"></div>
                    <div class="bg-gray-600 w-96 h-5 rounded mt-3"></div>
                    <div class="bg-gray-600 w-96 h-5 rounded mt-3"></div>
                </div>
            </div>
        @endfor
    @endforelse
</div>
@push('scripts')
    @include('layouts._rating', [
        'event' => 'reviewGameWithRatingAdded',
    ])
@endpush
