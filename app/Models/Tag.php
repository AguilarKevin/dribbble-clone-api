<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable =[
        'name'
    ];

    public function shots(){
        return $this->belongsToMany(Shot::class, 'shot_tag');
    }
//
//shot
//id - integer
//
//
//tags
//id - integer
//name - string
//
//shot_tag
//shot_id - integer
//tag_id - integer
}
