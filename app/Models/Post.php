<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Adding Columns to allow mass assignment
    protected $fillable = ['title', 'slug', 'description', 'image', 'user_id', 'created_at', 'updated_at'];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}