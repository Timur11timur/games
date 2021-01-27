<?php

namespace App\Traits;

use Carbon\Carbon;

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
}
