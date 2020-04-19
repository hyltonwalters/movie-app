<div class="relative mt-2 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
  <input wire:model.debounce.500ms="search" type="text"
    class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 text-sm focus:outline-none focus:shadow-outline"
    placeholder="Search (Press / to focus)" x-ref="search"
    @keydown.window="if (event.keyCode === 191) {event.preventDefault(); $refs.search.focus();}" @focus="isOpen = true"
    @keydown="isOpen = true" @keydown.escape.window="isOpen = false" @keydown.shift.tab="isOpen = false">
  <div class="absolute top-0">
    <svg class="fill-current text-gray-500 w-4 mt-2 ml-2" viewbox="0 0 30 30">
      <g stroke-linecap="square" stroke-width="2" fill="none" stroke="#AEDBF0" stroke-miterlimit="10">
        <path d="M22 22l-5.6-5.6" />
        <circle cx="10" cy="10" r="9" />
      </g>
    </svg>
  </div>

  <div wire:loading class="spinner top-0 right-0 mr-4" style="margin-top:15px;"></div>

  @if ( strlen($search) >= 2 )
  <div class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4" x-show.transition.opacity="isOpen">
    @if ( $searchResults->count() > 0 )
    <ul>
      @foreach ($searchResults as $result)
      <li class="border-b border-gray-700">
        <a href="{{ route('movies.show', $result['id']) }}" class="block hover:bg-gray-700 flex items-center px-3 py-3"
          @if($loop->last) @keydown.tab="isOpen = false" @endif>
          @if($result['poster_path'])
          <img src="https://images.tmdb.org/t/p/w92{{ $result['poster_path'] }}" alt="poster" class="w-10">
          @else
          <img src="https://via.placeholder.com/50x75" alt="poster" class="w-10">
          @endif
          <span class="ml-4 font-semibold">{{ $result['title'] }}
            <span
              class="text-xs font-semibold text-gray-500 block pt-1 ">{{ substr($result['release_date'], 0, 4) }}</span>
          </span>
        </a>
      </li>
      @endforeach
    </ul>
    @else
    <div class="px-3 py-3">No results for {{ $search }}</div>
    @endif
  </div>
  @endif
</div>