<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechFigure extends Model
{
    use HasFactory;

    protected $fillable = [
        'tech_post_id',
        'url',
    ];

    public function tech_post()
    {
        return $this->belongsTo(TechPost::class);
    }
}
