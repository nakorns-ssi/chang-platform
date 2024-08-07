<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
 protected $table = 'location';
 public $timestamps = true;
 const CREATED_AT = 'created_at';
 const UPDATED_AT = 'updated_at';
}
