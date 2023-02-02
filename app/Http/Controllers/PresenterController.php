<?php

namespace App\Http\Controllers;

use App\Http\Resources\PresenteCollection;
use App\Http\Resources\PresenterCollection;
use App\Models\Presenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PresenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Presenter::all();
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
            "firstname" => 'required|string|max:255',
            "email"=>'required|string|max:40|unique:presenters',
            "dateOfBirth"=>'required|string|max:15',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $presenter = Presenter::create([
            'firstname' => $request->firstname,
            'email'=> $request->email,
            'dateOfBirth'=>$request->dateOfBirth,
        ]);
        $presenter->save();
        return response()->json(['Presenter is created successfully.', $presenter]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presenter  $presenter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $pres = Presenter::find($id);
        if (is_null($pres))
            return response()->json('Data not found', 404);
        return response()->json($pres);

       // return new PresenterResource($pres);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presenter  $presenter
     * @return \Illuminate\Http\Response
     */
    public function edit(Presenter $presenter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presenter  $presenter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate inputs
        $validator = Validator::make($request->all(), [
            "firstname" => 'required|string|max:255',
            "email"=>'required|string|max:40|unique:presenters',
            "dateOfBirth"=>'required|string|max:15',
            
        ]);

        if ($validator->fails())
     
            return response()->json($validator->errors());

        
        $presenter=Presenter::find($id);
        //update it
        $presenter->update($request->all());
        //return it
        return response()->json([
            "Presenter is successfully updated!"
          , $presenter]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presenter  $presenter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presenter = Presenter::find($id);
        
        if($presenter){
            $presenter->delete();
            return response()->json(["Presenter is deleted.", $presenter]);
        }
        else{
            return response()->json(['Error!!!']);
        }
    }
}
