<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FollowUser;

class FollowUserController extends Controller
{
    //フォローする
    public function follow(Request $request)
    {
        FollowUser::firstOrCreate([
            'follower_id' => $request->post_user,
            'following_id' => $request->auth_user
        ]);
        return true;
    }
    //フォロー解除する
    public function unfollow(Request $request)
    {
        $follow = FollowUser::where('follower_id', $request->post_user)
            ->where('following_id', $request->auth_user)
            ->first();
        if ($follow) {
            $follow->delete();
            return false;
        }
    }
}
