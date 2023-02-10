<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
  protected $table = 'pessoas';
  protected $fillable = ['nome', 'email','uf','cidade','contato','doc'];
}