<?php

namespace App\Http\Controllers;

use App\Http\Resources\CurrencyListResource;
use App\Models\CurrencyList;
use App\Models\Product;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{


    public function __constructor()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CurrencyList $currencyList)
    {
        return CurrencyListResource::collection(CurrencyList::all());

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

        $this->validate($request, [
            'currencyF' => 'required|max:10',
            'countryF' => 'max:255',
        ]);

        $curry = new CurrencyList();
        $curry->country = $request->countryF;
        $curry->currency = $request->currencyF;
        $curry->save();

        return response([
            'data' => new CurrencyListResource($curry)
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CurrencyList  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(CurrencyList $currency)
    {
        return CurrencyListResource::collection(CurrencyList::where('id', $currency->id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CurrencyList  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(CurrencyList $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CurrencyList  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CurrencyList $currency)
    {

        $currency->update($request->all());

        return response([
            'data' => $currency
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CurrencyList  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurrencyList $currency)
    {
        CurrencyList::where('id', $currency->id)->delete();
    }
}
