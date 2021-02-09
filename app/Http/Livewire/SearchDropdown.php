<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';

    public $searchResults = [];

    public function render()
    {
        if (strlen($this->search) > 1) {
            $this->searchResults = Http::withHeaders(config('services.igdb.headers'))
                ->withBody("search \"{$this->search}\";
                            fields name,cover.url,slug;
                            where cover != null
                            & slug != null
                            & name != null;
                            limit 6;", 'text')
                ->post('https://api.igdb.com/v4/games')
                ->json();
        }

        return view('livewire.search-dropdown');
    }
}