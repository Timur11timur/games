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
        $popularGames = Cache::remember('popular-games', config('services.igdb.cache-time'), function () {
            return Http::withHeaders(config('services.igdb.headers'))
                ->withBody("fields name,cover.url,platforms.abbreviation,first_release_date,rating,total_rating,slug;
                    where platforms = ($this->platformIds)
                    & first_release_date >= $this->before
                    & first_release_date < $this->after
                    & cover != null
                    & total_rating != null
                    & slug != null;
                    sort total_rating desc;
                    limit 12;", 'text')
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });

        $this->popularGames = $this->formatForView($popularGames);

        collect($this->popularGames)->filter(function ($game) {
            return $game['total_rating'];
        })->each(function ($game) {
            $this->emit('gameWithRatingAdded', [
                'slug' => $game['slug'],
                'rating' => $game['total_rating'] / 100,
            ]);
        });
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
