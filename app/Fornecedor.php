<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    public $timestamp = false;
    protected $fillable = ['nome', 'cnpj'];
}
