<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Campos requeridos

            $table->string('nombres');
            $table->string('apellidos');
            $table->string('numero_documento');
            $table->string('email')->unique();
            $table->integer('puntos')->index()->default(0);
            $table->unsignedBigInteger('pais_id');
            $table->unsignedBigInteger('line_id');

            // Campos variables
            $table->string('colegiado')->nullable();

            // Otros campos 
            $table->unsignedBigInteger('user_type_id');
            $table->integer('status_user')->index()->default(1);

            $table->string('password');
            $table->timestamp('email_verified_at')->nullable()->unique();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_type_id')
                ->references('id')
                ->on('user_types')
                ->onUpdate('cascade')
                ->onDelete('restrict');
                
            $table->foreign('pais_id')
                ->references('id')
                ->on('countries')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('line_id')
                ->references('id')
                ->on('lines')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            // $table->unsignedBigInteger('codigo_id')->nullable();
            // $table->string('telefono');
            // $table->string('direccion');
            // $table->foreign('company_id')
            //     ->references('id')
            //     ->on('companies')
            //     ->onUpdate('cascade')
            //     ->onDelete('restrict');

            // $table->foreign('branch_id')
            //     ->references('id')
            //     ->on('branches')
            //     ->onUpdate('cascade')
            //     ->onDelete('restrict');

            // $table->foreign('codigo_id')
            //     ->references('id')
            //     ->on('codigos')
            //     ->onUpdate('cascade')
            //     ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}