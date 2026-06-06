<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class productsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => [
                'en' => $this->name_en,
                'fr' => $this->name_fr,
            ],
            'description' => [
                'en' => $this->description_en,
                'fr' => $this->description_fr,
            ],
            'gtin'            => $this->gtin,
            'brand'           => $this->brand,
            'countryOfOrigin' => $this->country_of_origin,
            'weight' => [
                'gross' => (float) $this->gross_weight,
                'net'   => (float) $this->net_weight,
                'unit'  => $this->weight_unit,
            ],
            'company' => [
                'companyName'      => $this->company->name,
                'companyAddress'   => $this->company->address,
                'companyTelephone' => $this->company->telephone,
                'companyEmail'     => $this->company->email,
                'owner' => [
                    'name'         => $this->company->owner->name,
                    'mobileNumber' => $this->company->owner->mobile,
                    'email'        => $this->company->owner->email,
                ],
                'contact' => [
                    'name'         => $this->company->contact->name,
                    'mobileNumber' => $this->company->contact->mobile,
                    'email'        => $this->company->contact->email,
                ],
            ],
        ];
    }
}
