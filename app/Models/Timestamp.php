<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timestamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_in',
        'time_out',
        'break_in',
        'break_out',
        'user_id',
        'time_in_comment',
        'time_out_comment',
        'break_time_comment'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function findByTimeInToday($user_id)
    {
        return Timestamp::where('user_id', $user_id)
            ->whereDate('time_in', today())
            ->latest('time_in')
            ->first();
    }
}
