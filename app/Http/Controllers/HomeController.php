<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;

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
        //$pages = Page::select('id','name','content','active')->orderBy('name')->paginate(10);
        $pages = Page::where('active','=',1)->orderBy('name')->paginate(25);
        return view('home',compact('pages'));
    }
}
