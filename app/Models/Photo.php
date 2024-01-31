<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'link1',
        'link2',
        'link3',
        'link4',
        'link5',
        'link6',
        'link7',
        'link8',
        'link9',
        'world_link',
        'size1x',
        'size1y',
        'size2x',
        'size2y',
        'size3x',
        'size3y',
        'size4x',
        'size4y',
        'size5x',
        'size5y',
        'size6x',
        'size6y',
        'size7x',
        'size7y',
        'size8x',
        'size8y',
        'size9x',
        'size9y',
        'number',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
