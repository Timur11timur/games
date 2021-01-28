@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{ str_replace('thumb', 'cover_big', $game['cover']['url']) }}" alt="game cover"
                     class="w-80 hover:opacity-75 transition ease-in-out duration-150">
            </div>
            <div class="lg:ml-12 lg:mr-64">
                <h2 class="font-semibold text-4xl leading-tight mt-1">{{ $game['name'] }}</h2>
                <div class="text-gray-400">
                    <span>{{ implode (', ',array_map(function($item) {return $item['name'];}, $game['genres'])) }}</span>
                    &middot;
                    <span>{{ implode (', ',array_map(function($item) {return $item['company']['name'];}, $game['involved_companies'])) }}</span>
                    &middot;
                    <span>{{ implode (', ',array_map(function($item) {return $item['abbreviation'];}, $game['platforms'])) }}</span>
                </div>

                <div class="flex flex-wrap items-center mt-8">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                @if(isset($game['total_rating']))
                                    {{ round($game['total_rating']) }}%
                                @else
                                    0%
                                @endif
                            </div>
                        </div>
                        <div class="ml-4 text-xs">Member's<br> score</div>
                    </div>
                    <div class="flex items-center ml-12">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                @if(isset($game['aggregated_rating']))
                                    {{ round($game['aggregated_rating']) }}%
                                @else
                                    0%
                                @endif
                            </div>
                        </div>
                        <div class="ml-4 text-xs">Critic's<br> score</div>
                    </div>
                    <div class="flex items-center space-x-4 mt-4 lg:mt-0 lg:ml-12">
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="hover:text-gray-400 w-5">
                                <img src="/images/icons/world.svg" alt="world" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="hover:text-gray-400 w-5">
                                <img src="/images/icons/instagram.svg" alt="world" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="hover:text-gray-400 w-5">
                                <img src="/images/icons/twitter.svg" alt="world" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="hover:text-gray-400 w-5">
                                <img src="/images/icons/facebook.svg" alt="world" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                    </div>
                </div>
                <p class="mt-12">{{ $game['summary'] }}</p>
                <div class="mt-12">
{{--                    <button class="flex bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-4 rounded transition ease-in-out duration-150">--}}
{{--                       <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path></svg>--}}
{{--                       <span class="ml-2">Play Trailer</span>--}}
{{--                    </button>--}}
                    @foreach($game['videos'] as $video)
                        <a target="_blank" href="https://youtube.com/watch/{{ $video['video_id'] }}" class="inline-flex bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-4 rounded transition ease-in-out duration-150 mr-2">
                            <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path></svg>
                            <span class="ml-2">Play {{ $video['name'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="images-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @foreach($game['screenshots'] as $screenshot)
                    <div>
                        <a target="_blank" href="{{ str_replace('thumb', 'screenshot_huge', $screenshot['url']) }}">
                            <img src="{{ str_replace('thumb', 'screenshot_big', $screenshot['url']) }}" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="similar-games-container mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar Ggames</h2>
            <div
                class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
                @foreach($game['similar_games'] as $similar_game)
                    @if(!isset($similar_game['cover']))
                        @continue
                    @endif
                    <div class="game mt-8">
                        <div class="relative inline-block">
                            <a href="{{ route('games.show', ['slug' => $similar_game['slug']]) }}">
                                <img src="{{ str_replace('thumb', 'cover_big', $similar_game['cover']['url']) }}" alt="game cover"
                                     class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            @if(isset($similar_game['total_rating']))
                                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                                     style="right: -20px; bottom: -20px;">
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">{{ round($similar_game['total_rating']) }}%</div>
                                </div>
                            @endif
                        </div>
                        <a href="{{ route('games.show', ['slug' => $similar_game['slug']]) }}" class="block text-base font-semibold leading-tight hover:text-gray-400">{{ $similar_game['name'] }}</a>
                        @if(isset($similar_game['platforms']))
                            <div class="text-gray-400 mt-1">{{ implode (', ',array_map(function($item) {return $item['abbreviation'];}, $similar_game['platforms'])) }}</div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
