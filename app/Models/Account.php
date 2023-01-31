<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
    return $this->orderBy('id', 'DESC')->paginate($limit_count);
    }
    
    protected $fillable = [
    'name',
    'user_id'
    ];
    
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
    
    // Userに対するリレーション

    //「1対1」
    public function now_account_id()
    {
        return $this->belongsTo(User::class);
    }
}
