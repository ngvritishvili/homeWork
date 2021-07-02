<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\CurrencyList;
use App\Models\Product;
use App\MyClasses\CheckCurrency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{

    public function __constructor()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {

        return ProductResource::collection(Product::all());

//        $products = Product::with('currency')->get();
//        return view('products.all.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        $curList = CurrencyList::all();

        return view('products.all.create', compact('curList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {


        $this->validate($request, [
            'FakeName' => 'required|max:255',
            'FakeDescription' => 'required|max:255',
            'price' => 'required|max:1111125|numeric',
            'currency' => 'required|max:7',
        ]);


        $bool = CheckCurrency::isTrue($request->currency);

        if ($bool)
        {
            $curr_id = CurrencyList::where('currency', $request->currency)->first();



            $product = new Product();
            $product->name = $request->FakeName;
            $product->description = $request->FakeDescription;
            $product->price = $request->price;
            $product->currency_id = $curr_id->id;

            $product->save();

            return response([
                'data' => new ProductResource($product)
            ]);

        }

        return response([
            'data' => "No such currency registered"
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return ProductResource::collection(Product::where('id', $product->id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $product->update($request->all());

        return response([
            'data' => new ProductResource($product)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::where('id', $product->id)->delete();
    }
}
