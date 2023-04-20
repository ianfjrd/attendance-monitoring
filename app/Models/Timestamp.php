<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timestamp extends Model
{
    use HasFactory;


 public function user()
 {
     return $this->belongsToMany(User::class, 'timestamp_user', 'timestamp_id', 'user_id');
 }
}