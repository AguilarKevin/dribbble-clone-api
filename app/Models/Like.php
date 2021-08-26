<?php

namespace App\Models;

use App\Models\Shot;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shot_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shot()
    {
        return $this->belongsTo(Shot::class);
    }
}
