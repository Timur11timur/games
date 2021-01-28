<?php

namespace App\Http\Livewire;

use App\Traits\IGDB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MostAnticipated extends Component
{
    use IGDB;

    public $mostAnticipated = [];

    public function loadMostAnticipated()
    {
        $mostAnticipated = Cache::remember('most-anticipated', config('services.igdb.cache-time'), function () {
            return Http::withHeaders(config('services.igdb.headers'))
                ->withBody("fields name,cover,cover.url,platforms.abbreviation,first_release_date,rating,total_rating,slug;
                    where platforms = ($this->platformIds)
                    & first_release_date >= $this->current
                    & first_release_date < $this->afterFourMonths
                    & cover != null;
                    sort total_rating desc;
                    limit 4;", 'text')
                ->post('https://api.igdb.com/v4/games')->json();
        });

        $this->mostAnticipated = $this->formatForView($mostAnticipated);
    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
