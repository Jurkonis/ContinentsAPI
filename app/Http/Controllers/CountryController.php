<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Continent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class CountryController extends Controller
{
     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Continent $continent)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'date',
            'search' => 'regex:/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        if($request->date !=null && $request->search !=null){
            $countries = Country::where('continent_id', $continent->id)
            ->where('created_at', '>', $request->date)
            ->search($request->search);
        }else if($request->date !=null){
            $countries = Country::where('continent_id', $continent->id)
            ->where('created_at', '>', $request->date);
        }else if($request->search !=null){
            $countries = Country::where('continent_id', $continent->id)
            ->search($request->search);
        }else{
            $countries = Country::where('continent_id', $continent->id);
        }

        return response()->json([
            'countries' => $countries->get(),
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Continent $continent, Country $country)
    {
        if($country->continent_id != $continent->id){
            return response()->json([
                'message' => 'Continent do not have that country!'
            ], 404);
        }

        return response()->json([
            'country' => $country,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Continent $continent)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'regex:/^[A-Za-z _]*[A-Za-z][A-Za-z _]*$/',
                Rule::unique('countries'),
            ],
            'area' => 'required|integer',
            'population' => 'required|integer',
            'phone_code' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $country = Country::create(array_merge(
            $validator->validated(),
            ['continent_id' => $continent->id],
        ));

        return response()->json([
            'message' => 'Country successfully created',
            'country' => $country,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Continent $continent, Country $country)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'regex:/^[A-Za-z _]*[A-Za-z][A-Za-z _]*$/',
                Rule::unique('countries')->ignore($country->id),
            ],
            'area' => 'required|integer',
            'population' => 'required|integer',
            'phone_code' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        if($country->continent_id != $continent->id){
            return response()->json([
                'message' => 'Continent do not have that country!'
            ], 404);
        }

        $country->update(array_merge(
            $validator->validated(),
        ));

        return response()->json([
            'message' => 'Country successfully updated',
            'country' => $country,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Continent $continent, Country $country)
    {
        if($country->continent_id != $continent->id){
            return response()->json([
                'message' => 'Continent do not have that country!'
            ], 404);
        }

        $country->delete();

        return response()->json([
            'message' => 'Country successfully deleted'
        ], 200);
    }
}
