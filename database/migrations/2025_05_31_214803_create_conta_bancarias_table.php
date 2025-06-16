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
        Schema::create('conta_bancarias', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('titular');
            $table->string('cpf')->unique();
            $table->string('data_nascimento');
            $table->string('logradouro');
            $table->string('telefone');
            $table->string('email')->unique();
            $table->decimal('saldo', 15, 2)->default(0);
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
        Schema::dropIfExists('conta_bancarias');
    }
};
