<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'body', 'image'
    ];

    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
