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
        $this->recentlyReviewed = Cache::remember('recently-reviewed', config('services.igdb.cache-time'), function () {
            return Http::withHeaders(config('services.igdb.headers'))
                ->withBody("fields name, cover.url,platforms.abbreviation,first_release_date,total_rating,total_rating_count,summary,slug;
                    where platforms = ($this->platformIds)
                    & first_release_date >= $this->before
                    & first_release_date < $this->current
                    & total_rating_count > 1
                    & cover != null & total_rating != null;
                    sort first_release_date desc;
                    limit 3;", 'text')
                ->post('https://api.igdb.com/v4/games')->json();
        });
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
