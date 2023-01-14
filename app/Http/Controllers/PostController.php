<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Account;
use App\Models\Comment;

class PostController extends Controller
{
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
    return view('posts/index')->with(['posts' => $post->getByLimit()]);;//$postの中身を戻り値にする。
    }

}
