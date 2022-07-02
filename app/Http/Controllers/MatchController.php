<?php

namespace App\Http\Controllers;

use App\Models\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = Match::all();
        if ($matches != null) {
            return response()->json($matches);
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
        $match = new Match();
        $match->name = $request->name;
        $match->winner = $request->winner;
        $match->date = $request->date;
        $match->score1 = $request->score1;
        $match->score2 = $request->score2;
        $match->team_id_one = $request->team_id_one;
        $match->team_id_two = $request->team_id_two;
    
        $match->save();

        return response()->json($match);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Request::where('id', $id)->exists())
        {
            $match = Request::find($id);            
            $match->name = $request->name;
            $match->winner = $request->winner;
            $match->date = $request->date;
            $match->score1 = $request->score1;
            $match->score2 = $request->score2;
            $match->team_id_one = $request->team_id_one;
            $match->team_id_two = $request->team_id_two;
           
            $match->save();
            
            return response()->json($match);
        }
        else
        {
            return response()->json([
                "message" => "Match Not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        if(Match::where('id', $id)->exists())
        {
            $match = Match::find($id);
            $match->delete();

            return response()->json([
                "message" => "Match deleted"
            ], 202);
        }
        else
        {
            return response()->json([
                "message" => "Match not found"
            ], 404);
        }
    }
}
