<?php

namespace App\Http\Controllers\Posts;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostList extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function __invoke(User $user)
    {
        if (Auth::check() && Auth::user()->id === $user->id) {
            $posts = $user->posts()->paginate(2);
            return redirect()->route('posts.index');
        } else {
            $posts = $user->posts()->whereStatus(Status::PUBLIC)->paginate(5);
            return view('posts.posts', ['posts' => $posts]);
        }
    }
}
