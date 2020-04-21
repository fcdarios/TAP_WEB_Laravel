<?php

namespace App\Http\Controllers;

use App\Work_Team;
use Freshbitsweb\Laratables\Laratables;

use Illuminate\Http\Request;

class WorkTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('business_casual/adm_about');
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $team =new Work_Team;
        $team->name = $request->name;
        $team->job = $request->job;
        $team->photo = $request->photo;
        $team->save();

        //return back()->with('success', 'Se ha agregado correctamente'); 
        return response()->json(['success'=>'Se ha agregado correctamente']);
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
    public function show()
    {
        return Laratables::recordsOf(Work_Team::class);
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
    public function update(Request $request)
    {
        $team = Work_Team::find($request->id);
        $team->name = $request->name;
        $team->job = $request->job;
        $team->photo = $request->photo;
        $team->save();

        //return back()->with('success', 'Se ha modificado correctamente'); 
        return response()->json(['success'=>'Se ha modificado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $team = Work_Team::find($request->id);
        $team->delete();
        //return back()->with('success', 'Se ha eliminado correctamente'); 
        return response()->json(['success'=>'Se ha eliminado correctamente']);
    }
}
