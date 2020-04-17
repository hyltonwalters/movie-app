@extends('layouts.main')

@section('content')

<div class="movie-info border-b border-gray-800">
  <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
    @if($movie['poster_path'])
    <img src="{{ "https://images.tmdb.org/t/p/w500" . $movie['poster_path'] }}" alt="poster" class="w-64 md:w-96">
    @else
    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-64 md:w-96">
    @endif
    <div class="md:ml-24">
      <h2 class="text-4xl font-semibold">{{ $movie['title'] }}</h2>
      <div class="flex flex-wrap items-center text-gray-400 text-sm">
        <svg class="fill-current text-orange-500 w-4" viewBox="0 -10 511.99 511">
          <path
            d="M510.65 185.9a27.16 27.16 0 00-23.42-18.7l-147.78-13.43L281.02 17a27.22 27.22 0 00-50.05.03l-58.43 136.74-147.8 13.42a27.2 27.2 0 00-23.4 18.71 27.18 27.18 0 007.96 28.9L121 312.78 88.06 457.86a27.2 27.2 0 0010.58 28.1 27.1 27.1 0 0029.89 1.3L256 411.07l127.42 76.19a27.22 27.22 0 0040.5-29.4l-32.95-145.09 111.7-97.94a27.22 27.22 0 007.98-28.93zm0 0"
            fill="#ED8936" /></svg>
        </svg>
        <span class="ml-1">{{ $movie['vote_average'] * 10 }}%</span>
        <span class="mx-2">|</span>
        <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
        <span class="mx-2">|</span>
        <span>@foreach ($movie['genres'] as $genre)
          {{ $genre['name'] }}@if(!$loop->last), @endif
          @endforeach</span>
      </div>

      <div class="text-gray-300 mt-8">
        {{ $movie['overview'] }}
      </div>
      <div class="mt-12">
        <h4 class="text-white font-semibold">Featured Crew</h4>
        <div class="flex mt-4">
          @foreach ($movie['credits']['crew'] as $crew)
          @if($loop->index < 2) <div class="mr-8">
            <div>{{ $crew['name'] }}</div>
            <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
        </div>
        @endif
        @endforeach
      </div>
    </div>

    <div x-data="{isOpen: false}">
      @if (count($movie['videos']['results']) > 0)
      <div class="mt-12">
        <button @click="isOpen = true"
          class="flex inline-flex items-center bg-orange-500 text-gray-900 font-semibold rounded px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
          <svg class="w-6 mt-2 fill-current" viewbox=" 0 0 612 612">
            <path
              d="M360.34 216.27L219.37 113.88a32.15 32.15 0 00-51.05 26.02v204.77a32.15 32.15 0 0051.05 26.01L360.34 268.3a32.14 32.14 0 000-52.03z" />
            <path
              d="M242.28 0C108.69 0 0 108.69 0 242.28c0 133.6 108.69 242.29 242.28 242.29 133.6 0 242.28-108.7 242.28-242.29C484.56 108.68 375.88 0 242.28 0zm0 425.03c-100.76 0-182.74-81.98-182.74-182.75 0-100.76 81.98-182.74 182.75-182.74s182.74 81.98 182.74 182.74c0 100.77-81.98 182.75-182.74 182.75z" />
          </svg>
          <span class="ml-2">Play Trailer</span>
        </button>
      </div>
      @endif

      <div class="fixed top-0 left-0 h-full w-full flex items-center shadow-lg overflow-y-auto"
        style="background-color: rgba(0,0,0,.5);" x-show.transition.opacity="isOpen">
        <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
          <div class="bg-gray-900 rounded">
            <div class="flex justify-end pr-4 pt-2">
              <button @click="isOpen = false" class="text-3xl leading-none hover:text-gray-300">&times;</button>
            </div>
            <div class="modal-body px-8 py-8">
              <div class="responsive-container overflow-hidden relative" style="padding-top:56.25%">
                <iframe src="https://youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}"
                  class="responsive-iframe absolute top-0 left-0 w-full h-full" style="border:0;"
                  allow="autoplay; encrypted-media" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div> <!-- end movie info -->

<div class="movie-cast border-b border-gray-800">
  <div class="container mx-auto px-4 py-16">
    <h2 class="text-4xl text-semibold">Cast</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

      @foreach($movie['credits']['cast'] as $cast)
      @if($loop->index < 5) <div class="mt-8">
        <div>
          @if($cast['profile_path'])
          <img src="{{ "https://images.tmdb.org/t/p/w500" . $cast['profile_path'] }}" alt="{{ $cast['name'] }}"
            class="hover:opacity-75 transition ease-in-out duration-150">
          @else
          <img src="https://via.placeholder.com/50x75" alt="poster" class="w-64">
          @endif
        </div>
        <div class=" mt-2">
          <div class="text-lg hover:text-gray-300 mt-2">{{ $cast['name'] }}</div>
          <div class="text-gray-400 text-sm">
            {{ $cast['character'] }}
          </div>
        </div>
    </div>
    @endif
    @endforeach

  </div>
</div>


<div class="movie-images" x-data="{ isOpen: false, image: '' }">
  <div class="container mx-auto px-4 py-16">
    <h2 class="text-4xl text-semibold">Images</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      @foreach ($movie['images']['backdrops'] as $image)
      @if($loop->index < 9) <div class="mt-8">
        <div>
          @if($image['file_path'])
          <a @click.prevent=" isOpen = true, image = '{{ "https://images.tmdb.org/t/p/original" . $image['file_path'] }}' "
            href="#">
            <img src="{{ "https://images.tmdb.org/t/p/w500" . $image['file_path'] }}" alt="backdrop_image"
              class="hover:opacity-75 transition ease-in-out duration-150"></a>
          @else
          <img src="https://via.placeholder.com/50x75" alt="poster">
          @endif
        </div>
    </div>
    @endif
    @endforeach
  </div>

  <div class="fixed top-0 left-0 h-full w-full flex items-center shadow-lg overflow-y-auto"
    style="background-color: rgba(0,0,0,.5);" x-show.transition.opacity="isOpen">
    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
      <div class="bg-gray-900 rounded">
        <div class="flex justify-end pr-4 pt-2">
          <button @click="isOpen = false" @keydown.escape.window="isOpen = false"
            class="text-3xl leading-none hover:text-gray-300">&times;</button>
        </div>
        <div class="modal-body px-8 py-8">
          <img :src="image" alt="poster">
        </div>
      </div>
    </div>
  </div>

</div>
@endsection