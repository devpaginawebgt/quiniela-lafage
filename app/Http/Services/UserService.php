<?php

namespace App\Http\Services;

use App\Http\Requests\Auth\ApiLoginRequest;
use App\Models\Country;
use App\Models\EquipoPartido;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService {

    public function getUsers()
    {

        $participantes = User::where('status_user', 1)->get();

        return $participantes;

    }

    public function getUser(int $userId)
    {
        return User::find($userId);
    }

    public function getLoginDependiente($request)
    {
        return User::select('id', 'email', 'password', 'nombres', 'apellidos', 'pais_id', 'numero_documento', 'line_id', 'puntos', 'status_user', 'created_at')
            ->where('numero_documento', $request->input('identity'))
            ->where('user_type_id', $request->input('user_type_id'))
            ->first();
    }

    public function getLoginDoctor($request)
    {
        return User::select('id', 'email', 'password', 'nombres', 'apellidos', 'pais_id', 'numero_documento', 'line_id', 'puntos', 'status_user', 'created_at')
            ->where('colegiado', $request->input('identity'))
            ->where('user_type_id', $request->input('user_type_id'))
            ->first();
    }

    public function getRanking($line_id)
    {
        $participantes = User::select('id', 'nombres', 'apellidos', 'pais_id', 'numero_documento', 'email', 'puntos', 'created_at')
            ->selectRaw('RANK() OVER (ORDER BY puntos DESC, nombres ASC) as posicion')
            ->where('line_id', $line_id)
            ->has('predictions')
            ->where('puntos', '>', 0)
            ->where('status_user', 1)
            ->get();

        return $participantes;

    }

    public function getUserRank($user)
    {
        $rankingQuery = User::select('id', 'nombres', 'apellidos', 'pais_id', 'line_id', 'puntos', 'created_at')
            ->selectRaw('RANK() OVER (ORDER BY puntos DESC, nombres ASC) as posicion')
            ->where('line_id', $user->line_id)
            ->has('predictions')
            ->where('status_user', 1)
            ->where('puntos', '>', 0);
        
        $rank = DB::query()
            ->fromSub($rankingQuery, 'ranking')
            ->where('id', $user->id)
            ->value('posicion');

        $user->posicion = $rank;



        return $user;
    }

    public function getUserPredictionsCount($user)
    {
        $partidos_existentes = EquipoPartido::whereHas('partido')->count();

        $predicciones_realizadas = $user->predictions->count();

        $predicciones_pendientes = $partidos_existentes - $predicciones_realizadas;

        $partidos = [
            'total_partidos' => $partidos_existentes,
            'predicciones' => $predicciones_realizadas,
            'predicciones_pendientes' => $predicciones_pendientes
        ];

        $user->partidos = (object) $partidos;

        return $user;
    }

}