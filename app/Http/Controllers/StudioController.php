<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Studio::all();
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
        
        $validator = Validator::make($request->all(), [
            "name" => 'required|string|max:255|unique:studios',
            "price"=>'required'
            
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        
        $studio = Studio::create([
            'name' => $request->$request->name,
            'price'=>$request->price
           
        ]);
        $studio->save();


        return response()->json(['Studio is created successfully.', $studio]);
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $st = Studio::find($id);
        if (is_null($st))
            return response()->json('Data not found', 404);
        return response()->json($st);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function edit(Studio $studio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'required|string|max:255|unique:studios',
            "price"=>'required'
            
        ]);

        if ($validator->fails())
     
            return response()->json($validator->errors());

        //get the studio
        $studio=Studio::find($id);
        //update it
        $studio->update($request->all());
        //return it
        return $studio;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studio = Studio::find($id);
        Studio::destroy($id);
        return response()->json(["Presenter is deleted.", $studio]);
    }
}
