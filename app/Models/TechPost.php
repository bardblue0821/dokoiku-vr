<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'tech_category_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tech_figures() {
        return $this->hasMany(TechFigure::class);
    }

    public function categories() {
        return $this->belongsTo(TechCategory::class);
    }
}