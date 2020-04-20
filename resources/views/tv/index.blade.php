@extends('layouts.main')

@section('content')

<div class="popular-tv border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

            @foreach ($popularTv as $tvshow)
            <x-tv-card :tvshow="$tvshow" :genres="$genres" />
            @endforeach

        </div>
    </div>
</div>

<div class="top-rated-tv">
    <div class="container mx-auto px-4 py-16">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Top Rated Shows</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

            @foreach ($topRatedTv as $tvshow)
            <x-tv-card :tvshow="$tvshow" />
            @endforeach

        </div>
    </div>
</div>
@endsection
