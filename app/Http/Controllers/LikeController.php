<?php

namespace App\Http\Controllers;

use App\Unlike;
use Illuminate\Http\Request;
use App\Like;

class LikeController extends Controller
{
    public function store(Request $request)
    {

        $chusqerId = str_replace(["chusqers/like/"], "", $request->path());
        $user = $request->user();
        if ($user->isMe($user)) {
            Like::firstOrCreate([
                'user_id' => $user->id,
                'chusqer_id' => $chusqerId,
            ]);
            return redirect()->back();
        }
    }

    public function show(Request $request)
    {

        $chusqerId = str_replace(["chusqers/likes/"], "", $request->path());
        $likes = Like::where('chusqer_id', $chusqerId)->latest()->get();

        return view('likes.index', ['likes' => $likes]);

    }

    public function delete(Request $request)
    {
        $chusqerId = str_replace(["chusqers/like/"], "", $request->path());
        $user = $request->user();
        if ($user->isMe($user)) {
            $like = Like::where([
                'chusqer_id' => $chusqerId,
                'user_id' => $user->id,
            ]);
            $unlike = Unlike::create([
                'user_id' => $user->id,
                'chusqer_id' => $chusqerId,
            ]);
            $like->delete();
            return redirect()->back()->with('error');
        }
    }
}
