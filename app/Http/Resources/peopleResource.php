<?php

namespace App\Http\Resources;

use App\Models\people;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin people */
class peopleResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'companies_id' => $this->companies_id,

            'companies' => new companiesResource($this->whenLoaded('companies')),
        ];
    }
}
