@extends('layouts.app')

@section('content')
    @dump($__data)
    <div class="container mx-auto px-4 py-6">
        <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="/images/Just_Cause_4.jpg" alt="game cover"
                     class="w-80 hover:opacity-75 transition ease-in-out duration-150">
            </div>
            <div class="lg:ml-12 lg:mr-64">
                <h2 class="font-semibold text-4xl leading-tight mt-1">Just Cause 4</h2>
                <div class="text-gray-400">
                    <span>Adventure, RPG</span>
                    &middot;
                    <span>Square Enix</span>
                    &middot;
                    <span>PS4</span>
                </div>

                <div class="flex flex-wrap items-center mt-8">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">90%</div>
                        </div>
                        <div class="ml-4 text-xs">Member's<br> score</div>
                    </div>
                    <div class="flex items-center ml-12">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">92%</div>
                        </div>
                        <div class="ml-4 text-xs">k's<br> score</div>
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
                <p class="mt-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum ea, expedita minima natus officiis quas, quibusdam quos repudiandae suscipit tempore veniam voluptates! Amet assumenda consequatur, consequuntur ducimus ex exercitationem fugit ipsum itaque iure labore maiores minima modi nesciunt obcaecati perferendis, provident quam quas quo quod rem saepe, sit totam voluptate.</p>
                <div class="mt-12">
                    <button class="flex bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-4 rounded transition ease-in-out duration-150">
                       <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path></svg>
                       <span class="ml-2">Play Trailer</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="images-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @for($i=0;$i<4;$i++)
                    <div>
                        <a href="#">
                            <img src="/images/screenshots/screenshot.jpeg" alt="screenshot" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endfor
            </div>
        </div>

        <div class="similar-games-container mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar Ggames</h2>
            <div
                class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12">
                @for($i=0;$i<6;$i++)
                    <div class="game mt-8">
                        <div class="relative inline-block">
                            <a href="#">
                                <img src="/images/Just_Cause_4.jpg" alt="game cover"
                                     class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full"
                                 style="right: -20px; bottom: -20px;">
                                <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                            </div>
                        </div>
                        <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400">Just Cause 4</a>
                        <div class="text-gray-400 mt-1">PlayStation 4</div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
