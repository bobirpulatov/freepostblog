<?php

namespace App\Custom;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
  protected $fillable = [
    'title', 'description', 'image'
  ];
}
