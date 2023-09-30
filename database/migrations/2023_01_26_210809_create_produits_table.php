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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->String('nom');
            $table->String('img');
            $table->String('descr')->nullable();
            $table->Integer('prix');
            $table->String('categorie');
            $table->String('type');
             $table->String('couleur')->nullable();  
            $table->String('taille')->nullable();  
            $table->integer('quantite')->default(1); 
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
};
