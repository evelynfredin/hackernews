<?php

namespace App\Models;

use App\Models\Vote;
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
}
