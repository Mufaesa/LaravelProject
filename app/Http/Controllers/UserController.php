<?php

namespace App\Http\Controllers;
use App\Http\Requests\movieRequest;
use Illuminate\Http\Request;
use App\Http\Requests\userRequest;
use App\User;
use DB;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function myAccount()
    {
        $user=\Auth::user();
        
        return view('myAccount')->with('user', $user);
    }

    public function editUser($user_id)
    {
        $results = DB::table('users')
            ->where('id', '=', $user_id)
            ->get();

        return view('accountEdit')->with('results', $results);

    }

    public function updateAccount($user_id)
    {
        $results = DB::table('users')
            ->where('id', '=', $user_id)
            ->get();

        return view('accountEdit')->with('results', $results);
    }

    public function store($user_id, userRequest $request){

        $updatedAccount = User::find($user_id);
        $updatedAccount ->name = $request->name;
        $updatedAccount->email = $request->email;

        $updatedAccount->save();

        return redirect('account');
    }

}
