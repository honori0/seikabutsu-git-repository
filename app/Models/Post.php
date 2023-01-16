<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
   
    
   public function getPaginateByLimit(int $limit_count = 3)
    {
        // created_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('created_at', 'DESC')->paginate($limit_count);
    }
    
     protected $fillable = [
    'body',
    'category_id',
    'account_id',
    'updated_at'
    ];
    
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
