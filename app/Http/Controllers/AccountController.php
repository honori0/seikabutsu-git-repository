<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Post;
use App\Models\Account;
use App\Mdels\Comment;
use App\Models\User;
use App\Http\Requests\AccountRequest;

class AccountController extends Controller
{
     public function index(Account $account)
    {
        return view('accounts/index')->with(['accounts' => $account->getPaginateByLimit()]);
    }
  
    public function create()
    {
        return view('accounts/create');
    }
    
    public function store(AccountRequest $request, Account $account)
    {
        $input = $request['account'];
        $input["user_id"] = auth()->id();
        $account->fill($input)->save();
        return redirect('/accounts/' . $account->id);
    }
    
    public function show(Account $account)
    {
        return view('accounts/show')->with(['account' => $account]);
    }
    
    public function delete(Account $account)
    {
    $account->delete();
    return redirect('/accounts');
    }
}