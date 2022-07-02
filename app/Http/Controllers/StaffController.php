<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
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
            $staff = Staff::where('team_id', $team_id)->get();            
        }
        else
        {
            $staff = Staff::all();
        }

        return response()->json($staff);
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
        $staff = new Staff();
        $staff->name = $request->name; 
        $staff->lastname = $request->lastname;            
        $staff->role = $request->role;
        $staff->document_id = $request->document_id;
        $staff->team_id = $request->team_id;
        $staff->save();

        return response()->json([
            'message' => 'staff added'
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
        $staff = Staff::find($id);
        if(!empty($staff))
        {
            return response()->json($staff);
        }
        else
        {
            return response()->json([
                "message" => "Staff not found"
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
        if(Staff::where('id', $id)->exists())
        {
            $staff = Staff::find($id);
            $staff->name = $request->name; 
            $staff->lastname = $request->lastname;               
            $staff->document_id = $request->document_id;
            $staff->role = $currentStaff->role;
            $staff->team_id = $request->team_id;
            $staff->save();
            
            return response()->json([
                "message" => "Staff updated"
            ], 200);
        }
        else
        {
            return response()->json([
                "message" => "Staff Not found"
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
        if(Staff::where('id', $id)->exists())
        {
            $staff = Staff::find($id);
            $staff->delete();

            return response()->json([
                "message" => "Staff deleted"
            ], 202);
        }
        else
        {
            return response()->json([
                "message" => "Staff not found"
            ], 404);
        }
    }

    public function insertMany(Request $request)
    {
        Staff::insert($request);        
    }
}
