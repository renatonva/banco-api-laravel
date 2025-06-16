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
        Schema::create('transferencias', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('conta_origem_id');
            $table->uuid('conta_destino_id');
            $table->decimal('valor', 15, 2);
            $table->timestamps();
        
            $table->foreign('conta_origem_id')
                  ->references('id')->on('conta_bancarias')
                  ->onDelete('cascade');
        
            $table->foreign('conta_destino_id')
                  ->references('id')->on('conta_bancarias')
                  ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transferencias');
    }
};
