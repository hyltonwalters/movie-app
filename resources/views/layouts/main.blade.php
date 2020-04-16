<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie App</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  @livewireStyles
</head>

<body class="font-sans bg-gray-900 text-white ">

  <nav class="border-b border-gray-800">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
      <ul class="flex flex-col md:flex-row items-center">
        <li class="flex flex-col md:flex-row">
          <a class="flex" href="{{ route('movies.index') }}">
            <svg class="w-8 pb-2" x="0px" y="0px" viewBox="0 0 490 490"
              style="enable-background:new 0 0 497.407 497.407;" xml:space="preserve" fill="#fff">
              <path d="M355.581,158.864h-58.212c0-11.886-9.265-22.301-23.156-28.114l35.772-55.089c0.815,0.135,1.649,0.223,2.506,0.223
           c8.424,0,15.252-6.829,15.252-15.252c0-8.423-6.828-15.251-15.252-15.251s-15.252,6.828-15.252,15.251
           c0,3.111,0.938,6.001,2.535,8.414l-37.711,58.076c-4.246-0.821-8.725-1.27-13.359-1.27s-9.113,0.449-13.359,1.27L167.523,22.678
           c1.47-2.293,2.333-5.012,2.333-7.938c0-8.14-6.6-14.74-14.74-14.74s-14.74,6.6-14.74,14.74c0,8.141,6.6,14.74,14.74,14.74
           c0.749,0,1.48-0.074,2.2-0.182l65.878,101.452c-13.893,5.813-23.156,16.228-23.156,28.114h-58.212
           c-56.217,0-101.789,45.572-101.789,101.789V372.62c0,47.421,32.428,87.267,76.318,98.574c-0.461,8.288-0.689,26.213,5.964,26.213
           c5.884,0,15.631-14.023,21.269-23h210.23c5.638,8.977,15.385,23,21.269,23c6.653,0,6.425-17.925,5.964-26.213
           c43.892-11.309,76.318-51.153,76.318-98.574V260.653C457.37,204.436,411.797,158.864,355.581,158.864z M334.818,414.945H109.332
           c-11.046,0-20-8.954-20-20v-156.49c0-11.046,8.954-20,20-20h225.486c11.046,0,20,8.954,20,20v156.49
           C354.818,405.991,345.864,414.945,334.818,414.945z M397.37,379.42c-13.07,0-23.667-10.596-23.667-23.667
           s10.597-23.667,23.667-23.667s23.667,10.596,23.667,23.667S410.44,379.42,397.37,379.42z M397.37,287.753
           c-13.07,0-23.667-10.596-23.667-23.667c0-13.07,10.597-23.667,23.667-23.667s23.667,10.597,23.667,23.667
           C421.037,277.157,410.44,287.753,397.37,287.753z" />
            </svg>
            <span class="text-xl text-white ml-2 mt-1">MovieApp</span>
          </a>
        </li>
        <li class="md:ml-16 mt-2 md:mt-0">
          <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
        </li>
        <li class="md:ml-6 mt-2 md:mt-0">
          <a href="#" class="hover:text-gray-300">TV Shows</a>
        </li>
        <li class="md:ml-6 mt-2 md:mt-0">
          <a href="#" class="hover:text-gray-300">Actors</a>
        </li>
      </ul>
      <div class="flex flex-col md:flex-row items-center">
        @livewire('search-dropdown')
        <div class="ml-4 mt-2 md:mt-0">
          <a href="#">
            <img src="{{ asset('img/avatar.jpg') }}" alt="avatar" class="rounded-full w-8 h-8">
          </a>
        </div>
      </div>
    </div>
  </nav>

  @yield('content')
  @livewireScripts
</body>

</html>