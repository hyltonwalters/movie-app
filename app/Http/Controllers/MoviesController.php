<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $popularMovies = Http::withToken(config('services.tmdb.token'))
      ->get('http://api.themoviedb.org/3/movie/popular')
      ->json()['results'];

    $now_playingMovies = Http::withToken(config('services.tmdb.token'))
      ->get('http://api.themoviedb.org/3/movie/now_playing')
      ->json()['results'];

    $genresArray = Http::withToken(config('services.tmdb.token'))
      ->get('http://api.themoviedb.org/3/genre/movie/list')
      ->json()['genres'];

    $genres = collect($genresArray)->mapWithKeys(function ($genre) {
      return [$genre['id'] => $genre['name']];
    });

    // dump($now_playingMovies);

    return view('index', [
      'popularMovies' => $popularMovies,
      'genres' => $genres,
      'now_playingMovies' => $now_playingMovies,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $movie = Http::withToken(config('services.tmdb.token'))
      ->get('http://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,videos,images')
      ->json();

    $genresArray = Http::withToken(config('services.tmdb.token'))
      ->get('http://api.themoviedb.org/3/genre/movie/list')
      ->json()['genres'];

    $genres = collect($genresArray)->mapWithKeys(function ($genre) {
      return [$genre['id'] => $genre['name']];
    });

    // dump($movie);

    return view('show', [
      'movie' => $movie,
      'genres' => $genres,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
