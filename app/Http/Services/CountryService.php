<?php

namespace App\Http\Services;

use App\Models\Country;

class CountryService {

    public function getCountries()
    {
        return Country::where('is_active', true)
            ->get();
    }

    public function getCountry(string|int $id_pais)
    {   
        return Country::find($id_pais);
    }

}