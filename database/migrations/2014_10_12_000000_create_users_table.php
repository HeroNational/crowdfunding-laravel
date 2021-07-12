<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string('email')->unique();
            $table->string("prenom");
            $table->enum("sexe",['m',['f','t']]);
            $table->boolean("etat");
            $table->string("telephone")->default("0");
            $table->string("avatar")->default("avatar/default.png");
            $table->enum('role',["admin","autre"])->default("autre");
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        User::create([
            'nom' =>"admin",
            'prenom' =>"admin",
            'sexe' =>"t",
            'email' =>"admin@admin.admin",
            'avatar' =>"avatar/default.png",
            'role' =>"admin",
            "telephone"=>"1234",
            "created_at"=>now(),
            "etat"=>1,
            'password' => Hash::make("admin"),
      ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
