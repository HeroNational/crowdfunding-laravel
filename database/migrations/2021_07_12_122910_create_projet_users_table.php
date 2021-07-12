<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('projet_user', function (Blueprint $table) {
        $table->id();
        $table->foreignId("user_id")->constrained()->cascadeOnDelete();
        $table->foreignId("projet_id")->constrained()->cascadeOnDelete();
        $table->string("message")->nullable();
        $table->integer("montant");
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
        Schema::dropIfExists('projet_users');
    }
}
