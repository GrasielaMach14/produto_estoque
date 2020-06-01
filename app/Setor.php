<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'setores';
    public $timestamps = false;
    protected $fillable = ['nome'];

    public function funcionarios()
    {
        return $this->hasMany(Funcionario::class);
    }
}
