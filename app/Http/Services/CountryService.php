<?php

namespace App\Http\Services;

use App\Models\Country;

class CountryService {

    public function getCountries()
    {
        return Country::select('id', 'name', 'country_code', 'timezone', 'is_active')->get();
    }

    public function getCountry(string|int $id_pais)
    {   
        return Country::find($id_pais)->select('id', 'name', 'country_code', 'timezone', 'is_active');
    }

}