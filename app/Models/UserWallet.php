<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public const REFERENCE_USER_REWARD = 50;

    public const NEW_USER_REWARD = 30;
}
