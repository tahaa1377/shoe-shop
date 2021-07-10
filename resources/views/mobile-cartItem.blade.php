
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

@section('section')


    @include('header-cart')
    <br>
    <br>

    <h1 class="fonting" style="font-size: 170%;display: inline">سبد خرید</h1>
    <?if(count($products) != 0){?>
    <div style="display: inline;position: absolute;left: 2px;top: 100px">
        <a style="text-decoration-line: none" href="/">
            <button  type="button" class="btn btn-outline-dark fonting" style="font-size: 70%">بازگشت به فروشگاه</button>
        </a>
    </div>
    <?}?>
    <?if(count($products) != 0){?>



<?$total_price=0;
foreach ($products as $product){?>
<div class="container section-shadow-cart fonting" style="width: 95%;margin-bottom: 10px">

    <div class="row_responsive">
        <div class="colx-5" style="text-align: right;vertical-align: middle;">

            <div data-idp="<?=$product->order_id?>" class="trash_m" style="float: left;margin-top: -9px">
                <i style="font-size: 120%;padding: 5px" class="fa fa-trash fa-x"></i>
            </div>

            <div style="margin-top: 0;font-size: 90%">
                <div  style="font-weight: bold;"><?=$product->title?></div>
                <div  style="font-weight: bold;"><span style="font-size: 95%">سایز : </span><?=$product->size?></div>
                <div  style="font-weight: bold;"><span style="font-size: 95%">رنگ : </span><?=$product->color?></div>
                <a href="/edit-product/<?=encode($product->order_id)?>">ویرایش</a>
            </div>

<hr>
            <div style="font-weight: bold;">
                <span style="font-size: 90%">قیمت :</span>
                <?=number_format($product->price- ($product->takhfif / 100*$product->price))?>
                <span style="font-size: 85%">تومان</span>
                <input type="hidden" class="pricec_i" value="<?=($product->price- ($product->takhfif / 100*$product->price))?>">
            </div>

            <div  style="font-weight: bold;">
                <span style="font-size: 90%">قیمت کل :</span>
                <span class="pricetotalc">
                  <?=number_format($product->quantity*($product->price- ($product->takhfif / 100*$product->price)))?>
                </span>
                <span style="font-size: 85%">تومان</span>
                <input type="hidden" class="pricetotalc_i" value="<?=($product->quantity*($product->price- ($product->takhfif / 100*$product->price)))?>">
            </div>

        </div>

        <div class="colx-3" >

            <img style="max-width: 95%;max-height: 80px;width: auto;height: auto" src="/images/<?=$product->image?>"  alt="<?=$product->description?>">
            <br>
            <br>
            <div style="margin-left: 15px;">
                <div style="font-weight: bold;">
                    تعداد
                </div>
                <div style="border: 1px solid #cdcdcd;border-radius: 5px;padding: 5px 10px">
                    <span class="plus_m" data-id="<?=$product->order_id?>" style="float: right;padding: 2px"><i style="font-size: 105%;vertical-align: middle" class="fa fa-plus"></i></span>
                    <span class="value_m"><?=$product->quantity?></span>
                    <span class="minus_m" data-id="<?=$product->order_id?>" style="float: left;padding: 2px"><i style="font-size: 117%;vertical-align: middle" class="fa fa-minus"></i></span>
                </div>

            </div>

        </div>

    </div>




</div>

<?
    $total_price+=($product->quantity*($product->price- ($product->takhfif / 100*$product->price)));
    $_SESSION['price']=$total_price;
}?>

    <div class="container section-shadow-cart-pay" style="width: 95%;">
        <div style="">
            <span id="total" class="fonting" style="position: absolute;right: 20px"> قیمت نهایی :  <?=number_format($total_price)?>  <span>تومان</span></span>
        </div>
        <br>
        <br>

        <?if(isset($_SESSION['id']) && !empty($_SESSION['id'])){?>
        @if($total_price>0)
            <div class="updatePrice" style="position: absolute;right: 20px;bottom: 4px">

                <a href="{{route('bank')}}">
                    <button  type="button" class="btn btn-danger" style="vertical-align: middle">
                        <i class="fa fa-credit-card"></i>&nbsp;&nbsp;
                        <span class="fonting">پرداخت</span></button>
                </a>

            </div>
        @else
            <div style="position: absolute;right: 20px;bottom: 4px">
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
            <div class="updatePrice2" style="position: absolute;right: 20px;bottom: 4px;padding-top: 20px">

                <button id="pay_error"  type="button" class="btn btn-danger" style="vertical-align: middle">
                    <i class="fa fa-credit-card"></i>&nbsp;&nbsp;
                    <span class="fonting">پرداخت</span></button>
            </div>

            <div id="aaleart" class="alert alert-danger collapse" style="position: absolute;margin-top: 20px;direction: rtl;z-index: 1000">
                <span class="fonting">برای تکمیل خرید وارد سیستم شوید یا ثبت نام کنید.</span>
            </div>

            <a href="/account" style="position: absolute;right: 130px;bottom: 4px">
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

    <?}else{?>
    <br>
    <br>
        <h4 class="fonting" style="color: red">سبد خرید شما خالی است</h4>
    <a href="/">
        <button  type="button" class="btn btn-primary fonting">بازگشت به فروشگاه</button>
    </a>
    <br>
    <br>
    <?}?>
@endsection

@section('css')
<style>
    body{
        background: #f5f5f5;
    }
</style>
@endsection

@section('js')
    <script src="/js/mcartItem.min.js?bb"></script>
@endsection