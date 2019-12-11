<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Carbon\Carbon;
use Carbon\Traits\Date;
use DateTime;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return $posts;
        return view('home', compact('posts'));
    }

    public function store(Request $request)
    {
        $dt = new DateTime();
        // $date = Carbon::parse($dt)->setTimezone('UTC');
        $user = new Post;
        $user->user_id = Auth::user()->id;
        $user->title = $request->title;
        $user->description = $request->description;
        $user->dat = $dt;
        $user->save();
        return back()->with('status', 'added');
    }
}
