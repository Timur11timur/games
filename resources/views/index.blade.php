@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Games</h2>
        <div
            class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
            @for($i=0;$i<10;$i++)
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
        <div class="flex flex-col lg:flex-row my-10">
            <div class="recently-reviewed w-full lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently reviewed</h2>
                <div class="recently-reviewed-container space-y-12 mt-8">
                    @for($i=0;$i<3;$i++)
                        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                            <div class="relative flex-none">
                                <a href="#">
                                    <img src="/images/Just_Cause_4.jpg" alt="game cover"
                                         class="w-48 hover:opacity-75 transition ease-in-out duration-150">
                                </a>
                                <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                                     style="right: -20px; bottom: -20px;">
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                                </div>
                            </div>
                            <div class="ml-12">
                                <a href="#" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">Just
                                    Cause 4</a>
                                <div class="text-gray-400 mt-1">PlayStation 4</div>
                                <p class="text-gray-400 mt-6 hidden lg:block">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aspernatur aut autem
                                    consectetur, deleniti dignissimos dolore, earum eveniet ex in nobis obcaecati
                                    possimus quae quos recusandae sint tempore totam veniam!
                                </p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="most-anticipated lg:w-1/4 mt-12 lg:mt-0">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most anticipated</h2>
                <div class="most-anticipated-container space-y-10 mt-8">
                    @for($i=0;$i<4;$i++)
                        <div class="game flex">
                            <a href="#">
                                <img src="/images/Just_Cause_4.jpg" alt="game cover"
                                     class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="ml-4">
                                <a href="#" class="hover:text-gray-300">Just Cause 4</a>
                                <div class="text-gray-400 text-sm mt-1">September 16, 2020</div>
                            </div>
                        </div>
                    @endfor
                </div>
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-10">Coming soon</h2>
                <div class="coming-soon-container space-y-10 mt-8">
                    @for($i=0;$i<4;$i++)
                        <div class="game flex">
                            <a href="#">
                                <img src="/images/Just_Cause_4.jpg" alt="game cover"
                                     class="w-16 hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="ml-4">
                                <a href="#" class="hover:text-gray-300">Just Cause 4</a>
                                <div class="text-gray-400 text-sm mt-1">September 16, 2020</div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
