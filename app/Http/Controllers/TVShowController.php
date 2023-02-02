<?php

namespace App\Http\Controllers;

use App\Http\Resources\TVShowCollection;
use App\Models\TVShow;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
class TVShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = TVShow::all();
        return new TVShowCollection($shows);
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
            "name" => 'bail|required|string|max:255',
            "description" => 'bail|required|string',
            "duration"=>'bail|required',
            "studio_id"=>'bail|required',
            "presenter_id"=>'required'
        ]);

        if ($validator->fails())
        //return response()->json($request);
            return response()->json($validator->errors());

        $tvs = TVShow::create([
            'name' => $request->name,
            'description'=>$request->description,
            'duration'=>$request->duration,
            'created_at'=>now(),
            'updated_at'=>now(),
            'studio_id'=>$request->studio_id,
            'presenter_id'=>$request->presenter_id
            
           
        ]);
        $tvs->save();


        return response()->json(['TV show is created successfully.', $tvs]);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TVShow  $tVShow
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tvs = TVShow::find($id);
        if (is_null($tvs))
            return response()->json('TV show not found', 404);
        return response()->json($tvs);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TVShow  $tVShow
     * @return \Illuminate\Http\Response
     */
    public function edit(TVShow $tVShow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TVShow  $tVShow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "name" => 'bail|required|string|max:255',
            "description" => 'bail|required|string',
            "duration"=>'bail|required',
            "studio_id"=>'bail|required',
            "presenter_id"=>'required'
        ]);

        if ($validator->fails())
             return response()->json($validator->errors());
        $show=TVShow::find($id);
        //update it
        $show->update($request->all());
        //return it
        return $show;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TVShow  $tVShow
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TVShow::destroy($id);
    }

    public function search($name)
    {
        return TVShow::where('name', 'like', '%'.$name.'%')->get();
    }
}
