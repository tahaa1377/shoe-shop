<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function account(){

//        if (
////            url()->previous() != 'http://h-id.ir/account' ||
////            !Str::contains(url()->previous(),'http://h-id.ir/resetpass') ||
////            !Str::contains(url()->previous(),'http://h-id.ir/changepass') ||
//
//            url()->current() != 'http://shop.localhost/account' ||
//            !Str::contains(url()->current(),'http://shop.localhost/resetpass') ||
//            !Str::contains(url()->current(),'http://shop.localhost/changepass')
//
//        )
//        {
            $_SESSION['url']=url()->previous();
       // }




        if (isset($_SESSION['generateRandomString'])){
            unset($_SESSION['generateRandomString']);
        }

        if (isset($_SESSION['id'])){
           return redirect('/');
        }

        return view('vrood');
    }

    public function logout(){
        session_destroy();
        session_start();
        session_regenerate_id();
       return redirect("/account");
    }

    public function login(){

        request()->validate([
            'login_email' => 'required|email',
            'login_password' => 'required|min:5',
        ],[
            'login_email.required' =>'ایمیل نباید خالی باشد',//ارور اختصاصی
            'login_email.email' =>'لطفا یک ایمیل صحیح وارد کنید',//ارور اختصاصی
            'login_password.required' =>'رمز عبور نباید خالی باشد',//ارور اختصاصی
            'login_password.min' =>'رمز عبور نباید کمتر از پنج حرف باشد',//ارور اختصاصی

        ]);
            $email= $_POST['login_email'];
            $password=$_POST['login_password'];


            $bool=DB::select("SELECT * FROM `users` WHERE `email`=?",array($email));

        if ($bool == null){
            $taha['login_error']="ایمیل شما در سیستم وجود ندارد";
            return redirect('/account')->with($taha);
        }else{
            if ($bool[0]->password != md5($password)){
                $taha['login_error']="رمز عبور شما اشتباه است";
                return redirect('/account')->with($taha);
            }else{
                $_SESSION['id']=$bool[0]->user_id;
                $_SESSION['email']=$bool[0]->email;
                $_SESSION['access']=$bool[0]->access;
                $_SESSION['name']=$bool[0]->name;

               // $_SESSION['type']='grid';

                //////////////////////////////////////////////////////////

                if (isset($_SESSION['mehman_m'])){
                    $res=$this->get_last_cart_id_or_create();

                    if ($_SESSION['mehman_m'] != $res[0]->cart_id){

                        DB::table('orders')->where('cart_id',$res[0]->cart_id)->delete();
                        DB::table('carts')->where('cart_id',$res[0]->cart_id)->limit(1)->delete();

                    }

                }

                ////////////////////////////////////////////////////////



                if ($_SESSION['access'] == 'modir'){
                    return redirect()->route('admin.page');
                }else{


                    if ($_SESSION['url'] == 'http://h-id.ir/account' ||
                        Str::contains($_SESSION['url'],'http://h-id.ir/resetpass') ||
                        Str::contains($_SESSION['url'],'http://h-id.ir/changepass') ||
                        $_SESSION['url'] == 'http://shop.localhost/account' ||
                        Str::contains($_SESSION['url'],'http://shop.localhost/resetpass') ||
                        Str::contains($_SESSION['url'],'http://shop.localhost/changepass')

                    ){
//                    if ($_SESSION['url'] == 'http://shop.localhost/account' || $this->contains($_SESSION['url'],'http://h-id.ir/resetpass/') ){
                        return redirect('/');
                    }else{
                        return redirect($_SESSION['url']);
                    }

                }


            }
        }

    }

    public function sign(){

        request()->validate([
            'sign_name' => 'required|min:2',
            'sign_email' => 'required|email',
            'sign_password' => 'required|min:5',
        ],[
            'sign_name.required' =>'نام کاربری نباید خالی باشد',//ارور اختصاصی
            'sign_name.min' =>'نام کاربری نباید کمتر از دو حرف باشد',//ارور اختصاصی
            'sign_email.required' =>'ایمیل نباید خالی باشد',      //ارور اختصاصی
            'sign_email.email' =>'لطفا یک ایمیل صحیح وارد کنید',//ارور اختصاصی
            'sign_password.required' =>'رمز عبور نباید خالی باشد',//ارور اختصاصی
            'sign_password.min' =>'رمز عبور نباید کمتر از پنج حرف باشد',        //ارور اختصاصی

        ]);

        $name= $_POST['sign_name'];
        $email= $_POST['sign_email'];
        $password=$_POST['sign_password'];



        $result=User::where("email",$email)->first();

        if ($result != null){
            $taha['sign_error']="این ایمیل قبلا در سیستم وجود داشته";
            return redirect('/account')->with($taha);
        }else{

          $user=User::create([                        // if do not have updated_at or created_at error
            'name' => $name,
            'email'   => $email,
            'password'    => md5($password),
            'access'    => 'user'
        ]);

            $_SESSION['id']=$user->user_id;
            $_SESSION['access']=$user->access;
            $_SESSION['email']=$user->email;
            $_SESSION['name']=$user->name;

            if ($_SESSION['url'] == 'http://h-id.ir/account' ||
                Str::contains($_SESSION['url'],'http://h-id.ir/resetpass') ||
                Str::contains($_SESSION['url'],'http://h-id.ir/changepass') ||
                $_SESSION['url'] == 'http://shop.localhost/account' ||
                Str::contains($_SESSION['url'],'http://shop.localhost/resetpass') ||
                Str::contains($_SESSION['url'],'http://shop.localhost/changepass')

            )
            {
//            if ($_SESSION['url'] == 'http://shop.localhost/account' || $this->contains($_SESSION['url'],'http://h-id.ir/resetpass/')){
                return redirect('/');
            }else{
                return redirect($_SESSION['url']);
            }


        }


    }

    public function resetpass()
    {
        if ((!isset($_SESSION['generateRandomString']) &&
            empty($_SESSION['generateRandomString']))){

            return view('resetpass');
        }else{
            return view('delete-token');
        }

    }

    public function ajax_rest_password()
    {

       $email= $_POST['email0'];

       $result_email=User::where('email',$email)->first();

       if ($result_email == null){
           return view('ajax.res-pass-email-not-found');
       }else{

             $_SESSION['generateRandomString']= $this->generateRandomString(20);
///////////////////////////////////database///////////////////////////////////
             User::where('email', $email)->update(
               [
                   'forget_email' => $_SESSION['generateRandomString']
               ]
             );
///////////////////////////////////database///////////////////////////////////
            $_SESSION['change_password_email']=$email;

           return view('ajax.res-pass-email-found');
       }

    }

    public function send_forget_email()
    {
        Mail::send(['html'=>'reset-pass-email'],array(),function (Message $msg) {
            $msg->to($_SESSION['change_password_email'])->
            subject('فراموشی رمز عبور');
        });
    }

    // az email redirect mishe be inja
    public function changepass($code=null)
    {
        // same email account and browser
        if (isset($_SESSION['generateRandomString']) && $code == $_SESSION['generateRandomString']){
            return view('changepass');
        }else{
            //not same email account and browser

            $result=User::where('forget_email',$code)->first();
            if ($result == null){
                return view('delete-token');
            }else{

                $_SESSION['change_password_email']=$result->email;
                return view('changepass');

            }

        }
    }


   private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function cheack_reset_pass(Request $request)
    {
        request()->validate([
            'change_pass_first' => 'required|min:5',
            'change_pass_second' => 'required|min:5|same:change_pass_first',
        ],[
            'change_pass_first.required' =>'رمز عبور نباید خالی باشد',//ارور اختصاصی
            'change_pass_first.min' =>'رمز عبور نباید کمتر از پنج حرف باشد',//ارور اختصاصی
            'change_pass_second.required' =>'رمز عبور مجدد نباید خالی باشد',//ارور اختصاصی
            'change_pass_second.min' =>'رمز عبور مجدد نباید کمتر از پنج حرف باشد',//ارور اختصاصی
            'change_pass_second.same' =>'رمز عبور و رمز عبور مجدد باید یکی باشند',//ارور اختصاصی

        ]);


        User::where('email', $_SESSION['change_password_email'])->update(
            [
                'password' => md5($request->change_pass_first),
                'forget_email' => null
            ]
        );


        unset($_SESSION['change_password_email']);

         $_SESSION['generateRandomString'] =1;

        $taha['change-pass']="رمز عبور شما با موفقیت تغییر یافت .";
        return redirect('/account')->with($taha);
    }

    public function contains($str,$search)
    {
        if (strpos($str, $search) !== false) {
           return true;
        }
        return false;
    }
}
