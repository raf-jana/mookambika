<?php

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
DB::listen(function ($query) {
    //dump($query->sql);
    //dump ( $query->bindings );
    // dump ( $query->time );
});
Route::middleware('requestLog:web')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/test', function() {

        $pages = \App\Models\Page::all();
        //dd($page->sections());
        //foreach ($pages as $page) {
        foreach ($pages as $page) {
            foreach ($page->sections as $section) {
                dump($section->pivot->section_title);
            }
        }
        //}
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index');
});
