<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shot extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'views',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media(){
        return $this->hasMany(Media::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'shot_tag');
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'shot_user');
    }

}
