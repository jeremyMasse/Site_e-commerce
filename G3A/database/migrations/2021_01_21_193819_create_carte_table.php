<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carte', function (Blueprint $table) {
            $table->id('carte');
            $table->string("nom", 30);
            $table->string("prenom", 30);
            $table->integer("numero");
            $table->date("date");
            $table->integer("crypto");
            $table->foreignId("id_user");
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
        Schema::dropIfExists('carte');
    }
}
