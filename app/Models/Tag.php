<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'slug'
    ];

    public function shots(){
        return $this->belongsToMany(Shot::class, 'shot_tag');
    }
}
