<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    //Relacion 1-n
    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function scopeInclude(Builder $query){

        $relacion=explode(',',request('include'));
        $query->with($relacion);
        

    }

}
