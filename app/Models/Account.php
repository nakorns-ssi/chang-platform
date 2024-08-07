<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{ 
 protected $table = 'account';
 public $timestamps = false;
 const CREATED_AT = 'created_at';
 const UPDATED_AT = 'updated_at';
}
