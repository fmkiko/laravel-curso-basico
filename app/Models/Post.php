<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'content', 'category_id', 'description', 'posted' ,'image'];

    public function getCategory()
    {
        return $this->belongsTo( Category::class , 'category_id' );
    }

}
