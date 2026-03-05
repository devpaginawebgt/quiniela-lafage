<?php

namespace App\Http\Controllers;

use App\Http\Resources\Line\LineRankingResource;
use App\Http\Resources\User\UserRankingResource;
use App\Http\Resources\User\UserRankResource;
use App\Http\Resources\User\UserResource;
use App\Http\Services\LineService;
use App\Http\Services\UserService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use ApiResponse;

    public function __construct(
        private readonly UserService $userService,
        private readonly LineService $lineService,
    ) {}

    // API responses

    public function getUsers()
    {

        $participantes = $this->userService->getUsers();

        $participantes = UserResource::collection($participantes);

        return $this->successResponse($participantes);

    }
    
    public function getUser(Request $request)
    {
        $user = $request->user();
        
        $user = $this->userService->getUserRank($user);

        $user = $this->userService->getUserPredictionsCount($user);

        $user = new UserRankResource($user);

        return $this->successResponse($user);

    }

    public function getUserRank(Request $request)
    {
        $user = $request->user();

        $user = $this->userService->getUserRank($user);

        $user = $this->userService->getUserPredictionsCount($user);

        $user = new UserRankResource($user);

        return $this->successResponse($user);

    }

    public function getRanking(Request $request)
    {
        $user = $request->user();

        $line_id = (int) $user->line_id;

        $line = $this->lineService->getLine($line_id);

        if (empty($line)) {

            $this->errorResponse('Ocurrió un error al identificar la línea del usuario', 500);

        }

        $line->participantes = $this->userService->getRanking($line_id);

        $line = new LineRankingResource($line);

        return $this->successResponse($line);

    }

    // Funciones para la web

    public function indexWeb() 
    {
        $user = Auth::user();

        $line_id = (int) $user->line_id;

        $participantes = $this->userService->getRanking($line_id);

        return view('modulos.tabla-resultados', [
            'participantes' => $participantes
        ]);

    }

    public function verParticipantes()
    {

        $participantes = $this->userService->getUsers();

        return view('modulos.participantes', [
            'participantes' => $participantes
        ]);

    }    
}
