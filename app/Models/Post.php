<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id'];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function temporaryFile(): HasOne
    {
        return $this->hasOne(TemporaryFile::class);
    }
}
