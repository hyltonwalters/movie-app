@extends('layouts.main')

@section('content')

<div class="popular-movies border-b border-gray-800">
  <div class="container mx-auto px-4 py-16">
    <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

      @foreach ($popularMovies as $movie)
      <x-movie-card :movie="$movie" :genres="$genres" />
      @endforeach

    </div>
  </div>
</div>

<div class="now-playing border-b border-gray-800">
  <div class="container mx-auto border-b border-gray-800 px-4 py-16">
    <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Now Playing</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

      @foreach ($now_playingMovies as $movie)
      <x-movie-card :movie="$movie" />
      @endforeach

    </div>
  </div>
</div>
@endsection