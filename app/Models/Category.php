<?php

namespace App\Models;

use App\Models\Post;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Traits\ApiTrait;

class Category extends Model
{
    use HasFactory,ApiTrait;

    protected $fillable = [
        'name',
        'slug'
    ];

    protected $allRelaciones = [
        'posts',
        'posts.user'
    ];

    protected $allFiltros = [
        'id', 'name', 'slug'
    ];

    protected $allOrders = [
        'id', 'name', 'slug'
    ];

    //Relacion 1-n
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

  
}
