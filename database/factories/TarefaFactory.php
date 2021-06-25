<?php

namespace Database\Factories;

use App\Models\Tarefa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Lorem;

class TarefaFactory extends Factory
{
   
    protected $model = Tarefa::class;

    
    public function definition()
    {
        return [
            'titulo' => Lorem::words(8, true), 
            'checked' => $this->faker->boolean,
        ];
    }
}
