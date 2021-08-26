<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain',
        'path',
        'mimetype',
        'shot_id'
    ];

    public function shot()
    {
        return $this->belongsTo(Shot::class);
    }
}
