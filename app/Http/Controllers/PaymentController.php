<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mobile_Detect;


class PaymentController extends Controller
{

   public function cart(){

       $result=$this->get_last_cart_id_or_create();


       //$result=$this->optimize_get_last_cart_id_or_create();
       $data['products']=DB::select("SELECT * FROM `orders` LEFT OUTER JOIN  `products` on orders.product_id=products.product_id WHERE orders.cart_id=?",
                                               // array($result));
                                                array($result[0]->cart_id));

       $detect = new Mobile_Detect();

       if ( $detect->isMobile() || $detect->isTablet()) {
           return view("mobile-cartItem", $data);
       }else {
           return view("cartItem", $data);
       }

   }



   public function UpdatecartItem(){
       $quantity=$_POST['quantity'];
       $id=$_POST['idd'];

       DB::update("UPDATE `orders` SET `quantity`=? WHERE order_id=?",array($quantity,$id));
   }

   public function removecartItem(){
       $order_id=$_POST['idd'];

       DB::delete("DELETE FROM `orders` WHERE `order_id`=?",array($order_id));
   }
}
