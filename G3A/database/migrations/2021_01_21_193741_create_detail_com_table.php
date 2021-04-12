<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailComTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_com', function (Blueprint $table) {
            $table->foreignId("id_produit");
            $table->foreignId("num_commande", 20);
            $table->integer("quantité")->DEFAULT(1);
            $table->integer("prix_total");
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
        Schema::dropIfExists('detail_com');
    }
}
