<?php

namespace App\Models;

use App\Models\Vote;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'description'
    ];

    public function commentVotedBy(User $user, Comment $comment)
    {
        // return Vote::where('user_id', $user->id)->where('comment_id', $comment->id)->first() === null ? true : false;

        if (Vote::where('user_id', $user->id)->where('comment_id', $comment->id)->first() === null) {
            return false;
        } else {
            return true;
        }
    }

    public function votedBy(User $user)
    {
        return $this->votes->contains('user_id', $user->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
