<?php

namespace App\Http\Livewire;

use App\Traits\IGDB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PopularGames extends Component
{
    use IGDB;

    public $popularGames = [];

    public function loadPopularGames()
    {
        $this->popularGames = Cache::remember('popular-games', config('services.igdb.cache-time'), function () {
            return Http::withHeaders(config('services.igdb.headers'))
                ->withBody("fields name, cover.url, platforms.abbreviation, first_release_date, total_rating;
                    where platforms = ($this->platformIds) & (
                        first_release_date >= $this->before
                        &
                        first_release_date < $this->after
                    ) & cover != null & total_rating != null;
                    sort total_rating desc;
                    limit 12;", 'text')
                ->post('https://api.igdb.com/v4/games')->json();
        });
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
