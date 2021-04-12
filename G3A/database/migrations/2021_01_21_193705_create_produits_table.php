<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id("id");
            $table->string("nom", 40);
            $table->integer("code_activ");
            $table->decimal("prix", 6, 2);
            $table->string("description");
            $table->string("plateforme", 50);
            $table->string("categorie", 50);
            $table->integer("note");
            $table->integer("quantite");
            $table->string("photo", 100);
            $table->date("date_sortie");
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
        Schema::dropIfExists('produits');
    }
}
