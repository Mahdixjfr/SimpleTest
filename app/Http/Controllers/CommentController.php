<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(CommentRequest $request, $product_id)
    {
        Comment::create([
            'comment' => $request->comment,
            'user_id' => userId(),
            'product_id' => $product_id,
        ]);
        return back();
    }
}
