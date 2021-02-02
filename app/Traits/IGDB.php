<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Str;

trait IGDB
{
    private $platformIds;
    private $before;
    private $after;
    private $afterFourMonths;
    private $current;

    public function __construct($id = null)
    {
        parent::__construct($id);

        $platforms = [
            167 => "PlayStation 5",
            165 => "PlayStation VR",
            130 => "Nintendo Switch",
            49 => "Xbox One",
            48 => "PlayStation 4",
            6 => "PC (Microsoft Windows)",
        ];

        $this->platformIds = implode(',', array_keys($platforms));
        $this->before = Carbon::now()->subMonths(2)->timestamp;
        $this->after = Carbon::now()->addMonths(2)->timestamp;
        $this->afterFourMonths = Carbon::now()->addMonths(4)->timestamp;
        $this->current = Carbon::now()->timestamp;
    }

    private function formatForView($games)
    {
        $result = collect($games)
            ->filter(function ($game) {
                if (isset($game['cover']) && isset($game['cover']['url']) && isset($game['slug'])) {
                    return true;
                }
            })
            ->map(function ($game) {
                return collect($game)->merge([
                    'coverBigUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                    'coverSmallUrl' => Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']),
                    'rating' => isset($game['rating']) ? round($game['rating']) . '%' : null,
                    'total_rating' => isset($game['total_rating']) ? round($game['total_rating']) . '%' : null,
                    'releaseDate' => isset($game['first_release_date']) ? Carbon::parse($game['first_release_date'])->format('M d, Y') : null,
                    'platforms' => implode(', ',
                        array_map(
                            function ($item) {
                                return $item['abbreviation'];
                            },
                            array_filter(
                                $game['platforms'],
                                function ($it) {
                                    return isset($it['abbreviation']);
                                }
                            )
                        )
                    ),
                ]);
            });

        return $result;
    }
}
