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
        Schema::create('titulos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('desc', 50);
            $table->float('valor', 8, 2);
            $table->string('obs', 50)-> nullable();
            $table->date('data_venc')-> nullable();
            $table->date('data_pag_rec')-> nullable();
            $table->string('form_pag', 50);
            $table->string('tipo_pag', 50);
            $table->char('movim', 1);
            $table->char('status', 1);           
            
        });     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titulos');
    }
};
