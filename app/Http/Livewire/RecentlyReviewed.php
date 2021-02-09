<?php

namespace App\Http\Livewire;

use App\Traits\IGDB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class RecentlyReviewed extends Component
{
    use IGDB;

    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $recentlyReviewed = Cache::remember('recently-reviewed', config('services.igdb.cache-time'), function () {
            return Http::withHeaders(config('services.igdb.headers'))
                ->withBody("fields name,cover.url,platforms.abbreviation,first_release_date,rating,total_rating,total_rating_count,summary,slug;
                    where platforms = ($this->platformIds)
                    & first_release_date >= $this->before
                    & first_release_date < $this->current
                    & total_rating_count > 1
                    & cover != null
                    & total_rating != null
                    & slug != null;
                    sort first_release_date desc;
                    limit 3;", 'text/plain')
                ->post('https://api.igdb.com/v4/games')->json();
        });

        $this->recentlyReviewed = $this->formatForView($recentlyReviewed);

        collect($this->recentlyReviewed)->filter(function ($game) {
            return $game['total_rating'];
        })->each(function ($game) {
            $this->emit('reviewGameWithRatingAdded', [
                'slug' => 'review_' . $game['slug'],
                'rating' => $game['total_rating'] / 100,
            ]);
        });
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
