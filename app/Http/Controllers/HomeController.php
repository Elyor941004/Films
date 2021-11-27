<?php

namespace App\Http\Controllers;

use App\Models\Films;
use App\Models\Janr;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function main()
    {
        $model = Films::all();
        $janrs = Janr::all();
        return view('index',['models'=>$model, 'janrs'=>$janrs]);
    }
}
