<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'nombres'          =>  'Dennis',
                'apellidos'        =>  'PWG',
                'numero_documento' =>  '1234567891111',
                'email'            =>  'dev@paginawebguatemala.com',
                // 'codigo_id'        =>  1,
                // 'telefono'         =>  '63443212',
                // 'direccion'        =>  'Ciudad de Guatemala',
                'pais_id'          =>  1,
                'user_type_id'     =>  1,
                'line_id'          =>  1,
                'colegiado'        =>  null,
                'password'         =>  Hash::make('FScomunica2'),
                'created_at'       =>  (Carbon::now())->toDateTimeString(),
            ],
            [
                'nombres'          =>  'Dwight',
                'apellidos'        =>  'PWG',
                'numero_documento' =>  '1234567891112',
                'email'            =>  'app@paginawebguatemala.com',
                // 'codigo_id'        =>  2,
                // 'telefono'         =>  '63443212',
                // 'direccion'        =>  'Ciudad de Guatemala',
                'pais_id'          =>  1,
                'user_type_id'     =>  1,
                'line_id'          =>  1,
                'colegiado'        =>  null,
                'password'         =>  Hash::make('FScomunica2'),
                'created_at'       =>  (Carbon::now())->toDateTimeString(),
            ],
            [
                'nombres'          =>  'Revisor',
                'apellidos'        =>  'Google',
                'numero_documento' =>  '1234567891113',
                'email'            =>  'revisor@gmail.com',
                // 'codigo_id'        =>  13,
                // 'telefono'         =>  '39987867',
                // 'direccion'        =>  'Ciudad de Guatemala',
                'pais_id'          =>  1,
                'user_type_id'     =>  2,
                'line_id'          =>  2,
                'colegiado'        => '86334',
                'password'         =>  Hash::make('FScomunica2'),
                'created_at'       =>  (Carbon::now())->toDateTimeString(),
            ],
            [
                'nombres'          =>  'Revisor',
                'apellidos'        =>  'IOS',
                'numero_documento' =>  '1234567891114',
                'email'            =>  'revisorios@gmail.com    ',
                // 'codigo_id'        =>  14,
                // 'telefono'         =>  '83323462',
                // 'direccion'        =>  'Ciudad de Guatemala',
                'pais_id'          =>  1,
                'user_type_id'     =>  2,
                'line_id'          =>  2,
                'colegiado'        => '86335',
                'password'         =>  Hash::make('FScomunica2'),
                'created_at'       =>  (Carbon::now())->toDateTimeString(),
            ],
        ];

        DB::table('users')->insert($users);
    }
}
