<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $team_id = $request->query('team');

        if($team_id != null)
        {
            $players = Player::where('team_id', $team_id)->get();
        }
        else
        {
            $players = Player::all();
        }

        return response()->json($players);
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
        $player = new Player();
        $player->name = $request->name;
        $player->lastname = $request->lastname;
        $player->position = $request->position;
        $player->document_id = $request->document_id;
        $player->height = $request->height;
        $player->weight = $request->weight;
        $player->country = $request->country;
        $player->team_id = $request->team_id;
        $player->picture = $request->picture;
        $player->save();

        return response()->json([
            'message' => 'Player added'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::find($id);
        if(!empty($player))
        {
            return response()->json($player);
        }
        else
        {
            return response()->json([
                "message" => "Player not found"
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        if(Player::where('id', $request->id)->exists())
        {
            $player = Player::find($request->id);
            $player->name = $request->name;
            $player->lastname = $request->lastname;
            $player->position = $request->position;
            $player->document_id = $request->document_id;
            $player->height = $request->height;
            $player->weight = $request->weight;
            $player->country = $request->country;
            $player->team_id = $request->team_id;
            $player->picture = $request->picture;
            $player->save();

            return response()->json([
                "message" => "Player updated"
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
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        if(Player::where('id', $id)->exists())
        {
            $player = Player::find($id);
            $player->delete();

            return response()->json([
                "message" => "Player deleted"
            ], 202);
        }
        else
        {
            return response()->json([
                "message" => "Player not found"
            ], 404);
        }
    }

    public function insertMany(Request $request)
    {
        Player::insert($request);
    }
}
