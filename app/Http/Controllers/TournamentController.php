<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = Tournament::all();
        if ($tournaments != null) {
            return response()->json($tournaments);
        }
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
        $tournament = new Tournament();
        $tournament->name = $request->name;
        $tournament->country = $request->country;
        $tournament->startDate = $request->startDate;
        $tournament->endDate = $request->endDate;
        $tournament->category_id = $request->category_id;
    
        $tournament->save();

        return response()->json($tournament);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Tournament::where('id', $id)->exists())
        {
            $tournament = Tournament::find($id);            
            $tournament->name = $request->name;
            $tournament->country = $request->country;
            $tournament->startDate = $request->startDate;
            $tournament->endDate = $request->endDate;
            $tournament->category_id = $request->category_id;
            $tournament->save();
            
            return response()->json($tournament);
        }
        else
        {
            return response()->json([
                "message" => "Tournament Not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Tournament::where('id', $id)->exists())
        {
            $tournament = Tournament::find($id);
            $tournament->delete();

            return response()->json([
                "message" => "Tournament deleted"
            ], 202);
        }
        else
        {
            return response()->json([
                "message" => "Tournament not found"
            ], 404);
        }
    }
}
