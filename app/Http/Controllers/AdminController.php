<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{


    public function admmiin_pages_G()
    {
        if ($_SESSION['access'] != 'modir'){
            return redirect("/account");
        }else{
            return view("admin.admin-page");
        }

    }

    public function add_new_product()
    {
        if ($_SESSION['access'] != 'modir'){
            return redirect("/account");
        }
        return view("admin.add-new-product");
    }

    public function add_new_product_form(Request $request)
    {
        if ($_SESSION['access'] != 'modir'){
            return redirect("/account");
        }


        request()->validate([
            'p_name' => 'required',
            'p_decription' => 'required',
            'p_price' => 'required',
            'p_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'p_type' => 'required'
        ]);

       $name= $request->p_name;
       $decription= $request->p_decription;
       $price= $request->p_price;
       $discount= $request->p_discount;

       if ($discount == null){
           $discount=0;
       }


        $imageName = time() . '.' . $request->p_image->getClientOriginalExtension();


        Product::create([
            'title' => $name,
            'description' => $decription,
            'price' => $price,
            'takhfif' => $discount,
            'image'=>  $imageName,
            'type'=>  $request->p_type,
            'available' => 1
        ]);

        $request->p_image->move(public_path('images'), $imageName);

        $taha['successing']="محصول با موفقیت ثبت شد .";
        return redirect()->route('admin.page')->with($taha);

    }

    public function update_product($result=null)
    {

            if ($_SESSION['access'] != 'modir'){
                return redirect("/account");
            }

        if ($result == null){
            return view("admin.update-product");
        }else{

            $data['product']=Product::where('product_id',$result)->first();
            return view("admin.result-of-update-product",$data);

        }


    }

    public function update_product_res()
    {
        if ($_SESSION['access'] != 'modir'){
            return redirect("/account");
        }

        $update_word=$_POST['update_word'];

        $data['products']=Product::where('title','like',"%$update_word%")->limit(10)->get();

        return view('ajax.admin.update-product-res',$data);


    }

    public function upload_image()
    {
        if ($_SESSION['access'] != 'modir'){
            return redirect("/account");
        }

        return view('admin.upload-image');

    }

    public function upload_image_form(Request $request)
    {
        if ($_SESSION['access'] != 'modir'){
            return redirect("/account");
        }


        request()->validate([
            'upload_image' => 'required|image|mimes:jpeg,png,jpg'
        ]);


        $imageName = $_FILES['upload_image']['name'];

        $request->upload_image->move(public_path('images'), $imageName);

        $taha['successing']="عکس آپلود شد";
        return redirect()->route('admin.page')->with($taha);
    }


    public function update_product_form(Request $request)
    {


        if ($_SESSION['access'] != 'modir'){
            return redirect("/account");
        }

        request()->validate([
            'p_name' => 'required',
            'p_decription' => 'required',
            'p_price' => 'required',
            'p_image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $name= $request->p_name;
        $decription= $request->p_decription;
        $price= $request->p_price;
        $discount= $request->p_discount;
        $id= $request->p_id;

        if ($request->file('p_image') == null){

            Product::where('product_id',$id)->update([
                'title' => $name,
                'description' => $decription,
                'price' => $price,
                'takhfif' => $discount,
                'available' => $request->p_available
            ]);

        }else{
            $imageName = time() . '.' . $request->p_image->getClientOriginalExtension();

            Product::where('product_id',$id)->update([
                'title' => $name,
                'description' => $decription,
                'price' => $price,
                'takhfif' => $discount,
                'image'=>  $imageName,
                'available' => $request->p_available
            ]);

            $request->p_image->move(public_path('images'), $imageName);
        }


        $taha['successing']="محصول با موفقیت ویرایش شد .";
        return redirect()->route('admin.page')->with($taha);


    }

    public function comments_list()
    {
        if ($_SESSION['access'] != 'modir'){
            return redirect("/account");
        }

        $data['comments']=DB::select("SELECT * FROM `comments` LEFT JOIN `products` on 
                          comments.product_id=products.product_id WHERE comments.accept=0");


        return view('ajax.admin.comments',$data);
    }

    public function comment_lunch()
    {
        if ($_SESSION['access'] != 'modir'){
            return redirect("/account");
        }

        Comments::where('comment_id',$_POST['lunch'])->update([
            'accept' => 1
        ]);
    }

    public function comment_remove()
    {
        if ($_SESSION['access'] != 'modir'){
            return redirect("/account");
        }

        Comments::where('comment_id',$_POST['remove'])->delete();
    }


    public function delete_product($result=null)
    {
        if ($_SESSION['access'] != 'modir'){
            return redirect("/account");
        }


        if ($result == null){
            return view("admin.delete-product");
        }else{

            echo $result;   //product_id

        //delete product - delete images - delete size - delete color - unlink images



        //unlink('images/background.jpg');      //delete images - unlink images

        }

    }

    public function del_product_res()
    {
        if ($_SESSION['access'] != 'modir'){
            return redirect("/account");
        }

        $update_word=$_POST['update_word'];

        $data['products']=Product::where('title','like',"%$update_word%")->limit(10)->get();

        return view('ajax.admin.delete-product-res',$data);


    }

    public function users_list()
    {
        $users=DB::table('users')->get();
        return view('admin.users',compact('users'));

    }
}
