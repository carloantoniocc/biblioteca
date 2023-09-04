<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use App\Models\Workspace;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
         
     }   


    public function index()
    {
        $pages = Page::select('id','name','content','active')->orderBy('name')->paginate(10);
        return view('pages.index',compact('pages'));
    }

    public function create()
    {
        $workspaces = Workspace::where('active','=',1)->orderBy('name')->get();
    	return view('pages.create',compact('workspaces'));

    }

    public function store(StorePageRequest $request)
    {
    
        $page = new Page;
				
        $page->name   = $request->input('name');
        $page->content   = $request->input('content');
        $page->workspace_id = $request->input('workspace');
        $page->active = $request->input('active');
    
        $page->save();			
        
        return redirect('/page')->with('message','store');

    }


    public function show(Page $page)
    {
        dd("show");
    }


    public function edit(Page $page)
    {
        	$page = Page::find($page->id);
            $workspaces = Workspace::where('active','=',1)->orderBy('name')->get();
			return view('pages.edit',compact('page','workspaces'));
    }


    public function update(UpdatePageRequest $request, Page $page)
    {

        $page->name = $request->name;
        $page->content = $request->content;
        $page->active = $request->active;
        $page->save();
        return redirect('/home');
    }


    public function destroy(Page $page)
    {
        dd("destroy");
    }
}
