<?php

namespace App\Models\chang_prompt;

use Illuminate\Database\Eloquent\Model;

class Data_meta extends Model
{ 
 protected $table = 'data_meta';
 public $timestamps = false;
 const CREATED_AT = 'created_at';
 const UPDATED_AT = 'updated_at';
}
