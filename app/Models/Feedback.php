<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
 protected $table = 'feedback';
 public $timestamps = true;
 const CREATED_AT = 'created_at';
 const UPDATED_AT = 'updated_at';
}
