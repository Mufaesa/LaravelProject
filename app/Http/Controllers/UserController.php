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
        //Standard controller, checking if the user is logged in for every controller.
        
        $this->middleware('auth');
    }

    public function userOverview()
    {
        //Second authorisation: checking the email for permission to user overview page.

        $user = \Auth::user();
        if ($user->email === 'tomvrijmoet@hotmail.com') {

            $results = User::all();

            return view('userView')->with('results', $results);
        } else {
            return redirect('/');
        }
    }


    public function myAccount()
    {
        //Returns a view containing their personal account info.

        $user = \Auth::user();

        return view('myAccount')->with('user', $user);
    }

    public function updateAccount($user_id)
    {
        //Returns a view containing a form to update personal account info.

        $results = DB::table('users')
            ->where('id', '=', $user_id)
            ->get();

        return view('accountEdit')->with('results', $results);
    }

    public function store($user_id, userRequest $request)
    {
        //Function for storing updated account information.

        $updatedAccount = User::find($user_id);

        if ($request->has('image')) {
            $updatedAccount->image = 'images/' . $request->image;
        }
        $updatedAccount->name = $request->name;
        $updatedAccount->email = $request->email;


        $updatedAccount->save();
        $request->session()->flash('status', 'My account information updated!');


        return redirect('account');
    }


    public function search(Request $request)
    {
        //Function to search through database. Filter is implemented in search option.

        $result = $request->input('search');

        $users = DB::table('users')->where($request->filter, 'LIKE', '%' . $result . '%')->paginate(10);

        return view('search', compact('users'));
    }

    public function toggleUser($user_id, Request $request)
    {
        //Function for toggle button.

        $updatedAccount = User::find($user_id);

        if ($updatedAccount->role === 1) {
            $updatedAccount->role = 2;
        } else {
            $updatedAccount->role = 1;
        }

        $updatedAccount->save();

        $request->session()->flash('status', 'Role updated!');

        return redirect('userView');
    }

}
