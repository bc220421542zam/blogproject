<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller 
{
    public function index()
    {
       // $posts = Post::latest()->get();
    $posts = auth()->user()->posts()->latest()->paginate(6); // logged-in user ke posts
   
    return view('users.dashboard', compact('posts'));
    }

    public function userPosts(User $user){
       $userPosts = $user->posts()->latest()->paginate(6);
        return view('users.posts', [
            'posts'=> $userPosts,
            'user' => $user
            ]);
    }
}