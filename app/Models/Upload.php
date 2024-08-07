<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{ 
 protected $table = 'upload';
 public $timestamps = false;
 const CREATED_AT = 'created_at';
 const UPDATED_AT = 'updated_at';
}
