<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tournament_id = $request->query('tournament');
        if(Registration::where('tournament_id', $tournament_id)->exists())
        {
            $registrations = Registration::with('team')->where('tournament_id', $tournament_id)->get();            
        }
        else
        {
            return response()->json([
                "message" => "Registrations not found for this tournament"
            ], 404);
        }

        return response()->json($registrations);
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
        $registration = new Registration();
        $registration->status = $request->status; 
        $registration->tournament_id = $request->tournament_id;
        $registration->team_id = $request->team_id;
        $registration->save();

        return response()->json([
            'message' => 'Registration added',
            'registration' => $registration
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        if(Registration::where(['tournament_id', $tournament_id, 'team_id', $team_id])->exists())
        {
            $registration = Registration::where(['tournament_id', $tournament_id, 'team_id', $team_id])->first();
            $registration->status = $request->status; 
            $registration->save();
            
            return response()->json([
                "message" => "Registration updated"
            ], 200);
        }
        else
        {
            return response()->json([
                "message" => "Registration Not found"
            ], 404);
        }    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Registration::where('id', $id)->exists())
        {
            $registration= Registration::find($id);
            $registration->status = $request->status; 
            $registration->save();
            
            return response()->json([
                "message" => "Registration updated"
            ], 200);
        }
        else
        {
            return response()->json([
                "message" => "Registration Not found"
            ], 404);
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        if(Registration::where(['tournament_id', $tournament_id, 'team_id', $team_id])->exists())
        {
            $registration = $registration = Registration::where(['tournament_id', $tournament_id, 'team_id', $team_id])->first();;
            $registration->delete();

            return response()->json([
                "message" => "Registration deleted"
            ], 202);
        }
        else
        {
            return response()->json([
                "message" => "Registration not found"
            ], 404);
        }
    }
}
