<?php

namespace App\Http\Controllers;

use App\Http\Resources\Premio\PremioResource;
use App\Http\Services\PremioService;
use App\Http\Services\UserService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PremioController extends Controller
{   
    use ApiResponse;

    public function __construct(
        private readonly UserService $userService,
        private readonly PremioService $premioService,
    ) {}

    // API Responses

    public function getPremios(Request $request)
    {

        $user = $request->user();

        $premios = $this->premioService->getPremios($user->line_id);

        $premios = PremioResource::collection($premios);

        return $this->successResponse($premios);

    }

    // Funciones para la web

    public function verTablaPremios()
    {
        
        $id_pais = Auth::user()->pais_id;

        $premios = DB::select(
            "SELECT 
                * 
            FROM 
                premios 
            WHERE 
                pais_id = $id_pais"
        );

        return view('modulos.tabla-premios', [
            'premios' => $premios
        ]);

    }

}
