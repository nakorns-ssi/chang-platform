<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QR_config extends Model
{ 
 protected $table = 'qr_config';
 public $timestamps = false;
 const CREATED_AT = 'created_at';
 const UPDATED_AT = 'updated_at';
}
