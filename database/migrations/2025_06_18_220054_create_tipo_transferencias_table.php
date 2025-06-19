<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_transferencias', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('descricao');
            $table->enum('status', ['ATIVO', 'INATIVO', 'EXCLUIDO'])->default('ATIVO');
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
        Schema::dropIfExists('tipo_transferencias');
    }
};
