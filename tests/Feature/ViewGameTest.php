<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewGameTest extends TestCase
{
    /** @test */
    public function the_game_page_shows_correct_game_info()
    {
        Http::fake([
            'https://api.igdb.com/v4/games' => $this->fakeSingleGame(),
        ]);

        $response = $this->get(route('games.show', 'fake-animal-crossing-new-horizons'));

        $response->assertStatus(200);
        $response->assertSee('FAKE HITMAN 3');
        $response->assertSee('Shooter');
        $response->assertSee('Puzzle');
        $response->assertSee('Tactical');
        $response->assertSee('83');
        $response->assertSee('87');
    }

    public function fakeSingleGame()
    {
        return Http::response([
            [
                "id" => 134595,
                "aggregated_rating" => 86.833333333333,
                "cover" => [
                    "id" => 105761,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co29lt.jpg",
                ],
                "first_release_date" => 1611100800,
                "genres" => [
                    [
                        "id" => 5,
                        "name" => "Shooter",
                    ],
                    [
                        "id" => 9,
                        "name" => "Puzzle",
                    ],
                    [
                        "id" => 24,
                        "name" => "Tactical",
                    ]
                ],
                "involved_companies" => [
                    [
                        "id" => 104994,
                        "company" => [
                            "id" => 290,
                            "name" => "IO Interactive",
                        ]
                    ]
                ],
                "name" => "FAKE HITMAN 3",
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
                "screenshots" => [
                    [
                        "id" => 388159,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc8bi7.jpg"
                    ],
                    [
                        "id" => 388244,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc8bkk.jpg"
                    ]
                ],
                "similar_games" => [
                    [
                        "id" => 19164,
                        "cover" => [
                            "id" => 94287,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co20r3.jpg"
                        ],
                        "name" => "Borderlands 3",
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
                        "slug" => "borderlands-3",
                        "total_rating" => 80.676058306833
                    ],
                    [
                        "id" => 75242,
                        "cover" => [
                            "id" => 82268,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rh8.jpg"
                        ],
                        "name" => "Blood & Truth",
                        "platforms" => [
                            [
                                "id" => 165,
                                "abbreviation" => "PlayStation VR"
                            ]
                        ],
                        "slug" => "blood-and-truth",
                        "total_rating" => 72.222222222222
                    ],
                    [
                        "id" => 103210,
                        "cover" => [
                            "id" => 127466,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2qcq.jpg"
                        ],
                        "name" => "HITMAN 2",
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
                                "id" => 203
                            ]
                        ],
                        "slug" => "hitman-2",
                        "total_rating" => 81.953235293002
                    ],
                    [
                        "id" => 103292,
                        "cover" => [
                            "id" => 125681,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2oz5.jpg"
                        ],
                        "name" => "Gears 5",
                        "platforms" => [
                            [
                                "id" => 6,
                                "abbreviation" => "PC"
                            ],
                            [
                                "id" => 49,
                                "abbreviation" => "XONE"
                            ],
                            [
                                "id" => 169,
                                "abbreviation" => "Series X"
                            ]
                        ],
                        "slug" => "gears-5",
                        "total_rating" => 84.402704659078
                    ],
                    [
                        "id" => 103298,
                        "cover" => [
                            "id" => 75007,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1lvj.jpg"
                        ],
                        "name" => "DOOM Eternal",
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
                                "id" => 167,
                                "abbreviation" => "PS5"
                            ],
                            [
                                "id" => 169,
                                "abbreviation" => "Series X"
                            ],
                            [
                                "id" => 203
                            ]
                        ],
                        "slug" => "doom-eternal",
                        "total_rating" => 85.532366418484
                    ],
                    [
                        "id" => 103301,
                        "cover" => [
                            "id" => 95038,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co21by.jpg"
                        ],
                        "name" => "Wolfenstein: Youngblood",
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
                                "id" => 170,
                                "abbreviation" => "Stadia"
                            ]
                        ],
                        "slug" => "wolfenstein-youngblood",
                        "total_rating" => 67.464218763367
                    ],
                    [
                        "id" => 105049,
                        "cover" => [
                            "id" => 75344,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1m4w.jpg"
                        ],
                        "name" => "Remnant: From the Ashes",
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
                            ]
                        ],
                        "slug" => "remnant-from-the-ashes",
                        "total_rating" => 77.982052675212
                    ],
                    [
                        "id" => 106805,
                        "cover" => [
                            "id" => 87782,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1vqe.jpg"
                        ],
                        "name" => "Call of Duty: Mobile",
                        "platforms" => [
                            [
                                "id" => 34,
                                "abbreviation" => "Android"
                            ],
                            [
                                "id" => 39,
                                "abbreviation" => "iOS"
                            ]
                        ],
                        "slug" => "call-of-duty-mobile",
                        "total_rating" => 75.961834466928
                    ],
                    [
                        "id" => 118218,
                        "cover" => [
                            "id" => 90420,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1xro.jpg"
                        ],
                        "name" => "Tom Clancy's Ghost Recon: Breakpoint",
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
                                "id" => 170,
                                "abbreviation" => "Stadia"
                            ]
                        ],
                        "slug" => "tom-clancys-ghost-recon-breakpoint",
                        "total_rating" => 56.193421487814
                    ]
                ],
                "slug" => "fake-hitman-3",
                "summary" => "Agent 47 returns as a ruthless professional for the most important contracts of his entire career in HITMAN 3, the dramatic conclusion to the World of Assassina ",
                "total_rating" => 83.029531730174,
                "videos" => [
                    [
                        "id" => 44838,
                        "name" => "Announcement Trailer",
                        "video_id" => "R_Ob-fupzKg"
                    ],
                    [
                        "id" => 44839,
                        "name" => "Announcement Trailer",
                        "video_id" => "HNUsFk0-1GU"
                    ],
                    [
                        "id" => 44840,
                        "name" => "Game Intro",
                        "video_id" => "te_nocX0gi4"
                    ],
                    [
                        "id" => 44841,
                        "name" => "Launch Trailer",
                        "video_id" => "1a2SBO_q66o"
                    ]
                ],
                "websites" => [
                    [
                        "id" => 143442,
                        "url" => "http://hitman.com"
                    ],
                    [
                        "id" => 143444,
                        "url" => "https://www.instagram.com/hitman_official"
                    ],
                    [
                        "id" => 143445,
                        "url" => "https://www.youtube.com/user/hitman"
                    ],
                    [
                        "id" => 143446,
                        "url" => "https://www.reddit.com/r/HiTMAN"
                    ],
                    [
                        "id" => 148707,
                        "url" => "https://hitman.fandom.com/wiki/HITMAN%E2%84%A2_III"
                    ],
                    [
                        "id" => 148708,
                        "url" => "https://en.wikipedia.org/wiki/Hitman_3"
                    ],
                    [
                        "id" => 148709,
                        "url" => "https://www.facebook.com/hitman"
                    ],
                    [
                        "id" => 148710,
                        "url" => "https://twitter.com/hitman"
                    ],
                    [
                        "id" => 148711,
                        "url" => "https://www.twitch.tv/iointeractive"
                    ],
                    [
                        "id" => 148712,
                        "url" => "https://discord.gg/hitman"
                    ],
                    [
                        "id" => 166846,
                        "url" => "https://www.epicgames.com/store/en-US/product/hitman-3/home"
                    ]
                ]
            ]
        ]);
    }
}
