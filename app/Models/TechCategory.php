<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public function tech_post() {
        return $this->hasMany(TechPost::class);
    }
}
