<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timestamp extends Model
{
    use HasFactory;

    public const NAMES = [
        'time_in' => 'Time In',
        'time_out' => 'Time Out',
        'break' => 'Break',
    ];

    protected $fillable = [
        'name',
        'photo_url',
        'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function isExistsByCustomWhere(array $customWhere) {
        return Timestamp::where($customWhere)->exists();
    }

    
}
