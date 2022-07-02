<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlayerStats;

class PlayerStatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $player_id = $request->query('player_id');

        if(PlayerStats::where('player_id', $player_id)->exists())
        {
            $playerStats = PlayerStats::where('player_id', $player_id)->get();
        }
        else
        {
            return response()->json([
                "message" => "Player stats not found"
            ], 404);
        }

        return response()->json($playerStats, 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($player_id)
    {
        $playerStats = PlayerStats::find($player_id);
        if(!empty($playerStats))
        {
            return response()->json($playerStats);
        }
        else
        {
            return response()->json([
                "message" => "Stats not found for player"
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
        if(PlayerStats::where('id', $id)->exists())
        {
            $playerStats = PlayerStats::find($id);
            $playerStats->playedMatches = $player -> playedMatches + $request->playedMatches;
            $playerStats->points = $player -> points + $request->points;
            $playerStats->rebounds = $player -> rebounds + $request->rebounds;
            $playerStats->assists = $player -> assists + $request->assists;
            $playerStats->steals = $player -> steals + $request->steals;
            $playerStats->fouls = $player -> fouls + $request->fouls;
            $playerStats->save();

            return response()->json([
                "message" => "Player Stats updated"
            ], 200);
        }
        else
        {
            return response()->json([
                "message" => "Player Not found"
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
        //
    }
}
