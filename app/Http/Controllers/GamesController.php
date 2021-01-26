<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platforms = [
            167 => "PlayStation 5",
            165 => "PlayStation VR",
            130 => "Nintendo Switch",
            49 => "Xbox One",
            48 => "PlayStation 4",
            6 => "PC (Microsoft Windows)",
        ];
        $platformIds = implode(',', array_keys($platforms));

        $before = Carbon::now()->subMonths(2)->timestamp;
        $after = Carbon::now()->addMonths(2)->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;
        $current = Carbon::now()->timestamp;
        $popularGames = Http::withHeaders(config('services.igdb'))
            ->withBody("fields name, cover.url, platforms.abbreviation, first_release_date, total_rating;
                    where platforms = ($platformIds) & (
                        first_release_date >= $before
                        &
                        first_release_date < $after
                    ) & cover != null & total_rating != null;
                    sort total_rating desc;
                    limit 12;", 'text')
            ->post('https://api.igdb.com/v4/games')->json();

        $recentlyReviewed = Http::withHeaders(config('services.igdb'))
            ->withBody("fields name, cover.url, platforms.abbreviation, first_release_date, total_rating, total_rating_count, summary;
                    where platforms = ($platformIds) & (
                        first_release_date >= $before
                        &
                        first_release_date < $current
                        &
                        total_rating_count > 1
                    ) & cover != null & total_rating != null;
                    sort first_release_date desc;
                    limit 3;", 'text')
            ->post('https://api.igdb.com/v4/games')->json();

        $mostAnticipated = Http::withHeaders(config('services.igdb'))
            ->withBody("fields name, cover.url, platforms.abbreviation, first_release_date, total_rating;
                    where platforms = ($platformIds) & (
                        first_release_date >= $current
                        &
                        first_release_date < $afterFourMonths
                    ) & cover != null;
                    sort total_rating desc;
                    limit 4;", 'text')
            ->post('https://api.igdb.com/v4/games')->json();

        $comingSoon = Http::withHeaders(config('services.igdb'))
            ->withBody("fields name, cover.url, platforms.abbreviation, first_release_date, total_rating;
                    where platforms = ($platformIds)
                    & first_release_date >= $current
                    & total_rating_count > 0
                    & cover != null;
                    sort first_release_date asc;
                    limit 4;", 'text')
            ->post('https://api.igdb.com/v4/games')->json();;

        return view('index', [
            'popularGames' => $popularGames,
            'recentlyReviewed' => $recentlyReviewed,
            'mostAnticipated' => $mostAnticipated,
            'comingSoon' => $comingSoon,
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
