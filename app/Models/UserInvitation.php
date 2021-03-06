<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInvitation extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'created_by','email','redeemed'];

    public function referenceUser()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}
