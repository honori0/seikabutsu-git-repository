<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Account;
use App\Mdels\Comment;
use App\Models\User;

class AccountController extends Controller
{
     public function index(Account $account)
    {
        return view('accounts/index')->with(['accounts' => $account->getPaginateByLimit()]);
    }
}