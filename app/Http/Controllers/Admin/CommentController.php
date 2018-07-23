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

    	return redirect('admin/san-pham/sua-san-pham/'.$product_id)->with('thongbao', 'Xoá thành công comment');
    }
}
