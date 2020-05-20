<?php

use App\Categoria;
use App\Produto;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Categoria::class, function (Faker $faker){
    return [
        'nome' => $this->$faker->sentence,       
    ];
});

$factory->define(Produto::class, function (Faker $faker){
    return [
        'nome' => $this->$faker->sentence,
        'descricao' => $this->$faker->paragraph,
        'modelo' => $this->$faker->sentence,
        'preco' => $this->$faker->numberBetween(1,50),
        'categoria_id' => 1,
       
    ];
});