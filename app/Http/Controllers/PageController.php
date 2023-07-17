<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;


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

    	return view('pages.create');

    }

    public function store(StorePageRequest $request)
    {
    
        $page = new Page;
				
        $page->name   = $request->input('name');
        $page->content   = $request->input('content');
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
            //dd($page);
        	$page = Page::find($page->id);
			return view('pages.edit',compact('page'));
		
    }


    public function update(UpdatePageRequest $request, Page $page)
    {
        dd("update");
    }


    public function destroy(Page $page)
    {
        dd("destroy");
    }
}
