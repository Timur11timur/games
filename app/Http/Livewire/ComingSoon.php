<?php

namespace App\Http\Livewire;

use App\Traits\IGDB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ComingSoon extends Component
{
    use IGDB;

    public $comingSoon = [];

    public function loadComingSoon()
    {
        $this->comingSoon = Cache::remember('coming-soon', config('services.igdb.cache-time'), function () {
            return Http::withHeaders(config('services.igdb.headers'))
                ->withBody("fields name,cover.url,platforms.abbreviation,first_release_date,total_rating,slug;
                    where platforms = ($this->platformIds)
                    & first_release_date >= $this->current
                    & total_rating_count > 0
                    & cover != null;
                    sort first_release_date asc;
                    limit 4;", 'text')
                ->post('https://api.igdb.com/v4/games')->json();
        });
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
