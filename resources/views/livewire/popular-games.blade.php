<div wire:init="loadPopularGames"
    class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
    @forelse($popularGames as $popularGame)
        <x-game-card :game="$popularGame" />
    @empty
        @for($i=0;$i<12;$i++)
            <x-game-card-skeleton />
        @endfor
    @endforelse
</div>
@push('scripts')
    @include('layouts._rating', [
        'event' => 'gameWithRatingAdded',
    ])
@endpush
