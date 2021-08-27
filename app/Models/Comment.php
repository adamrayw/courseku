<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function tutorial()
    {
        return $this->belongsTo(Tutorials::class);
    }

    public function user()
    {
        return $this->BelongsTo(User::class, 'users_id', 'id');
    }
}
