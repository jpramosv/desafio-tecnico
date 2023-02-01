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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 50)-> nullable();
            $table->string('email', 50)-> nullable();
            $table->string('contato', 50)-> nullable();
            $table->string('senha', 50)-> nullable();
            $table->string('doc', 50)-> unique();
            $table->char('tipo', 1)-> nullable();
            $table->boolean('status')->nullable();
            $table->char('uf', 2)-> nullable();
            $table->string('cidade', 50)-> nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
};
