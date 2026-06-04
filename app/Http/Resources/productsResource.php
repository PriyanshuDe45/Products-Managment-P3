<?php

namespace App\Http\Resources;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin products */
class productsResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_fr' => $this->name_fr,
            'desc' => $this->desc,
            'desc_fr' => $this->desc_fr,
            'brand' => $this->brand,
            'country' => $this->country,
            'gross' => $this->gross,
            'net' => $this->net,
            'weight' => $this->weight,
            'gtin' => $this->gtin,
            'image_path' => $this->image_path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'companies_id' => $this->companies_id,

            'companies' => new companiesResource($this->whenLoaded('companies')),
        ];
    }
}
