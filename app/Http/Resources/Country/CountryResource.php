<?php

namespace App\Http\Resources\Country;

use App\Http\Services\HelperService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'image'          => HelperService::ImagePath($this->image),
            'country_code'   => $this->country_code,
            'document_name'  => $this->document_name,
            'document_regex' => $this->document_regex,
            'area_code'      => $this->area_code,
        ];
    }
}
