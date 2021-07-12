<?php

namespace Database\Factories;

use App\Models\Projet;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Projet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            "user_id"=>mt_rand(1,10),
            "categorie_id"=>mt_rand(1,3),
            "nom"=>$this->faker->company(),
            "slogan"=>$this->faker->sentence(5),
            "objectif"=>mt_rand(10000,1000000),
            "duree"=>$this->faker->dateTimeBetween('now', '+10 years'),
            "etat"=>mt_rand(0,1),
            "description"=>$this->faker->realText(),
            "created_at"=>$this->faker->dateTimeBetween('-3 years', '+10 years'),
            "updated_at"=>now(),
        ];
    }
}
