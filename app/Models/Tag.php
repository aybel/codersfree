<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\ApiTrait;
class Tag extends Model
{
    use HasFactory,ApiTrait;

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
