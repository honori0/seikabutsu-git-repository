<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
    return $this->orderBy('id', 'DESC')->paginate($limit_count);
    }
    
    //Postに対するリレーション
    public function posts()
    {
        //like機能　「多対多」の関係
        return $this->belongsToMany(Post::class);
    }
    
    // Commentに対するリレーション

    //「1対多」
    public function comments()   
    {
        return $this->hasMany(Comment::class);  
    }
    
    // Userに対するリレーション

    //「1対多」
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
