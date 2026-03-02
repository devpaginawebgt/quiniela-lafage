<?php

namespace App\Http\Controllers;

use App\Http\Resources\Country\CountryResource;
use App\Http\Services\CountryService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    use ApiResponse;

    public function __construct(
        private readonly CountryService $countryService,
    ) {}

    public function index(Request $request)
    {   
        $countries = $this->countryService->getCountries();

        return CountryResource::collection($countries);
    }
}
