<?

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mobile_Detect;

class HomeController extends Controller
{
    public function main(){

        $data['count']=$this->show_count_oder();
        $url=url()->current();

        $arr=explode('/',$url);

        if (isset($arr[3]) && ($arr[3] == 'baby' || $arr[3] == 'sport' || $arr[3] == 'man' || $arr[3] == 'woman') ){
            $type=$arr[3];
            $_SESSION['pro-type']=$type;
        }else{
            return redirect('/');
        }


        $detect = new Mobile_Detect();

        if ( $detect->isMobile() || $detect->isTablet()) {
            $count=6;
        }else{
            $count=12;
        }
        if (isset($_SESSION['type']) && $_SESSION['type'] != 'grid'){
            $count=6;
        }
        //////////////////////////////////////////pagination
        $startIndex= 1;

        $pageIndex=($startIndex-1)*$count;

        $result=DB::select("SELECT COUNT(*) AS total FROM `products` where `type`=?",array($type));
        $data['counts']=ceil($result[0]->total / $count);

        $data['products']=DB::select("SELECT * FROM `products` where `type`=? LIMIT ?,?",
                                                                            array($type,$pageIndex,$count));
        //////////////////////////////////////////pagination

//        if (!isset($_SESSION['id'])){
//
//            $result2 = DB::table('carts')->where([
//                ['sessionId', session_id()],
//                ['payed',0],
//            ])->first();
//
//
//            if ($result2 != null){
//
//                $total = DB::select("SELECT COUNT(*) AS total FROM `orders` WHERE `cart_id`=?", array($result2->cart_id));
//                $data['counting']=$total[0]->total;
//            }else{
//                $data['counting']=0;
//            }
//
//        }else {
//
//            $result1 = DB::table('carts')->where([
//                ['user_id', $_SESSION['id']],
//                ['payed',0],
//            ])->first();
//
//            if ($result1 != null){
//
//                $total = DB::select("SELECT COUNT(*) AS total FROM `orders` WHERE `cart_id`=?", array($result1->cart_id));
//                $data['counting']=$total[0]->total;
//            }else{
//
//                $result3 = DB::table('carts')->where([
//                    ['sessionId', session_id()],
//                    ['payed',0],
//                ])->first();
//
//                if ( $result3 != null){
//
//
//                    $total = DB::select("SELECT COUNT(*) AS total FROM `orders` WHERE `cart_id`=?", array($result3->cart_id));
//
//                    $data['counting']=$total[0]->total;
//                }else{
//                    $data['counting']=0;
//                }
//
//
//            }
//
//        }
        $data['pageIndex']=$startIndex;

        if ( $detect->isMobile() || $detect->isTablet()) {

            $_SESSION['type']='linear';
            $_SESSION['dota']='na';
        }else{
            //$_SESSION['type']='grid';
            $_SESSION['dota']='are';

        }



        return view('main-grid',$data);

    }

    public function search(){
        $word=$_POST['words'];
        $type=$_POST['typing'];
        $page=$_POST['page'];
        $word="%$word%";
//////////////////////////////////////pagination
        if ($page == 0){
            $startIndex=1;
        }else {
            $startIndex = $page;
        }
        if ($type != 'grid'){
            $count=6;
        }else{
            $count=12;
        }
        $pageIndex=($startIndex-1)*$count;
        $result=DB::select("SELECT COUNT(*) AS total FROM `products` WHERE `type`=? and title LIKE ?",array($_SESSION['pro-type'],$word));
        $data['counts']=ceil($result[0]->total / 12);
        $data['pageIndex']=$startIndex;
//////////////////////////////////////pagination
        if ($_SESSION['type'] == "grid"){
            $_SESSION['type']='grid';

            $data['products']=DB::select("SELECT * FROM `products` WHERE `type`=? and title LIKE ? LIMIT ?,?",[$_SESSION['pro-type'],$word,$pageIndex,$count]);
            return view('ajax.search',$data);
        }else{
            $_SESSION['type']='linear';

            $data['products']=DB::select("SELECT * FROM `products` WHERE `type`=? and title LIKE ? LIMIT ?,?",[$_SESSION['pro-type'],$word,$pageIndex,$count]);
            return view('ajax.search-linear',$data);
        }

    }



    public function pageination(){

        $page= $_POST['page'];

        $detect = new Mobile_Detect();

        if ( $detect->isMobile() || $detect->isTablet()) {
            $count=6;
        }else{
            $count=12;
        }
        if (isset($_SESSION['type']) && $_SESSION['type'] != 'grid'){
            $count=6;
        }
        $pageIndex=($page-1)*$count;

        $result=DB::select("SELECT COUNT(*) AS total FROM `products` WHERE `type`=?",array($_SESSION['pro-type']));
        $data['counts']=ceil($result[0]->total / $count);

        $data['products']=DB::select("SELECT * FROM `products`  WHERE `type`=? LIMIT ?,?",array($_SESSION['pro-type'],$pageIndex,$count));
        $data['pageIndex']=$page;

        if ($_SESSION['type']=='grid'){
            return view('ajax.search',$data);
        }else{
            return view('ajax.search-linear',$data);
        }

    }

    public function select(){
        $word=$_POST['words'];

        $startIndex= 1;
        $detect = new Mobile_Detect();

        if ( $detect->isMobile() || $detect->isTablet()) {
            $count=6;
        }else{
            $count=12;
        }
        if ($word != 'grid'){
            $count=6;
        }
        $pageIndex=($startIndex-1)*$count;

        $result=DB::select("SELECT COUNT(*) AS total FROM `products` WHERE `type`=?",array($_SESSION['pro-type']));

        $data['counts']=ceil($result[0]->total / $count);

        $data['products']=DB::select("SELECT * FROM `products` WHERE `type`=? LIMIT ?,?",array($_SESSION['pro-type'],$pageIndex,$count));

        $data['pageIndex']=$startIndex;
        if ($word=='grid'){
            $_SESSION['type']='grid';
            return view('ajax.search',$data);
        }else{
            $_SESSION['type']='linear';
            return view('ajax.search-linear',$data);
        }

    }


    public function taha(){
        $word=$_REQUEST['words'];
        $data['products']=DB::select("SELECT * FROM `products` ORDER BY price ?",[$word]);
        return view('ajax.search',$data);

    }

    public function cart(){
        $result=$this->get_last_cart_id_or_create();
       // $result=$this->optimize_get_last_cart_id_or_create();

        $data['products']=DB::select("SELECT * FROM `orders` LEFT OUTER JOIN  `products` on orders.product_id=products.product_id WHERE orders.cart_id=?",
                    //array($result));
                    array($result[0]->cart_id));

        return view('cart',$data);
    }


    public function cart_main(){
        $detect = new Mobile_Detect();

        if ($detect->isMobile() || $detect->isTablet()) {

            //return view("mobile-cartItem");

        }else{
            $result=$this->get_last_cart_id_or_create();
            // $result=$this->optimize_get_last_cart_id_or_create();

            $data['count']=DB::table('orders')->where('cart_id',$result[0]->cart_id)->get()->sum('quantity');

            $data['products']=DB::select("SELECT * FROM `orders` LEFT OUTER JOIN  `products` on orders.product_id=products.product_id WHERE orders.cart_id=?",
                //array($result));
                array($result[0]->cart_id));


            return view('main.cart-main',$data);
        }


    }

    public function addToCart(){
        $word=$_POST['words'];
        $color=$_POST['colors'];
        $size=$_POST['sizes'];


       $result=$this->get_last_cart_id_or_create_user_controller();
      //  $this->optimize_get_last_cart_id_or_create();
        $count=  DB::select("SELECT `quantity`,`order_id` FROM `orders` WHERE `product_id`=? AND `cart_id`=? AND `color`=? AND `size`=? limit 1",array($word,$result[0]->cart_id,$color,$size));
        //$count=  DB::select("SELECT `quantity` FROM `orders` WHERE `product_id`=? AND `cart_id`=?",array($word,$_SESSION['cart_id']));

        if ($count == null){
            DB::insert("INSERT INTO `orders`(`product_id`, `quantity`, `cart_id`, `color`, `size`) VALUES (?,?,?,?,?)",array($word,1,$result[0]->cart_id,$color,$size));
            //DB::insert("INSERT INTO `orders`(`product_id`, `quantity`, `cart_id`) VALUES (?,?,?)",array($word,1,$_SESSION['cart_id']));
        }else{
            DB::update("UPDATE `orders` SET `quantity`=quantity+1 WHERE `order_id`=? limit 1", array($count[0]->order_id));

            //DB::update("UPDATE `orders` SET `quantity`=quantity+1 WHERE `product_id`=? AND `cart_id`=?",array($word,$_SESSION['cart_id']));
        }


     $total=DB::table('orders')->where('cart_id',$result[0]->cart_id)->get()->sum('quantity');

        //$total=DB::select("SELECT COUNT(*) AS total FROM `orders` WHERE `cart_id`=?",array($_SESSION['cart_id']));


        echo json_encode(array('itemCount'=>$total));


    }

    public function deleteCart(){
        DB::delete("DELETE FROM `orders` WHERE `order_id`=?",array($_POST['idorder']));

        $result=$this->get_last_cart_id_or_create();


        // $result=$this->optimize_get_last_cart_id_or_create();
        $total=DB::select("SELECT COUNT(*) AS total FROM `orders` WHERE `cart_id`=?",
                                        array($result[0]->cart_id));


         echo json_encode(array('itemCount'=>$total[0]->total));
    }

    public function show_count()
    {
        $result=$this->get_last_cart_id_or_create();

        //$result=$this->optimize_get_last_cart_id_or_create();
        $total=DB::select("SELECT COUNT(*) AS total FROM `orders` WHERE `cart_id`=?",
                                                                //array($result));
                                                                array($result[0]->cart_id));
        echo json_encode(array('itemCount'=>$total[0]->total));

    }


    public function main_page()
    {

//        echo session_id();
//exit();
        $data['count']=$this->show_count_oder();

        $data['mans']=DB::select("SELECT * FROM `products` where type=? ORDER BY `takhfif` DESC LIMIT ?",array('man',13));
        $data['womanss']=DB::select("SELECT * FROM `products` where type=? ORDER BY `takhfif` DESC LIMIT ?",array('woman',13));
        $data['sports']=DB::select("SELECT * FROM `products` where type=? ORDER BY `takhfif` DESC LIMIT ?",array('sport',13));
        $data['babys']=DB::select("SELECT * FROM `products` where type=? ORDER BY `takhfif` DESC LIMIT ?",array('baby',13));
        return view('main.main-page',$data);
    }

    public function search_main_page()
    {
        $value=$_POST['valuew'];

        $value="%$value%";

        $data['results']=DB::select("SELECT * FROM `products` where `title` like ? LIMIT ?",array($value,5));

        return view('ajax.search-main',$data);

    }


    public function product_feature($name)
    {

        $product=DB::table('products')->where('title',$this->replace_alling($name))->first();

//        $iamges=DB::table('images')->where('product_id',$product->product_id)->get();

        $comments=DB::table('comments')->
        leftJoin('users','comments.user_id','=','users.user_id')->
        where([
            ["comments.product_id",$product->product_id],
            ["comments.accept",1]
        ])->get();

        $ttype=$product->type;

        $sames=DB::select("SELECT * FROM `products` where type=? and not product_id=? LIMIT ?",array($product->type,$product->product_id,13));

       $count=$this->show_count_oder();

        $detect = new Mobile_Detect();

        if ( $detect->isMobile() || $detect->isTablet()) {
            return view('mobile-product-feature',compact('product','comments','sames','count','ttype'));
        }else{
            return view('desktop-product-feature',compact('product','comments','sames','count','ttype'));
        }

    }

   public function replace_alling($name){
        $count=count(explode('-',$name));
        return str_replace('-',' ',$name,$count);
    }





    public function count_cart_basket()
    {
        $data['count']=9;
       echo json_encode($data);

    }


    public function carting(Request $request)
    {
        $quantity=0;

        $num_order=$this->decode($request->wh_order);

        $find_info_pro=DB::select("SELECT * FROM `orders` where `order_id`=? limit 1",array($num_order));


        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

         $find_info_pro_id= $find_info_pro[0]->product_id;
         $find_info_pro_cart= $find_info_pro[0]->cart_id;

        $bug_result=DB::select("SELECT * FROM `orders` where `color`=? and `size`=? and cart_id=? and
                                      product_id=? and not order_id=? limit 1",
                                     [$request->wh_color,$request->wh_size,$find_info_pro_cart,
                                         $find_info_pro_id,$num_order]);

        if ($bug_result != null){

            //foreach ($bug_result as $b){

                $quantity+=$bug_result[0]->quantity;

                DB::table('orders')->where('order_id',$bug_result[0]->order_id)->limit(1)->delete();
            //}

        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



        DB::table('orders')->where('order_id',$num_order)->limit(1)->update([
            'color' => $request->wh_color,
            'size'  => $request->wh_size,
            'quantity' =>$quantity + $find_info_pro[0]->quantity
        ]);


        return redirect('/cart');

    }



    public function edit_product_cart($num)
    {


        $num=$this->decode($num);


        $result=DB::select("SELECT * FROM `orders` WHERE order_id=? LIMIT 1",[($num)]);

        if ($result == null){
            return redirect('/cart');
            exit();
        }

        $info_original=$this->get_last_cart_id_or_create();

        // *
        //$info=DB::table('carts')->where('cart_id',$result[0]->cart_id)->first();
        // *



        /// in va * be ham marboot hastan
     //if ( ($info_original[0]->sessionId != $info->sessionId) || ($info_original[0]->user_id != $info->user_id)){

        if ($info_original[0]->cart_id != $result[0]->cart_id){
            return redirect('/cart');
            exit();
        }else{
            $product=DB::table('orders')->leftJoin('products','orders.product_id','=',
                'products.product_id')->where('orders.order_id',$num)->first();

            $detect = new Mobile_Detect();

            if ($detect->isMobile() || $detect->isTablet()) {
                return view('edit-mobile',compact('product'));
            }else{
                return view('edit-desktop',compact('product'));
            }

        }



    }






   private function decode($value) {
        if (!$value) {
            return false;
        }

        $key = sha1('1234567890987654321');
        $strLen = strlen($value);
        $keyLen = strlen($key);
        $j = 0;
        $decrypttext = '';

        for ($i = 0; $i < $strLen; $i += 2) {
            $ordStr = hexdec(base_convert(strrev(substr($value, $i, 2)), 36, 16));
            if ($j == $keyLen) {
                $j = 0;
            }
            $ordKey = ord(substr($key, $j, 1));
            $j++;
            $decrypttext .= chr($ordStr - $ordKey);
        }

        return $decrypttext;
    }






}
