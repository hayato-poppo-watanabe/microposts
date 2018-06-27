<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // add
use App\Micropost;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        
        $users = User::where('name', 'like','%'. $request->keyword. '%')->paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    public function show($id)
    {
        $user = User::find($id);
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,
         ];
        $data += $this->counts($user);
        return view('users.show', $data);
    }

    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

     public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    public function beingfavorites($id)
    {
         $user = User::find($id);
        $beingfavorites = $user->beingfavorites()->paginate(10);
       

        $data = [
            'user' => $user,
            'microposts' => $beingfavorites,
        ];

        $data += $this->counts($user);
        return view('users.beingfavorite', $data);
    }
    
    public function edit()
    {
        $user = \Auth::user();
        

        
        return view('users.profile', [
            'user' => $user,
        ]);
    }
    
    public function update(Request $request)
    {
        $user = \Auth::user();

         $this->validate($request, [
            'profile' => 'max:144',
            'birthday' =>'date_format:Y-m-d',
            'web_link' => 'max:255',
        
        ]);

        $user->profile = $request->profile;
        $user->birthday = $request->birthday;
        $user->web_link = $request->web_link;
        $user->save();
        
       // return view('users.show', ['user' => $user]);
        return redirect('users/'. $user->id);
    }
    
}