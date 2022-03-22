<?php

namespace App\Http\Controllers;

use App\Models\Dev as Dev;
use App\Http\Resources\Dev as DevResource;
use Illuminate\Http\Request;

class DevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devs = Dev::paginate(100);
        return DevResource::collection($devs);
    }    

    public function show($id)
    {
        $dev = Dev::findOrFail($id);
        return new DevResource($dev);
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

        $dev = new Dev;
        $dev->name = $request->input('name');
        $dev->email = $request->input('email');
        $dev->age = $request->input('age');
        $dev->picture = $request->input('picture');
        $dev->programmingLanguages = $request->input('programmingLanguages');
        
        if($dev->save()) {
            return new DevResource($dev);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
        $dev = Dev::findOrFail($request->id);
        $dev->name = $request->input('name');
        $dev->email = $request->input('email');
        $dev->age = $request->input('age');
        $dev->picture = $request->input('picture');
        $dev->programmingLanguages = $request->input('programmingLanguages');
        
        if($dev->save()) {
            return new DevResource($dev);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $dev = Dev::findOrFail($request->id);
        if($dev->delete()) {
            return new DevResource($dev);
        }
    }
}
