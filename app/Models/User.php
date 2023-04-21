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
        'on_break' => 'On Break',
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
        if ($this->isOnBreak()) {
            return User::STATUS['on_break'];
        }

        if ($this->isTimeOut()) {
            return User::STATUS['off_duty'];
        }

        if ($this->isTimeIn()) {
            return User::STATUS['on_duty'];
        }

        return User::STATUS['off_duty'];
    }

    public function isTimeIn()
    {
        return $this->hasTimeIn(Carbon::today());
    }

    public function hasTimeIn($date)
    {
        return $this->hasTimestamp('time_in', $date);
    }

    public function isTimeOut()
    {
        return $this->hasTimeOut(Carbon::today());
    }

    public function hasTimeOut($date)
    {
        return $this->hasTimestamp('time_out', $date);
    }

    public function isOnBreak()
    {
        return Timestamp::where([
            ['user_id', $this->id],
        ])->whereDate('break_in', Carbon::today())
        ->whereNull('break_out')
        ->exists();
    }

    public function hasTimeStamp($column, $date)
    {
        return Timestamp::where([
            ['user_id', $this->id],
        ])->whereDate($column, $date)
        ->exists();
    }

    // public function canHaveABreak()
    // {
    //     $startingLunch = Carbon::now()->midDay()->addHour();
    //     $endLunch = Carbon::create($startingLunch)->endOfHour();
    //     // Debugbar::info(Carbon::now()->between($startingLunch, $endLunch));
    //     // Debugbar::info($endLunch);
    //     // && Carbon::now()->between($startingLunch, $endLunch);
    //     return $this->status() == User::STATUS['on_duty'];
    // }

    public function nextTimestampColumn()
    {
        $status = $this->status();

        if ($status == User::STATUS['on_duty']
            && Timestamp::where('user_id', $this->id)
                ->whereDate('break_in', Carbon::today())
                ->whereDate('break_out', Carbon::today())
                ->exists()) {
            return 'time_out';
        }

        if ($status == User::STATUS['on_break']) {
            return 'break_out';
        }

        if ($status == User::STATUS['on_duty']) {
            return 'break_in';
        }

        
        return 'time_in';
    }

}
