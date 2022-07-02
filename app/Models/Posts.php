<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['author'];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeSearch($query, $search) {
        $query->when($search ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                            ->orWhere('body', 'like', '%' . $search . '%');
        });
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
