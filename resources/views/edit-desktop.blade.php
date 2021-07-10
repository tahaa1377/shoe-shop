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


    {{--@include('header',['count'=>$count])--}}
    <?=$product->color?>
    <?=$product->size?>

    <br>

    <div class="container section-shadow" >
        <div class="row">

            <div class="col-md-5" >
                {{--<input type="hidden" id="product_id" value="<?=$product->product_id?>">--}}
                <? if ($product->available == 0){?>
                <div class="fonting my-card " style="direction: rtl;text-align: right;">
                    <h3><?=$product->title?></h3>
                    <div>برند: nike</div>
                    <br>
                    <br>
                    <div style="font-size: 110%;color: red">ناموجود در انبار</div>
                </div>
                <?}else{ ?>
                <form action="/carting" method="post">
                @csrf

                <div class="fonting my-card " style="direction: rtl;text-align: right;">

                    <input type="hidden" name="wh_order" value="<?=encode($product->order_id)?>">

                    <h1 style="font-size: 180%"><?=$product->title?></h1>
                    <div>برند: nike</div>
                    <hr>

                    <div style="display: inline-block;font-size: 120%">رنگ: </div>
                    <br>
                    <div class="form-group s_color" style="display: inline-block">
                        <div class="custom-control custom-radio" style="display: inline-block">
                            <input type="radio" id="c1" name="wh_color" class="custom-control-input" checked="" value="سبز">
                            <label class="custom-control-label" for="c1">سبز</label>
                        </div>
                        &nbsp;
                        <div class="custom-control custom-radio" style="display: inline-block">
                            <input type="radio" id="c2" name="wh_color" class="custom-control-input" value="آبی">
                            <label class="custom-control-label" for="c2">آبی</label>
                        </div>
                        &nbsp;
                        <div class="custom-control custom-radio" style="display: inline-block">
                            <input type="radio" id="c3" name="wh_color" class="custom-control-input" value="قرمز">
                            <label class="custom-control-label" for="c3">قرمز</label>
                        </div>
                    </div>
                    <br>
                    <div style="display: inline-block;font-size: 120%">سایز: </div>
                    &nbsp;<br>
                    <div>
                        <div class="form-group s_size" style="display: inline-block">

                            <div class="custom-control custom-radio" style="display: inline-block">
                                <input type="radio" id="s1" name="wh_size" class="custom-control-input" value="46" checked="">
                                <label class="custom-control-label" for="s1">46</label>
                            </div>
                            &nbsp;
                            <div class="custom-control custom-radio" style="display: inline-block">
                                <input type="radio" id="s2" name="wh_size" class="custom-control-input" value="47">
                                <label class="custom-control-label" for="s2">47</label>
                            </div>
                            &nbsp;
                            <div class="custom-control custom-radio" style="display: inline-block">
                                <input type="radio" id="s3" name="wh_size" class="custom-control-input" value="45">
                                <label class="custom-control-label" for="s3">45</label>
                            </div>
                            &nbsp;
                            <div class="custom-control custom-radio" style="display: inline-block">
                                <input type="radio" id="s4" name="wh_size" class="custom-control-input" value="44">
                                <label class="custom-control-label" for="s4">44</label>
                            </div>
                            &nbsp;
                            <div class="custom-control custom-radio" style="display: inline-block">
                                <input type="radio" id="s5" name="wh_size" class="custom-control-input" value="43">
                                <label class="custom-control-label" for="s5">43</label>
                            </div>
                            &nbsp;

                        </div>
                    </div>

                    <div style="font-size: 90%">موجود در انبار </div>
                    <hr>
                    <div style="margin-top: 1px">
                        <span style="font-size: 90%">قیمت :</span>

                        <?if($product->takhfif != 0){?>
                        <div style="text-align: right;margin-right: 70px;">
                            <span style="background-color: red;color: white;border-radius: 40px;padding: 2px;font-size: 90%;font-weight: bold">%<?=$product->takhfif?></span>
                        </div>
                        <span style="font-size: 120%;color: red;text-decoration: line-through" ><?=number_format($product->price)?></span>&nbsp;تومان
                        <?}?>
                        &nbsp;&nbsp;
                        <span style="font-size: 130%;color: black" ><?=number_format($product->price- ($product->takhfif / 100*$product->price))?></span>&nbsp;تومان
                    </div>

                </div>
                <br>
                <br>

                <button type="submit"  class="btn buyi btn-success" style="position: absolute;bottom: 0;right: 5%;width: 70%">
                    <span style="vertical-align: middle;font-size: 120%" class=" fonting">اعمال تغییرات</span>
                </button>

                </form>
                <?} ?>


            </div>
            <div class="col-md-1" style="position: relative">
                <div class="vl"></div>

            </div>

            <div class="col-md-6">
                {{--<?foreach($iamges as $iamge){?>--}}
                {{--<img src="/images/<?=$iamge->image_url?>" alt="">--}}
                {{--<?}?>--}}


                <div class="my-card">
                    <div class="top-section">
                        <img id="image-container" src="/images/<?=$product->image?>" alt="<?=$product->description?>">
                        <div class="my-nav">
                            <img onclick="change_img(this)" src="/images/<?=$product->image?>" alt="<?=$product->description?>">
                            <img onclick="change_img(this)" src="/images/1597567669.jpg" alt="">
                            <img onclick="change_img(this)" src="/images/1597605099.jpg" alt="">
                            <img onclick="change_img(this)" src="/images/1597605169.jpg" alt="">
                            <img onclick="change_img(this)" src="/images/1597430905.jpg" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="vs">&nbsp;</div>
        <br>

        <div class="fonting" style="direction: rtl;text-align: right">
            <div style="font-size: 130%" class="featurepage">توضیحات :</div>
            <div style="text-align: justify;text-justify: inter-word">ماشین اصلاح « فیلیپس» (Philips) مدل « S1323/41» از ریش‌تراش‌هایی است که از برش چرخشی برای اصلاح دقیق و سریع موی صورت استفاده می‌کند. علاوه بر سری اصلی، یک خط‌زن برای اصلاح خط ریش و مرتب‌کردن ریش و سبیل وجود دارد. این دستگاه به صورت بی‌سیم کار می‌کند و از باتری قابل شارژ بهره می‌برد. برای شارژ باتری باید آداپتور ارائه‌شده را مستقیماً به خود دستگاه وصل کرد. تیغه‌های چرخان ریش‌تراش شناورند و هنگام اصلاح روی صورت می‌نشینند و موها را از ته قطع می‌کنند. قسمت سری ماشین اصلاح صورت S1323/41 را می‌توان زیر شیر آب گرفت و خرده موهای روی آن را شست. طراحی بدنه‌ی ماشین اصلاح ارگونومیک است و وزن سبک آن باعث‌ می‌شود در حین کار با دستگاه خسته نشوید و تجربه‌ی مطلوبی از اصلاح داشته باشید. شما با 1 ساعت شارژ می‌توانید از این مدل تا 45 دقیقه استفاده کنید. از دیگر ویژگی‌های این مدل شارژ سریع در 5 دقیقه است. این ماشین اصلاح به تیغه های خود تیز شونده مجهز شده است.
            </div>
        </div>
    </div>

    <script type="text/javascript">
        let container = document.getElementById("image-container");
        function change_img(image) {
            container.src = image.src;
        }
    </script>
@endsection
@section('css')
    <style>
        body{
            background: #f5f5f5;
        }
    </style>
@endsection