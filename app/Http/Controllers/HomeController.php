<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Video;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize = env('VIDEO_DISPLAY_PAGE_SIZE');
        
        $videos = Video::paginate($pageSize);

        return view('home', compact('videos'));
    }
}
