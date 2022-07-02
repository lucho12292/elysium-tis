<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        $delegate_id = $request->query('delegate');
        
        if($delegate_id != null)
        {
            $teams = Team::where('delegate_id', $delegate_id)->get();            
        }
        else
        {
            $teams = Team::all();
        }

        return response()->json($teams);
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
        $team = new Team();
        $team->name = $request->name;
        $team->country = $request->country;
        $team->enabled = $request->enabled;
        $team->category_id = $request->category_id;
        $team->delegate_id = $request->delegate_id;
        $team->save();

        return response()->json([
            "message" => "Team Added."
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        if(!empty($team))
        {
            return response()->json($team);
        }
        else
        {
            return response()->json([
                "message" => "Team not found"
            ], 404);
        }
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
        if(Team::where('id', $id)->exists())
        {
            $team = Team::find($id);            
            $team->name = $request->name;
            $team->country = $request->country;
            $team->enabled = $request->enabled;
            $team->category_id = $request->category_id;
            $team->delegate_id = $request->delegate_id;
            $team->save();
            
            return response()->json([
                "message" => "Team updated"
            ], 200);
        }
        else
        {
            return response()->json([
                "message" => "Team Not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Team::where('id', $id)->exists())
        {
            $team = Team::find($id);
            $team->delete();

            return response()->json([
                "message" => "Team deleted"
            ], 202);
        }
        else
        {
            return response()->json([
                "message" => "Team not found"
            ], 404);
        }
    }
}
