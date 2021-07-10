<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


//    public function optimize_get_last_cart_id_or_create()
//    {
//        if (!isset($_SESSION['cart_id']) && !isset($_SESSION['id'])){
//            $_SESSION['cart_id'] = $this->get_last_cart_id_or_create()[0]->cart_id;
//
//        }else if (isset($_SESSION['cart_id']) && !isset($_SESSION['id'])){
////            $_SESSION['cart_id'] = $_SESSION['cart_id'];
//
//        }else if (isset($_SESSION['cart_id']) && isset($_SESSION['id']) && !isset($_SESSION['first_time'])){
//            $_SESSION['cart_id'] = $this->get_last_cart_id_or_create()[0]->cart_id;
//            $_SESSION['first_time']=true;
//
//        }else if (isset($_SESSION['cart_id']) && isset($_SESSION['id']) && isset($_SESSION['first_time'])){
////            $_SESSION['cart_id'] = $_SESSION['cart_id'];
//
//        }else if (!isset($_SESSION['cart_id']) && isset($_SESSION['id']) && !isset($_SESSION['first_time'])){
//            $_SESSION['cart_id'] = $this->get_last_cart_id_or_create()[0]->cart_id;
//            $_SESSION['first_time']=true;
//
//        }
//    }



    public function get_last_cart_id_or_create(){

        $sessionId = session_id();

        if (isset($_SESSION['id'])){
            $userId=$_SESSION['id'];
        }else{
            //mehman
            $userId=0;
        }
        //login sign up
        if ($userId != 0){

            $result= DB::select("SELECT * FROM `carts` WHERE (`user_id`=?  or `sessionId`=?) AND payed=0 limit 1",array($userId,$sessionId));

            if ($result != null){
                if ($result[0]->user_id == 0){
                    //invoice
                    //////////-------------------
                    DB::update("UPDATE `carts` SET `user_id`=? WHERE cart_id=? limit 1",array($userId,$result[0]->cart_id));
//                    DB::update("UPDATE `carts` SET `user_id`=? WHERE `sessionId`=? AND payed=0 limit 1",array($userId,$sessionId));
                }
            }else{
                //invoice
                //////////-------------------
                DB::insert("INSERT INTO `carts`(`user_id`, `payed`, `price`,`sessionId`) VALUES (?,?,?,?)",array($userId,0,0,$sessionId));
                $result= DB::select("SELECT * FROM `carts` WHERE `user_id`=? AND payed=0 limit 1",array($userId));
            }
            //mehman
        }else{

            $result= DB::select("SELECT * FROM `carts` WHERE `sessionId`=? AND payed=0 limit 1",array($sessionId));

            if ($result == null){

                DB::insert("INSERT INTO `carts`(`user_id`, `payed`, `price`,`sessionId`) VALUES (?,?,?,?)",array($userId,0,0,$sessionId));
                $result= DB::select("SELECT * FROM `carts` WHERE `sessionId`=? AND payed=0 limit 1",array($sessionId));
            }

        }
        return $result;
    }

    public function get_last_cart_id_or_create_user_controller(){

        $sessionId = session_id();

        if (isset($_SESSION['id'])){
            $userId=$_SESSION['id'];
        }else{
            //mehman
            $userId=0;
        }
        //login sign up
        if ($userId != 0){

            $result= DB::select("SELECT * FROM `carts` WHERE (`user_id`=?  or `sessionId`=?) AND payed=0 limit 1",array($userId,$sessionId));

            if ($result != null){
                if ($result[0]->user_id == 0){
                    //invoice
                    //////////-------------------
                    DB::update("UPDATE `carts` SET `user_id`=? WHERE cart_id=? limit 1",array($userId,$result[0]->cart_id));
//                    DB::update("UPDATE `carts` SET `user_id`=? WHERE `sessionId`=? AND payed=0 limit 1",array($userId,$sessionId));
                }
            }else{
                //invoice
                //////////-------------------
                DB::insert("INSERT INTO `carts`(`user_id`, `payed`, `price`,`sessionId`) VALUES (?,?,?,?)",array($userId,0,0,$sessionId));
                $result= DB::select("SELECT * FROM `carts` WHERE `user_id`=? AND payed=0 limit 1",array($userId));
            }
            //mehman
        }else{

            $result= DB::select("SELECT * FROM `carts` WHERE `sessionId`=? AND payed=0 limit 1",array($sessionId));

            if ($result == null){

                DB::insert("INSERT INTO `carts`(`user_id`, `payed`, `price`,`sessionId`) VALUES (?,?,?,?)",array($userId,0,0,$sessionId));
                $result= DB::select("SELECT * FROM `carts` WHERE `sessionId`=? AND payed=0 limit 1",array($sessionId));
            }
            $_SESSION['mehman_m']=$result[0]->cart_id;
        }
        return $result;
    }

    public function show_count_oder()
    {

        if (!isset($_SESSION['id'])){

            $result2 = DB::table('carts')->where([
                ['sessionId', session_id()],
                ['payed',0],
            ])->first();

//            echo session_id();
//            print_r($result2);
//            exit();


            if ($result2 != null){

                $total=DB::table('orders')->
                where('cart_id',$result2->cart_id)->get()
                    ->sum('quantity');
//                $total = DB::select("SELECT COUNT(*) AS total FROM `orders` WHERE `cart_id`=?", array($result2->cart_id));
                return $total;
            }else{
                return 0;
            }

        }else {

            $result1 = DB::table('carts')->where([
                ['user_id', $_SESSION['id']],
                ['payed',0],
            ])->first();

            if ($result1 != null){

                $total=DB::table('orders')->
                where('cart_id',$result1->cart_id)->get()
                    ->sum('quantity');

                return $total;

//                $total = DB::select("SELECT COUNT(*) AS total FROM `orders` WHERE `cart_id`=?", array($result1->cart_id));
//                return $total[0]->total;
            }else{

                $result3 = DB::table('carts')->where([
                    ['sessionId', session_id()],
                    ['payed',0],
                ])->first();

                if ( $result3 != null){

                    DB::update("UPDATE `carts` SET `user_id`=? WHERE `sessionId`=? AND payed=0",array($_SESSION['id'],session_id()));

                    $total=DB::table('orders')->
                    where('cart_id',$result3->cart_id)->get()
                        ->sum('quantity');

                    return $total;

//                    $total = DB::select("SELECT COUNT(*) AS total FROM `orders` WHERE `cart_id`=?", array($result3->cart_id));
//                    return $total[0]->total;
                }else{
                    return 0;
                }


            }

        }

    }

}
