<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'fakeName' => $this->name,
            'fakeDescription' => $this->description,
            'fakePrice' => $this->price,
            'currency' =>  $this->currency->currency

        ];
    }
}
