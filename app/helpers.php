<?php


use App\Models\User;

if (!function_exists('show_name')) {
    function show_name($id)
    {
        $user = User::find($id);
        return $user->name;
    }
}

if (!function_exists('UserId')) {
    function UserId()
    {
        if (auth()->check()) {
            return auth()->user()->id;
        } else {
            return redirect('/login');
        }
    }
}
