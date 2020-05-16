<?php

namespace App;

use App\Funcionario;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];

    public function funcionarios()
    {
        $this->hasMany(Funcionario::class);
    }
}
