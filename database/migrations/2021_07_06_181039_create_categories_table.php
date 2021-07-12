<?php

use App\Models\Categorie;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("libelle");
            $table->timestamps();
        });
        Categorie::create(["libelle"=>"Scientifique"]);
        Categorie::create(["libelle"=>"Educatif"]);
        Categorie::create(["libelle"=>"Agricole"]);
        Categorie::create(["libelle"=>"Social"]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
