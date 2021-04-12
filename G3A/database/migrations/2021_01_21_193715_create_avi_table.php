<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avi', function (Blueprint $table) {
            $table->id("id");
            $table->foreignId("id_produit");
            $table->foreignId("id_user");
            $table->string("description");
            $table->integer("note");
            $table->dateTime('date_avi')->default(\Carbon\Carbon::now());
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
        Schema::dropIfExists('avi');
    }
}
