<div wire:init="loadComingSoon"
     class="coming-soon-container space-y-10 mt-8">
    @forelse($comingSoon as $soon)
        <x-game-card-small :game="$soon" />
    @empty
        @for($i=0;$i<4;$i++)
            <x-game-card-small-skeleton />
        @endfor
    @endforelse
</div>
