@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{ $game['coverBigUrl'] }}" alt="game cover"
                     class="w-80 hover:opacity-75 transition ease-in-out duration-150">
            </div>
            <div class="lg:ml-12 lg:mr-64">
                <h2 class="font-semibold text-4xl leading-tight mt-1">{{ $game['name'] }}</h2>
                <div class="text-gray-400">
                    <span>{{ $game['genres'] }}</span>
                    @if(!is_null($game['involved_companies']))
                        &middot;
                        <span>{{ $game['involved_companies'] }}</span>
                    @endif
                    @if(!is_null($game['platforms']))
                        &middot;
                        <span>{{ $game['platforms'] }}</span>
                    @endif
                </div>

                <div class="flex flex-wrap items-center mt-8">
                    <div class="flex items-center">
                        <div id="totalRating" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                            @push('scripts')
                                @include('layouts._rating', [
                                    'slug' => 'totalRating',
                                    'rating' => $game['total_rating'],
                                    'event' => null,
                                ])
                            @endpush
                        </div>
                        <div class="ml-4 text-xs">Member's<br> score</div>
                    </div>
                    <div class="flex items-center ml-12">
                        <div id="aggregatedRating" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                            @push('scripts')
                                @include('layouts._rating', [
                                    'slug' => 'aggregatedRating',
                                    'rating' => $game['aggregated_rating'],
                                    'event' => null,
                                ])
                            @endpush
                        </div>
                        <div class="ml-4 text-xs">Critic's<br> score</div>
                    </div>
                    <div class="flex items-center space-x-4 mt-4 lg:mt-0 lg:ml-12">
                        @if(!is_null($game['social']['website']))
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game['social']['website']['url'] }}" target="_blank" class="hover:text-gray-400 w-5">
                                    <img src="/images/icons/world.svg" alt="world" class="hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                            </div>
                        @endif
                        @if(!is_null($game['social']['instagram']))
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game['social']['instagram']['url'] }}" target="_blank" class="hover:text-gray-400 w-5">
                                    <img src="/images/icons/instagram.svg" alt="world" class="hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                            </div>
                        @endif
                        @if(!is_null($game['social']['twitter']))
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game['social']['twitter']['url'] }}" target="_blank" class="hover:text-gray-400 w-5">
                                    <img src="/images/icons/twitter.svg" alt="world" class="hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                            </div>
                        @endif
                        @if(!is_null($game['social']['facebook']))
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game['social']['facebook']['url'] }}" target="_blank" class="hover:text-gray-400 w-5">
                                    <img src="/images/icons/facebook.svg" alt="world" class="hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                @if(isset($game['summary']))
                    <p class="mt-12">{{ $game['summary'] }}</p>
                @endif
                <div class="mt-12">
{{--                    <button class="flex bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-4 rounded transition ease-in-out duration-150">--}}
{{--                       <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path></svg>--}}
{{--                       <span class="ml-2">Play Trailer</span>--}}
{{--                    </button>--}}
                    @if(isset($game['videos']))
                        @foreach($game['videos'] as $video)
                            <a target="_blank" href="https://youtube.com/watch/{{ $video['video_id'] }}" class="inline-flex bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-4 rounded transition ease-in-out duration-150 mr-2 mb-2">
                                <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path></svg>
                                <span class="ml-2">Play {{ $video['name'] }}</span>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        @if(isset($game['screenshots']))
            <div class="images-container border-b border-gray-800 pb-12 mt-8">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                    @foreach($game['screenshots'] as $screenshot)
                        <div>
                            <a target="_blank" href="{{ $screenshot['huge'] }}">
                                <img src="{{ $screenshot['big'] }}" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="similar-games-container mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar Ggames</h2>
            <div
                class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
                @foreach($game['similarGames'] as $similar_game)
                    @if(is_null($similar_game['coverBigUrl']))
                        @continue
                    @endif
                    <x-game-card :game="$similar_game" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
