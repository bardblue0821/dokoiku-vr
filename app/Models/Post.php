<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'image',
        'link',
        'category_id',
        'thumbnail',
        'desc',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
 
    public function wanna_visits() {
        return $this->hasMany(WannaVisit::class);
    }

    public function visiteds() {
        return $this->hasMany(Visited::class);
    }

    public function categories() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
