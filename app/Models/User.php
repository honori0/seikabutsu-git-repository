<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'now_account_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getOwnPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('posts')->find(Auth::id())->posts()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    // Accountに対するリレーション

    //「1対多」
    public function accounts()   
    {
        return $this->hasMany(Account::class);
    }
    
    //followerに対するリレーション
    public function followUsers()
    {
        return $this->belongsToMany(
            'App\Models\User',
            'follower_following',
            'follower_id',
            'following_id'
        );
    }
  
    //followingに対するリレーション
    public function follow()
    {
        return $this->belongsToMany(
            'App\Models\User',
            'follower_following',
            'follower_id',
            'following_id'
        );
    }
    
    // Accountに対するリレーション

    //「1対多」
    public function now_account_id()
    {
        return $this->hasMany(Account::class);
    }
   

}
