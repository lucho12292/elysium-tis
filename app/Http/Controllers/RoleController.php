<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return response()->json($roles);
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
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        return response()->json([
            "message" => "Role Added."
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
        $role = Role::find($id);
        if(!empty($role))
        {
            return response()->json($role);
        }
        else
        {
            return response()->json([
                "message" => "Role not found"
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
        if(Role::where('id', $id)->exists())
        {
            $role = Role::find($id);
            $role->name = is_null($request->name) ? $role->name : $request->name;            
            $role->save();
            return response()->json([
                "message" => "Role updated"
            ], 200);
        }
        else
        {
            return response()->json([
                "message" => "Role Not found"
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
        if(Role::where('id', $id)->exists())
        {
            $role = Role::find($id);
            $role->delete();

            return response()->json([
                "message" => "Role deleted"
            ], 202);
        }
        else
        {
            return response()->json([
                "message" => "Role not found"
            ], 404);
        }
    }
}
