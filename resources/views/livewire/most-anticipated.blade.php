<div wire:init="loadMostAnticipated"
     class="most-anticipated-container space-y-10 mt-8">
    @forelse($mostAnticipated as $anticipated)
        <x-game-card-small :game="$anticipated" />
    @empty
        @for($i=0;$i<4;$i++)
            <x-game-card-small-skeleton />
        @endfor
    @endforelse
</div>
