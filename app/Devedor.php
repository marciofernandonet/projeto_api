<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devedor extends Model
{
    protected $table = "devedores";
    public $timestamps = false;

    protected $fillable = [
        'nome', 'cpf_cnpj', 'data_nascimento'
    ];
}
