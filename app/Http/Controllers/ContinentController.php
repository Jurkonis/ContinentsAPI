<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class ContinentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'date',
            'value' => 'regex:/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }


        if($request->date != null && $request->search != null){
            $value = $request->search;
            $continents = Continent::where('created_at', '>', $request->date)
            ->search($request->search);
        }else if($request->date != null){
            $continents = Continent::where('created_at', '>', $request->date);
        }else if($request->search != null){
            $value = $request->search;
            $continents = Continent::search($request->search);
        }else{
            $continents = Continent::all();
        }
        
        return response()->json([
            'continents' => $continents,
        ], 200);
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Continent  $continent
     * @return \Illuminate\Http\Response
     */
    public function show(Continent $continent)
    {
        return response()->json([
            'continent' => $continent,
        ], 200);
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
            'name' => [
                'required',
                'regex:/^[A-Za-z _]*[A-Za-z][A-Za-z _]*$/',
                Rule::unique('continents'),
            ],
            'area' => 'required|integer',
            'population' => 'required|integer',
            'density' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $continent = Continent::create(array_merge(
            $validator->validated(),
        ));

        return response()->json([
            'message' => 'Continent successfully created',
            'continent' => $continent,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Continent  $continent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Continent $continent)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'regex:/^[A-Za-z _]*[A-Za-z][A-Za-z _]*$/',
                Rule::unique('continents')->ignore($continent->id),
            ],
            'area' => 'required|integer',
            'population' => 'required|integer',
            'density' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $continent->update(array_merge(
            $validator->validated(),
        ));

        return response()->json([
            'message' => 'Continent successfully updated',
            'continent' => $continent,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Continent  $continent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Continent $continent)
    {
        $continent->delete();

        return response()->json([
            'message' => 'Continent successfully deleted'
        ], 200);
    }
}
