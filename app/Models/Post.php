<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Adding Columns to allow mass assignment
    protected $fillable = ['title', 'slug', 'tags', 'description', 'image', 'user_id', 'created_at', 'updated_at'];

    // Filtering
    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'LIKE', '%' . $filters['tag'] . '%');
        }
        else if($filters['search'] ?? false) {
            $query->where('title', 'LIKE', '%' . $filters['search'] . '%')
            ->orWhere('description', 'LIKE', '%' . $filters['search'] . '%')
            ->orWhere('tags', 'LIKE', '%' . $filters['search'] . '%');
        }
    }


    // Relationship with User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}