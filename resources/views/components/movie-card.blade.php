<div>
  <div class="mt-8">
    <a href="{{ route('movies.show', $movie['id']) }}">
      @if($movie['poster_path'])
      <img src="{{ 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] }}" alt="{{ $movie['title'] }}"
        class="hover:opacity-75 transition ease-in-out duration-150">
      @else
      <img src="https://via.placeholder.com/50x75" alt="poster" class="w-10">
      @endif
    </a>
    <div class="mt-2">
      <a href="{{ route('movies.show', $movie['id']) }}"
        class="text-lg hover:text-gray-300 mt-2">{{ $movie['title'] }}</a>
      <div class="flex items-center text-gray-400 text-sm mt-1">
        <svg class="fill-current text-orange-500 w-4" viewBox="0 -10 511.99 511">
          <path
            d="M510.65 185.9a27.16 27.16 0 00-23.42-18.7l-147.78-13.43L281.02 17a27.22 27.22 0 00-50.05.03l-58.43 136.74-147.8 13.42a27.2 27.2 0 00-23.4 18.71 27.18 27.18 0 007.96 28.9L121 312.78 88.06 457.86a27.2 27.2 0 0010.58 28.1 27.1 27.1 0 0029.89 1.3L256 411.07l127.42 76.19a27.22 27.22 0 0040.5-29.4l-32.95-145.09 111.7-97.94a27.22 27.22 0 007.98-28.93zm0 0"
            fill="#ED8936" /></svg>
        </svg>
        <span class="ml-1">{{ $movie['vote_average'] * 10 }}%</span>
        <span class="mx-2">|</span>
        <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
      </div>
      <div class="text-gray-400 text-sm">
        @foreach ($movie['genre_ids'] as $genre)
        {{ $genres->get($genre) }}@if(!$loop->last), @endif
        @endforeach
      </div>
    </div>
  </div>
</div>