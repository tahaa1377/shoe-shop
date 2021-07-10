<?
function encode($value) {
    if (!$value) {
        return false;
    }

    $key = sha1('1234567890987654321');
    $strLen = strlen($value);
    $keyLen = strlen($key);
    $j = 0;
    $crypttext = '';

    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($value, $i, 1));
        if ($j == $keyLen) {
            $j = 0;
        }
        $ordKey = ord(substr($key, $j, 1));
        $j++;
        $crypttext .= strrev(base_convert(dechex($ordStr + $ordKey), 16, 36));
    }

    return $crypttext;
}
?>

@extends('app')

@section("section")

    <br>

    <div class="container section-shadow" style="width: 95%">

        <div >
            <h1 style="font-size: 150%;text-align: right;display: inline;float: right" class="fonting"><?=$product->title?></h1>
            &nbsp;
            &nbsp;
            <?if($product->takhfif > 20){?>
            <span class="fonting" style="background-color: #28a745;color: white;border-radius: 30px;
    padding: 2px 4px;font-size: 70%;float: left">تخفیف ویژه</span>
            <?}?>
        </div>

        <br>
        <br>



        <div id="slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
                <li data-target="#slider" data-slide-to="3"></li>
                <li data-target="#slider" data-slide-to="4"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block img-fluid h-75 m-auto" style="width: 80%;object-fit: scale-down" src="/images/<?=$product->image?>" alt="<?=$product->description?>">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid h-75 m-auto" style="width: 80%;object-fit: scale-down" src="/images/1597567182.jpg" alt="">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid h-75 m-auto" style="width: 80%;object-fit: scale-down" src="/images/1597573546.jpg" alt="">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid h-75 m-auto" style="width: 80%;object-fit: scale-down" src="/images/1597605169.jpg" alt="">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid h-75 m-auto" style="width: 80%;object-fit: scale-down" src="/images/1597430905.jpg" alt="">
                </div>
            </div>


        </div>
        <input type="hidden" id="product_id" value="<?=$product->product_id?>">

        {{--//////////////////////////////////////////////////////////////////////////////////--}}

        <? if ($product->available != 0){?>

        <div class="row_responsive">
            <div style="text-align: right;direction: rtl;">

                <div class="cols-3 colm-3">
                    <span class="fonting">برند :</span>
                    <span class="fonting" style="color: darkcyan">nike</span>
                </div>

                <div class="cols-1 colm-1" style="position: relative">
                    <div class="vl"></div>
                </div>
                <div class="cols-4 colm-4">
                    <span class="fonting">موجود در انبار</span>
                </div>

            </div>
        </div>


        <br>

        <div style="direction: rtl" class="fonting">
            <?if($product->takhfif != 0){?>
            <h5 class="fonting" style="text-align: right;direction: rtl;font-size: 100%">قیمت :</h5>
            <div style="text-align: right;direction: rtl">
                <span style="background-color: red;color: white;border-radius: 30px;padding: 2px 4px;font-size: 90%;font-weight: bold">%<?=$product->takhfif?></span>
            </div>
            <span style="font-size: 120%;color: red;text-decoration: line-through" ><?=number_format($product->price)?></span>&nbsp;تومان
            &nbsp;&nbsp;
            <span style="font-size: 130%;color: black" ><?=number_format($product->price- ($product->takhfif / 100*$product->price))?></span>&nbsp;تومان
            <?}else{?>
            <h5 class="fonting" style="text-align: right;direction: rtl;font-size: 100%;float: right;display: inline;margin-left: 20px;vert-align: middle">قیمت :</h5>
            <div style="text-align: right;direction: rtl;">
                <span style="font-size: 130%;color: black;text-align: right;direction: rtl;vert-align: middle" ><?=number_format($product->price)?></span>&nbsp;تومان
            </div>
            <?}?>

        </div>

        <form action="/carting" method="post">
            @csrf
            <input type="hidden" name="wh_order" value="<?=encode($product->order_id)?>">

            <br>
        <h5 class="fonting" style="text-align: right;font-size: 100%">رنگ</h5>
        <div class="form-group">
            <select name="wh_color" class="form-control m_color fonting" style="direction: rtl">
                <option value="سبز" class="fonting">سبز</option>
                <option value="آبی" class="fonting">آبی</option>
                <option value="قرمز" class="fonting">قرمز</option>
                <option selected value="مشکی" class="fonting">مشکی</option>
            </select>
        </div>


        <br>
        <h5 class="fonting" style="text-align: right;font-size: 100%">سایز</h5>
        <div class="form-group">
            <select name="wh_size" class="form-control m_size fonting" style="direction: rtl">
                <option selected value="74" class="fonting">74</option>
                <option value="75" class="fonting">75</option>
                <option value="76" class="fonting">76</option>
                <option value="77" class="fonting">77</option>
            </select>
        </div>



        <div style="position: fixed;bottom: 0;width: 100%;left: 0;background-color: #fff;z-index: 1000;
padding: 5px 20px;box-shadow: 0 0 5px silver">
            <button data-idp="<?=$product->product_id?>" class="btn buym btn-success" style="width: 100%">
                <span style="vertical-align: middle;font-size: 120%" class=" fonting">اعمال تغییرات</span>
            </button>
        </div>

        </form>


        <? }else{?>

        <div class="row_responsive">
            <div style="text-align: right;direction: rtl;">

                <div class="cols-3 colm-3">
                    <span class="fonting">برند :</span>
                    <span class="fonting" style="color: darkcyan">nike</span>
                </div>

                <div class="cols-1 colm-1" style="position: relative">
                    <div class="vl"></div>
                </div>
                <div class="cols-4 colm-4">
                    <span class="fonting" style="color: red;font-size: 110%">ناموجود در انبار</span>
                </div>

            </div>
        </div>


        <? }?>
    </div>

@endsection

@section('css')
    <style>



        body{
            background: #f5f5f5;
        }

        .carousel-item {
            height: 250px;
        }

        .carousel-indicators li {
            width: 10px;
            height: 10px;
            border-radius: 100%;
            background-color: grey;
        }
        .carousel-indicators {
            bottom: 5px;
        }




    </style>
@endsection