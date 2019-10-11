<?php

// PostController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function index(Request $request, Post $post)
    {
        $posts = $post->whereIn('user_id', $request->user()->following()
                        ->pluck('users.id')
                        ->push($request->user()->id))
                        ->with('user')
                        ->orderBy('created_at', 'desc')
                        ->take($request->get('limit', 10))
                        ->get();

        return response()->json($posts);
    }

    public function store(Request $request, Post $post)
    {
        $newPost = $request->user()->posts()->create([
            'body' => $request->get('body')
        ]);
        return response()->json($post->with('user')->find($newPost->id));
    }

    public function tweets(){
        $tweets = DB::table('posts')->get();
        return response()->json($tweets);
    }

    public function userstweets()
    {
        $numberoftweets = DB::select('select count(user_id) from posts group by user_id');

        return response()->json($numberoftweets);
        //return response($numberoftweets)
            //->header('Number of Tweets', $numberoftweets);
            //->header('Number of Tweets', 'xx');
    }

}