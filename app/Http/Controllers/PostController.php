<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Place;
use App\Test;

class PostController extends Controller
{
    public function index(User $user)
    {
        return view('index')->with(['users' => $user->get()]);
    }
}
