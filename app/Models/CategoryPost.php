<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;

    // Since the model name is CategoryPost, Laravel will assume that the table name is 'category_posts',
    // which is wrong. Do this to avoid that error.
    protected $table = 'category_post';
    
    // because we will use create(array) later
    protected $fillable = ['category_id', 'post_id'];
    
    // disable the automatic timestamps created_at and updated_at
    public $timestamps = false;

    # To get the name of the category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
