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
        'tag',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
 
    public function wanna_visits() {
        //return $this->hasMany('App\Models\Nice');
        return $this->hasMany(WannaVisit::class);
    }

    public function visiteds() {
        return $this->hasMany(Visited::class);
    }
}
