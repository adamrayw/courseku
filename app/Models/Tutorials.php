<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorials extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function votes()
    {
        return $this->hasMany(Voters::class);
    }

    public function user()
    {
        return $this->belongsTo(Voters::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function saves()
    {
        return $this->hasMany(Save::class);
    }
}
