<?
function replace_alling($name){
    return str_replace(' ','-',$name,count(explode(" ",$name)));
}


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

@section('section')

    @include('header-cart')

    <br>
    <div style="position: absolute;left: 30px">
        <a style="text-decoration-line: none" href="/" >
            <span style="vertical-align: middle" class="btn btn-outline-dark fonting">بازگشت به فروشگاه</span>
        </a>
    </div>
    {{--<div class="row_responsive">--}}
        {{--<div class="colx-fill colm-0 cols-0">--}}
            {{--<br>--}}
        {{--</div>--}}
    {{--</div>--}}
    <h1 class="fonting">سبد خرید</h1>

    <div style="overflow-x:auto;" class="container">
    <table id="tablea" style="width: 100%;margin: auto auto;border-collapse: unset; border-bottom: 1px solid #9caaae;" class="table table-hover">
        <colgroup style="border: 2px solid #636b6f">
            <col style="width: 20%;">
            <col style="width: 5%;">
            <col style="width: 5%;">
            <col style="width: 3%;">
            <col style="width: 3%;">
            <col style="width: 3%;">
            <col style="width: 3%;">
            <col style="width: 1%;">
        </colgroup>

        <tr>
            <th class="fonting" style="vertical-align: middle">تصویر محصول</th>
            <th class="fonting" style="vertical-align: middle">نام محصول</th>
            <th class="fonting" style="vertical-align: middle">تعداد</th>
            <th class="fonting" style="vertical-align: middle">سایز</th>
            <th class="fonting" style="vertical-align: middle">رنگ</th>
            <th class="fonting" style="direction: rtl;vertical-align: middle">قیمت(تومان)</th>
            <th class="fonting" style="vertical-align: middle">قیمت نهایی</th>
            <th class="fonting" style="vertical-align: middle">حذف</th>
        </tr>

        <?$total_price=0;
        foreach ($products as $product){?>
        <tr class="cartItem">

            <td class="padding-0" style="vertical-align: middle">
                <img class="imgc" style="vertical-align: middle" src="/images/<?=$product->image?>"  alt="<?=$product->description?>">
            </td>


            <td style="vertical-align: middle;">

                <div class="titlec " style="font-weight: bold;margin: 10px 0">
                <a style="color: black;text-decoration-line: none;font-weight: bold" href="/product/<?=replace_alling($product->title)?>" class="fonting"><?=$product->title?></a>
                </div>

                <a class="fonting" style="font-size: 95%;vertical-align: middle" href="/edit-product/<?=encode($product->order_id)?>"><span>&DoubleRightArrow;</span>ویرایش </a>
            </td>

            <td style="vertical-align: middle">
                <div >

                    <button data-type="plus" data-id="<?=$product->order_id?>" type="button"
                            class="btn btn-outline-dark btn-sm quantityc">
                        <i class="fa fa-plus"></i></button><br>

                    <span  class="value_quantiti" style="font-weight: bold;width: 60%;font-size: 130%">
                            <?=$product->quantity?></span><br>

                    <button data-type="minus" data-id="<?=$product->order_id?>" type="button"
                            class="btn btn-outline-dark btn-sm quantityc">
                        <i class="fa fa-minus"></i></button>

                </div>


            </td>


            <td style="vertical-align: middle">

                <div class="fonting" style="font-weight: bold;">
                      <span class="fonting"><?=$product->size?></span>
                </div>

            </td>

            <td style="vertical-align: middle">
                <div class="fonting" style="font-weight: bold;">
                    <?=$product->color?>
                </div>
            </td>



            <td style="vertical-align: middle">

                <div class="pricec" style="font-weight: bold;">
                    <?=number_format($product->price- ($product->takhfif / 100*$product->price))?>
                </div>
                <input type="hidden" class="pricec_i" value="<?=($product->price- ($product->takhfif / 100*$product->price))?>">
            </td>

            <td style="vertical-align: middle">

                <div class="pricetotalc" style="font-weight: bold;">
                    <?=number_format($product->quantity*($product->price- ($product->takhfif / 100*$product->price)))?>
                </div>
                <input type="hidden" class="pricetotalc_i" value="<?=($product->quantity*($product->price- ($product->takhfif / 100*$product->price)))?>">

            </td>




            <td style="vertical-align: middle">

            <div class="a">
                <i data-idp="<?=$product->order_id?>" class="fa fa-times-circle"></i>
            </div>
            </td>

        </tr>
        <?
        $total_price+=($product->quantity*($product->price- ($product->takhfif / 100*$product->price)));
        $_SESSION['price']=$total_price;
        }?>

    </table>
    </div>
    <div class="container">


        <div style="margin-top: 10px;margin-bottom: 10px">
            <span id="total" class="fonting" style="border: 1px solid white;padding: 4px 10px;background-color: white;float: right"> قیمت نهایی :  <?=number_format($total_price)?>  <span>تومان</span></span>
        </div>
        <br>
        <br>

        <?if(isset($_SESSION['id']) && !empty($_SESSION['id'])){?>
        @if($total_price>0)
            <div class="updatePrice" style="float: right">

                  <a href="{{route('bank')}}">
                      <span class="btn btn-danger" style="vertical-align: middle">
                          <i class="fa fa-credit-card"></i>&nbsp;&nbsp;
                          <span class="fonting">پرداخت</span></span>
                  </a>

            </div>
            @else
            <div style="float: right">
                <a href="/">
                    <button  type="button" class="btn btn-primary fonting">بازگشت به فروشگاه</button>
                </a>
            </div>

        @endif
        <?}else{?>
        @if($total_price>0)

            {{--<div id="aaleart" class="alert alert-danger collapse" style="position: absolute;right: 50px;margin-bottom: 100px;direction: rtl;z-index: 1000">--}}
                {{--<span class="fonting">برای تکمیل خرید وارد سیستم شوید یا ثبت نام کنید.</span>--}}
            {{--</div>--}}
        <div class="updatePrice2" style="float: right">

                <button id="pay_error"  type="button" class="btn btn-danger" style="vertical-align: middle">
                    <i class="fa fa-credit-card"></i>&nbsp;&nbsp;
                    <span class="fonting">پرداخت</span></button>
        </div>



            <a href="/account" style="float: right;margin-right: 20px">
                <span class="btn btn-primary fonting">ورود / ثبت نام</span>
            </a>

            @else
            <br>
            <br>
            <div style="position: absolute;left: 60px;">
                <a style="text-decoration-line: none" href="/">
                    <button  type="button" class="btn btn-primary fonting">بازگشت به فروشگاه</button>
                </a>

            </div>
        @endif


        <?}?>
    </div>

    <br>
    <br>

@endsection



@section('js')
    <script src="/js/cartItem.min.js?gvn"></script>
@endsection