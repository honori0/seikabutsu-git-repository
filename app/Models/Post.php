<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    // Categoryに対するリレーション

    //「1対多」
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    //Accountに対するリレーション
    public function accounts()
    {
        //like機能　「多対多」の関係
        return $this->belongsToMany(Account::class);
    }
    
    // Commentに対するリレーション

    //「1対多」
    public function comments()
    {
        return $this->HasMany(Comment::class);
    }
}
