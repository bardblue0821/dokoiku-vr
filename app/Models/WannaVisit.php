<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WannaVisit extends Model
{
    use HasFactory;

    protected $table = 'wanna_visits';

    public function user() {
        return $this->belongsTo(User::class);
    }
 
    public function post() {
        return $this->belongsTo(Post::class);
    }
}
