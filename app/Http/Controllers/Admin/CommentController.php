<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function delete($id, $product_id)
    {
        $comment = Comment::find($id);
        $comments = Comment::find($id)->replies()->get();
        $comment->delete();
        
        foreach ($comments as $comment) {
        	$comment->delete();     	
        }
        echo "ok";
    }
    
}
