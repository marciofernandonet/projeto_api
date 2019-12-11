<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divida extends Model
{
    protected $table = "dividas";

    protected $fillable = [
        'devedores_id', 'desc_titulo', 'valor', 'data_vencimento'
    ];
}
