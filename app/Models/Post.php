<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body'
    ];

 public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function nices(){
        return $this->hasMany('App\Models\Nice');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getImageUrlAttribute()
    {
        return Storage::url('images/posts/' . $this->image);
    }

    public function getImagePathAttribute()
    {
        return 'images/posts/' . $this->image;
    }
}
