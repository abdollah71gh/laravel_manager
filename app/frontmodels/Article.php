<?php

namespace App\frontmodels;

use App\Comment;
use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    //
    protected $fillable = ['name', 'status', 'user_id', 'description', 'image', 'slug'];
    protected $attributes = [
        'hit' => 300,
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }




}
