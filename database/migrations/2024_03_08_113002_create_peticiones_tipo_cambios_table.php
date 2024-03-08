<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeticionesTipoCambiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peticiones_tipo_cambios', function (Blueprint $table) {
            $table->id();
            $table->integer("numero_peticion");
            $table->date("fecha_peticion");
            $table->decimal("tc_compra",6,5);
            $table->decimal("tc_venta",6,5);
            $table->integer("moneda_id")->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peticiones_tipo_cambios');
    }
}
