<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title', 'text', 'author_id',
        'img', 'category_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function likes() {
        return $this->belongsToMany(User::class, 'articles_likes', 'article_id', 'user_id');
    }
}
