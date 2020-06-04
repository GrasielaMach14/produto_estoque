<?php

namespace App;

use App\Estoque;
use App\Entrada;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    public $timestamp = false;
    protected $fillable = ['nome', 'cnpj'];
    
    public function estoques()
    {
        return $this->hasMany(Estoque::class);
    }

    public function entrada()
    {
        return $this->hasMany(Entrada::class);
    }
}
