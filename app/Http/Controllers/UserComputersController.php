<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserComputersController extends Controller
{
    public function index($userSlug)
    {
        $user = User::where('slug', $userSlug)->firstOrFail();
        $computers = $user->computers()->paginate(10);

        return view('public.usercomputers.index',[
            'user'  => $user,
            'computers' => $computers
        ]);
    }
}
