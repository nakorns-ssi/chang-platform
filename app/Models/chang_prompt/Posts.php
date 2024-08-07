<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{ 
 protected $table = 'posts';
 public $timestamps = false;
 const CREATED_AT = 'created_at';
 const UPDATED_AT = 'updated_at';
}
