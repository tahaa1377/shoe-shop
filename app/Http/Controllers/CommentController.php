<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{

    public function show_comment_and_product($id)
    {
        $product=DB::table('products')->where('product_id',$id)->first();

        $comments=DB::table('comments')->
        leftJoin('users','comments.user_id','=','users.user_id')->
        where([
            ["comments.product_id",$id],
            ["comments.accept",1]
        ])->get();

        return view('comments',compact('product','comments'));

    }

    public function add_comment()
    {
        $comments=$_POST['words'];
        $pid=$_POST['pid'];
        $user_id=$_SESSION['id'];
        $name=$_SESSION['name'];

        Comments::create([                        // if do not have updated_at or created_at error
            'user_id' => $user_id,
            'name' => $name,
            'product_id'   => $pid,
            'comment'    => $comments,
            'accept' => 0,
        ]);


//        $comments=DB::table('comments')->
//        leftJoin('users','comments.user_id','=','users.user_id')->
//        where("comments.product_id",$pid)->get();

        //return view('ajax.comments',compact('comments'));

    }


}
