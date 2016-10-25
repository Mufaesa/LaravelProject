<?php

namespace App\Http\Controllers;
use App\Http\Requests\userRequest;
use App\Http\Requests;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function userOverview()
    {
        $results = User::all();

        return view('userView')->with('results', $results);
    }
    

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

   
    public function search(Request $request)
    {
        $result = $request->input('search');

        $users = DB::table('users')->where('name', 'LIKE', '%' . $result . '%')->paginate(10);

        return view('search', compact('users'));
    }

    public function toggleUser($user_id)
    {
        $updatedAccount = User::find($user_id);

        if($updatedAccount->role === 1){
            $updatedAccount->role = 2;
        } else {
            $updatedAccount->role = 1;
        }

        $updatedAccount->save();
        
        return redirect('userView');
    }

}
