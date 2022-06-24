<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        Comment::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product,
            'content' => $request->content,
        ]);

        return back();
    }
}
