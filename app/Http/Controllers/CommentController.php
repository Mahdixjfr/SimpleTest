<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\DisLikeComment;
use App\Models\LikeComment;
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

    public function like(Comment $comment)
    {
        $this->functor($comment, LikeComment::class, 'like');
        return back();
    }
    public function dislike(Comment $comment)
    {
        $this->functor($comment, DisLikeComment::class, 'dislike');
        return back();
    }

    public function check($user_id, $comment_id, $model)
    {
        $result = $model::where('user_id', $user_id)->where('comment_id', $comment_id);
        if ($result->count() > 0) {
            return $result->first();
        }
        return true;
    }

    public function addOperator($comment_id, $model, $comment, $type)
    {
        $model::create([
            'user_id' => userId(),
            'comment_id' => $comment_id,
        ]);
        $comment->update([$type => $comment->{$type} + 1]);
    }

    public function deleteOpeator($obj, $comment, $type)
    {
        $obj->delete();
        $comment->update([$type => $comment->{$type} - 1]);
    }

    public function functor($comment, $model, $operator)
    {
        if ($this->check(userId(), $comment->id, $model) === true) {
            $this->addOperator($comment->id, $model, $comment, $operator);
        } else {
            $obj = $this->check(userId(), $comment->id, $model);
            $this->deleteOpeator($obj, $comment, $operator);
        }
    }
}
