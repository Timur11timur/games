<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $game = Http::withHeaders(config('services.igdb.headers'))
            ->withBody("fields name,cover.url,platforms.abbreviation,first_release_date,aggregated_rating,rating,total_rating,slug,summary,genres.name,involved_companies.company.name,videos.video_id,videos.name,screenshots.url,similar_games.name,similar_games.slug,similar_games.total_rating,similar_games.platforms.abbreviation,similar_games.cover.url,websites.url;
                    where slug=\"$slug\";", 'text')
            ->post('https://api.igdb.com/v4/games')->json();

        abort_if(!$game, 404);

        return view('show', [
            'game' => $this->formatForView($game[0]),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function formatForView($game)
    {
        $result = collect($game)->merge([
                'coverBigUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                'aggregated_rating' => isset($game['aggregated_rating']) ? round($game['aggregated_rating']) : '0',
                'total_rating' => isset($game['total_rating']) ? round($game['total_rating']) : '0',
                'genres' => implode(', ',
                    array_map(
                        function ($item) {
                            return $item['name'];
                        },
                        array_filter(
                            $game['genres'],
                            function ($it) {
                                return isset($it['name']);
                            }
                        )
                    )
                ),
                'involved_companies' => isset($game['company']) ? implode(', ',
                    array_map(
                        function ($item) {
                            return $item['company']['name'];
                        },
                        array_filter(
                            $game['involved_companies'],
                            function ($it) {
                                return isset($it['company']['name']);
                            }
                        )
                    )
                ) : null,
                'platforms' => isset($game['abbreviation']) ? implode(', ',
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
                ) : null,
                'screenshots' => collect($game['screenshots'])->map(function($screenshot){
                    return [
                        'huge' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']),
                        'big' => Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']),
                    ];
                }),
                'similarGames' => collect($game['similar_games'])->map(function($similar){
                    return [
                        'coverBigUrl' => isset($similar['cover']) ? Str::replaceFirst('thumb', 'cover_big', $similar['cover']['url']) : null,
                        'total_rating' => isset($similar['total_rating']) ? round($similar['total_rating']) : null,
                        'platforms' => isset($game['platforms']) ?  implode (', ',array_map(function($item) {return $item['abbreviation'] ?? $item;}, array_filter($similar['platforms'], function($it) {return isset($it['abbreviation']);}))) : null,
                        'slug' => $similar['slug'],
                        'name' => $similar['name'],
                    ];
                })->take(6),
                'social' => [
                    'website' => isset($game['websites']) ? collect($game['websites'])->first() : null,
                    'facebook' => isset($game['websites']) ? collect($game['websites'])->filter(function($website) {
                        return Str::contains($website['url'], 'facebook');
                    })->first() : null,
                    'twitter' => isset($game['websites']) ? collect($game['websites'])->filter(function($website) {
                        return Str::contains($website['url'], 'twitter');
                    })->first() : null,
                    'instagram' => isset($game['websites']) ? collect($game['websites'])->filter(function($website) {
                        return Str::contains($website['url'], 'instagram');
                    })->first() : null,
                ]
            ]);

        return $result;
    }

    public function tim()
    {
        $rids=55;
        $did=11;
        $bids=13;
        $hccids='5%2c4';
        $atid=2;
        $cq=1;
        $atca1=3;
        $atca2=0;
        $atca3=0;
        $dd='16.04.2021';
        $ddt='25.04.2021';
        $dcid=10;    //ночей от
        $dcidto=10;  //ночей до
        $priceto=200000;
        $pg=1;      //page
        $reid=0;

        //$response = Http::post("https://www.poehalisnami.ua/ajaxlist/pagerlist/egipet/sharm-el-shejjkh?rids=$rids&did=$did&bids=$bids&hccids=$hccids&atid=$atid&cq=$cq&atca1=$atca1&atca2=$atca2&atca3=$atca3&dd=$dd&ddt=$ddt&dcid=$dcid&dcidto=$dcidto&priceto=$priceto&pg=$pg&reid=$reid")->json();

        $data = [];
        do {
            $response = Http::post("https://www.poehalisnami.ua/ajaxlist/pagerlist/egipet/sharm-el-shejjkh?rids=$rids&did=$did&bids=$bids&hccids=$hccids&atid=$atid&cq=$cq&atca1=$atca1&atca2=$atca2&atca3=$atca3&dd=$dd&ddt=$ddt&dcid=$dcid&dcidto=$dcidto&priceto=$priceto&pg=$pg&reid=$reid")->json();
            $data = array_merge($data, $response['TourListItems']);
            echo $pg;
            $pg++;
        } while(count($response['TourListItems']) > 0);

        $html = "<table>
            <tr>
                <th>Имя</th>
                <th>Звезд</th>
                <th>Дата старта</th>
                <th>Ночей</th>
                <th>Средняя оценка</th>
                <th>Цена</th>
            </tr>";

        foreach ($data as $item) {
            $html .= "<tr>
                <td>".$item['TourName']."</td>
                <td>".count($item['HotelStarsCount'])."</td>
                <td>".$item['DateFromFull']."</td>
                <td>".$item['NightsText']."</td>
                <td>".$item['MarkAvg']."</td>
                <td>".$item['PriceFrom']."</td>
            </tr>";
        }

        $html .= "</table>";

        echo $html;
        dd($data[0]);
    }
}
