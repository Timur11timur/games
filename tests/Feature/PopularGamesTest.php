<?php

namespace Tests\Feature;

use App\Http\Livewire\PopularGames;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class PopularGamesTest extends TestCase
{
    /** @test */
    public function the_game_page_shows_correct_game_info()
    {
        Http::fake([
            'https://api.igdb.com/v4/games' => $this->fakePopularGames(),
        ]);

        Livewire::test(PopularGames::class)
            ->assertSet('popularGames', [])
            ->call('loadPopularGames')
            ->assertSee('KORG Gadget')
            ->assertSee('Switch')
            ->assertSee('PC, PS4, XONE, PS5, Series X, Stadia')
            ->assertSee('HITMAN 3');
    }

    public function fakePopularGames()
    {
        return Http::response([

                [
                    "id" => 77537,
                    "cover" => [
                        "id" => 120407,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2kwn.jpg"
                    ],
                    "first_release_date" => 1607040000,
                    "name" => "KORG Gadget",
                    "platforms" => [
                        [
                            "id" => 130,
                            "abbreviation" => "Switch"
                        ]
                    ],
                    "rating" => 93.0,
                    "slug" => "korg-gadget",
                    "total_rating" => 93.0
                ],
                [
                    "id" => 120550,
                    "cover" => [
                        "id" => 109917,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2ct9.jpg"
                    ],
                    "first_release_date" => 1611792000,
                    "name" => "Olija",
                    "platforms" => [
                        [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        [
                            "id" => 48,
                            "abbreviation" => "PS4"
                        ],
                        [
                            "id" => 49,
                            "abbreviation" => "XONE"
                        ],
                        [
                            "id" => 130,
                            "abbreviation" => "Switch"
                        ]
                    ],
                    "slug" => "olija",
                    "total_rating" => 90.0
                ],
                [
                    "id" => 37146,
                    "cover" => [
                        "id" => 90570,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1xvu.jpg"
                    ],
                    "first_release_date" => 1607558400,
                    "name" => "Unto The End",
                    "platforms" => [
                        [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        [
                            "id" => 14,
                            "abbreviation" => "Mac"
                        ],
                        [
                            "id" => 48,
                            "abbreviation" => "PS4"
                        ],
                        [
                            "id" => 49,
                            "abbreviation" => "XONE"
                        ],
                        [
                            "id" => 130,
                            "abbreviation" => "Switch"
                        ]
                    ],
                    "slug" => "unto-the-end",
                    "total_rating" => 90.0
                ],
                [
                    "id" => 131872,
                    "cover" => [
                        "id" => 96251,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co229n.jpg"
                    ],
                    "first_release_date" => 1607558400,
                    "name" => "PixelJunk Eden 2",
                    "platforms" => [
                        [
                            "id" => 130,
                            "abbreviation" => "Switch"
                        ]
                    ],
                    "slug" => "pixeljunk-eden-2",
                    "total_rating" => 85.0
                ],
                [
                    "id" => 115473,
                    "cover" => [
                        "id" => 100014,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2566.jpg"
                    ],
                    "first_release_date" => 1608163200,
                    "name" => "Airborne Kingdom",
                    "platforms" => [
                        [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        [
                            "id" => 14,
                            "abbreviation" => "Mac"
                        ]
                    ],
                    "slug" => "airborne-kingdom",
                    "total_rating" => 83.666666666667
                ],
                [
                    "id" => 134595,
                    "cover" => [
                        "id" => 105761,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co29lt.jpg"
                    ],
                    "first_release_date" => 1611100800,
                    "name" => "HITMAN 3",
                    "platforms" => [
                        [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        [
                            "id" => 48,
                            "abbreviation" => "PS4"
                        ],
                        [
                            "id" => 49,
                            "abbreviation" => "XONE"
                        ],
                        [
                            "id" => 167,
                            "abbreviation" => "PS5"
                        ],
                        [
                            "id" => 169,
                            "abbreviation" => "Series X"
                        ],
                        [
                            "id" => 170,
                            "abbreviation" => "Stadia"
                        ]
                    ],
                    "rating" => 79.225730127015,
                    "slug" => "hitman-3",
                    "total_rating" => 83.029531730174
                ],
                [
                    "id" => 138765,
                    "cover" => [
                        "id" => 114322,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2g7m.jpg"
                    ],
                    "first_release_date" => 1610582400,
                    "name" => "Scott Pilgrim vs. the World: The Game - Complete Edition",
                    "platforms" => [
                        [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        [
                            "id" => 48,
                            "abbreviation" => "PS4"
                        ],
                        [
                            "id" => 49,
                            "abbreviation" => "XONE"
                        ],
                        [
                            "id" => 130,
                            "abbreviation" => "Switch"
                        ],
                        [
                            "id" => 169,
                            "abbreviation" => "Series X"
                        ]
                    ],
                    "slug" => "scott-pilgrim-vs-the-world-the-game-complete-edition",
                    "total_rating" => 82.5
                ],
                [
                    "id" => 89594,
                    "cover" => [
                        "id" => 80486,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1q3q.jpg"
                    ],
                    "first_release_date" => 1607385600,
                    "name" => "Monster Sanctuary",
                    "platforms" => [
                        [
                            "id" => 3,
                            "abbreviation" => "Linux"
                        ],
                        [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        [
                            "id" => 14,
                            "abbreviation" => "Mac"
                        ],
                        [
                            "id" => 48,
                            "abbreviation" => "PS4"
                        ],
                        [
                            "id" => 49,
                            "abbreviation" => "XONE"
                        ],
                        [
                            "id" => 130,
                            "abbreviation" => "Switch"
                        ],
                    ],
                    "rating" => 80.0,
                    "slug" => "monster-sanctuary",
                    "total_rating" => 82.5
                ]

        ]);
    }
}
