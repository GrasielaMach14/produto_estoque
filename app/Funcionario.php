<?php

namespace App;

use App\Sector;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome', 'cpf', 'sector_id'];

    public function setor()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}
