<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BankController extends Controller
{

    public function set_prices()
    {
        $_SESSION['price']=$_POST['price_s'];

        $result=$this->get_last_cart_id_or_create();
        DB::table('carts')->where('cart_id',$result[0]->cart_id)->update([
                'price'=>$_SESSION['price']
            ]);
    }

    public function bank()
    {


        if (!isset($_SESSION['id']) || empty($_SESSION['id']) || !isset($_SESSION['price']) || $_SESSION['price'] == 0){
            return redirect('/');
        }
//        $_SESSION['cart_id']=null;

        $result=$this->get_last_cart_id_or_create();
        DB::table('carts')->where('cart_id',$result[0]->cart_id)
            ->update([
            'payed'=>1,
//            'price'=>$_SESSION['price']
        ]);
        $_SESSION['cart_id']=$result[0]->cart_id;


        return redirect('/takmil_kharid');
    }


 // in chziyy ke toy method bala hastam nayar paiin choon age biari paiin yaroo reload kone vasash cart misaze
    public function takmil_kharid()
    {


        $data=array();
        $data['products']=DB::select("SELECT * FROM `orders` LEFT OUTER JOIN  `products` on orders.product_id=products.product_id WHERE orders.cart_id=?",array($_SESSION['cart_id']));

        if ($data['products'] != null){



        Mail::send(['html'=>'email'],$data,function (Message $msg){

            $msg->to($_SESSION['email'])->
            subject('سفارش خرید');
        });

        }

        unset($_SESSION['cart_id']);
        unset($_SESSION['price']);

        return view("takmil_kharid");
    }
}

