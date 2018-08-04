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
        $comment->delete();

        return redirect('admin/product/update_product/'.$product_id)->with('mess', trans('admin.delete_successfully')) ;
    }
    
}
