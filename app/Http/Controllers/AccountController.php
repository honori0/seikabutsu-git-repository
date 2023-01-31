<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Account;
use App\Mdels\Comment;
use App\Models\User;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
     public function index(Account $account)
    {
        $id = Auth::id();
        $accounts = $account->where('user_id', $id)->get();
        $now_account = $account->find(Auth::user()->now_account_id)->name;
        return view('accounts/index')->with(['accounts' => $accounts,'now_account'=>$now_account]);
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
    
    public function change(Account $account)
    {
        $user=Auth::user();
        $input["now_account_id"] = $account->id;
        $user->fill($input)->save();
        return redirect('/accounts');
       
    }
}