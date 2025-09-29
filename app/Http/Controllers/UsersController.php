<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{

    public function index() {
        return view('users.index',[
            'users' => \App\Models\User::all()
        ]);
    }

    public function show(User $user) {
        return view('users.show',[
            'user' => $user
        ]);
    }
}
