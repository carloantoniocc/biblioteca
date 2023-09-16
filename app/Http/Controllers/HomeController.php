<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Workspace;
use Illuminate\Support\Facades\DB;

use Session;

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
    public function index(Request $request)
    {
        //$pages = Page::select('id','name','content','active')->orderBy('name')->paginate(10);
        //$pages = Page::where('active','=',1)->orderBy('name')->paginate(25);


        if(Session::get('message') == null) {
            Session::forget('searchTipo'); //Elimina la variable en session
            Session::put('searchTipo', $request->get('searchTipo'));
        }	



        $pages = DB::table('pages')
            ->where([
                ['pages.workspace_id','=',Session::get('searchTipo')],
                ['pages.active',1]
            ])
            ->orderByRaw('updated_at DESC')
            ->paginate(50);



        $workspaces = Workspace::where('active','=',1)->orderBy('name')->paginate(25);
        return view('home',compact('pages','workspaces'));
    }




}
