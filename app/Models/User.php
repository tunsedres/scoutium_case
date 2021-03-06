<?php

namespace App\Models;

use App\Events\UserCreated;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'reference_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'updated_at',
        'email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function invitation()
    {
        return $this->hasOne('App\Models\UserInvitation', 'code', 'reference_code');
    }

    public function wallet()
    {
        return $this->hasOne('App\Models\UserWallet', 'user_id');
    }

    public static function boot()
    {
        parent::boot();

        self::created(function($model){
            $model->wallet()->create([
                'user_id' => $model->id,
                'amount' =>0
            ]);
        });

    }
}
