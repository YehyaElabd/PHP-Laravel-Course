<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'user_id']; // Add 'title' here


    public function user()
    {
    return $this->belongsTo(User::class, 'user_id');
    // $postsFromDB = Post::findorFail($PostId); // Model object
    // return view( 'posts.edit', ['post' => $postsFromDB] );
    }

    // If We want to change the naming of Functions, we need to add another parameter
    public function PostCreator()
    {
        //which is user_id
        return $this->belongsTo(User::class, 'user_id');
    }
}




