<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public const STATUS = [
        'off_duty' => 'Off Duty',
        'on_duty' => 'On Duty',
        'break' => 'break',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

   

    public function timestamps()
    {
        return $this->hasMany(Timestamp::class);
    }

    public function status()
    {
        if ($this->isTimeOutToday()) {
            return User::STATUS['off_duty'];
        }

        if ($this->isTimeInToday()) {
            return User::STATUS['on_duty'];
        }

        return User::STATUS['off_duty'];
    }

    public function isTimeInToday()
    {
        return $this->isTimeIn(Carbon::today());
    }

    public function isTimeIn($date)
    {
        return $this->hasTimestamp(Timestamp::NAMES['time_in'], $date);
    }

    public function isTimeOutToday()
    {
        return $this->isTimeOut(Carbon::today());
    }

    public function isTimeOut($date)
    {
        return $this->hasTimestamp(Timestamp::NAMES['time_out'], $date);
    }

    public function hasTimeStamp($name, $date)
    {
        return Timestamp::where([
            ['name', $name],
            ['user_id', $this->id],
        ])->whereDate('created_at', $date)
        ->exists();
    }

    public function canHaveABreak()
    {
        $startingLunch = Carbon::now()->midDay()->addHour();
        $endLunch = Carbon::create($startingLunch)->endOfHour();
        // Debugbar::info(Carbon::now()->between($startingLunch, $endLunch));
        // Debugbar::info($endLunch);
        // && Carbon::now()->between($startingLunch, $endLunch);
        return $this->status() == User::STATUS['on_duty'];
    }

    public function nextTimestampName()
    {
        $status = $this->status();

        if ($status == User::STATUS['on_duty'] && $this->hasTimeStamp(Timestamp::NAMES['break'], Carbon::today())) {
            return Timestamp::NAMES['time_out'];
        }

        if ($this->canHaveABreak()) {
            return Timestamp::NAMES['break'];
        }

        
        return Timestamp::NAMES['time_in'];
    }

}
