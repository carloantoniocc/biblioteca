<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkspaceRequest;
use App\Http\Requests\UpdateWorkspaceRequest;
use App\Models\Workspace;

class WorkspaceController extends Controller
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
        $workspaces = Workspace::select('id','name','active')->orderBy('name')->paginate(10);
        return view('workspaces.index',compact('workspaces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('workspaces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkspaceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkspaceRequest $request)
    {
        //dd('aqui');
        $workspace = new Workspace;
				
        $workspace->name   = $request->input('name');
        $workspace->active = $request->input('active');
    
        $workspace->save();			
        
        return redirect('/workspaces')->with('message','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workspace  $workspace
     * @return \Illuminate\Http\Response
     */
    public function show(Workspace $workspace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workspace  $workspace
     * @return \Illuminate\Http\Response
     */
    public function edit(Workspace $workspace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkspaceRequest  $request
     * @param  \App\Models\Workspace  $workspace
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkspaceRequest $request, Workspace $workspace)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workspace  $workspace
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workspace $workspace)
    {
        //
    }


}
