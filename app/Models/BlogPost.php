<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $table='blog_posts';


    protected $fillable = [
        'id',
        'title',
        'body',
        'user_id',
        'picture'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); //relationship database
    }

}
