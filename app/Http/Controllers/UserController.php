<?php

namespace App\Http\Controllers;

use App\Http\Requests\Userequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        // Memanggil database user
        // $users =\Illuminate\Support\Facades\DB::table('users')->get();

        // return $users;
        //tabel users dipanggil memlalui model otomatis dipanggil karna itu adalah model user(default)
        // return \App\Models\User::get();

        $users = User::query()->latest()->get();

        return view('users.index', [
            //'people' yang dipanggil pada frontend (index.blade.php)
            'users' => $users
        ]);

    }

    public function create(){
        return view('users/form', [
            'user' => new User(),
            'page_meta' =>[
                'title' => 'Create New User',
                'method' => 'post',
                'url' => '/users',
            ],
        ]);
    }

    public function store(Userequest $request){
        User::create($request->validated());

        return redirect('/users');
    }

    public function show(User $user){

        return view('users/show',[
            'user' => $user,
        ]);
    }

    public function edit(User $user){
        return view('users/form',[
            'user' => $user,
            'page_meta' =>[
                'title' => ' Edit User:' . $user->name,
                'method' => 'put',
                'url' => '/users/' . $user->id,
            ],
        ]);
    }

    public function update(Userequest $request, User $user){
        // dd('updated');
        $user->update($request->validated());
        return redirect('/users');


    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users')->with('success', 'User deleted successfully');
    }
}
