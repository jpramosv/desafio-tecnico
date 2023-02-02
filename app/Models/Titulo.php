<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
    {
    protected $table = 'titulos';
    protected $fillable = ['desc', 'valor','obs','data_venc','data_pag_rec','form_pag','tipo_pag','status','movim','categoria_id','pessoa_id'];
    }
