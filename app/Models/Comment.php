<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    // Postに対するリレーション

    //「1対多」の関係なので単数系に
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    // Accountに対するリレーション

    //「1対多」
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
