<?php
function timeAgo($date){
    date_default_timezone_set('Asia/Tehran');
    $seconds= time() - strtotime($date);
    $minutes=round($seconds / 60);
    $hours=round($seconds/3600);
    $day=round($seconds/86400);
    $mounth=round($seconds/2592000);
    $year=round($seconds/31104000);
    if ($seconds == 0){
        return "همین الان";
    }else if ($seconds <= 60){
        return $seconds.' ثانیه پیش';
    }else if ($minutes<=60){
        return $minutes.' دقیقه پیش';
    }else if ($hours <= 24){
        return  $hours.' ساعت پیش';
    }else if ($day <= 30){
        return $day.' روز پیش';
    }else if ($mounth < 12){
        return $mounth.' ماه پیش';
    }else{
        return $year.' سال پیش';
    }
}

function replace_alling($name){
    return str_replace(' ','-',$name,count(explode(" ",$name)));
}

function defin_type($type){
    if ($type == 'man'){
        return "مردانه";
    }elseif ($type == 'woman'){
        return "زنانه";
    }elseif ($type == 'sport'){
        return "اسپورت";
    }elseif ($type == 'baby'){
        return "بچه گانه";
    }
}
?>


@extends('app')

@section('section')

    <div id="all">

        @include('header',['count'=>$count])

        <br>
        <div class="fonting text-right container" style="margin-bottom: 7px">

            <a href="/">صفحه اصلی</a>
            <span>/</span>
            <a href="/<?=$ttype?>"><?=defin_type($ttype)?></a>
            <span>/</span>
            <a href="#"><?=$product->title?></a>
        </div>

        <div class="container section-shadow" >
            <div class="row">

                <div class="col-md-5" >
                    <input type="hidden" id="product_id" value="<?=$product->product_id?>">
                    <? if ($product->available == 0){?>
                        <div class="fonting my-card " style="direction: rtl;text-align: right;">
                        <h1><?=$product->title?></h1>
                        <div>برند: nike</div>
                            <br>
                            <br>
                        <div style="font-size: 110%;color: red">ناموجود در انبار</div>
                        </div>
                  <?}else{ ?>
                        {{--<form action="/carting" method="post">--}}


                            <div class="fonting my-card " style="direction: rtl;text-align: right;">


                                <h1 style="font-size: 180%"><?=$product->title?></h1>
                                <div>برند: <span style="color: darkcyan">nike</span></div>
                                <hr>

                                <div style="display: inline-block;font-size: 120%">رنگ: </div>
                                <br>
                                <div class="form-group s_color" style="display: inline-block">
                                    <div class="custom-control custom-radio" style="display: inline-block">
                                        <input type="radio" id="c1" name="wh_color" class="custom-control-input"  value="سبز">
                                        <label class="custom-control-label" for="c1">سبز</label>
                                    </div>
                                    &nbsp;
                                    <div class="custom-control custom-radio" style="display: inline-block">
                                        <input type="radio" id="c2" name="wh_color" class="custom-control-input" checked="" value="آبی">
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
                                        <input type="radio" id="s1" name="wh_size" class="custom-control-input" checked="" value="46">
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

                            <button data-idp="<?=$product->product_id?>" class="btn buyi btn-success" style="position: absolute;bottom: 0;right: 20%">
                                <i style="vertical-align: middle" class="fa fa-shopping-cart fa-2x" aria-hidden="true" ></i>
                                <span style="vertical-align: middle" class=" fonting">افزودن به سبد خرید</span>
                            </button>
                    &nbsp;
                    {{--<div id="aaleart" class="alert alert-success collapse" style="direction: rtl;width: 100%;margin: auto auto;position: absolute;bottom: -50px;right: 0%">--}}
                        {{--<span class="fonting">محصول با موفقیت به سبد خرید اضافه شد.</span>--}}
                    {{--</div>--}}

                        {{--</form>--}}
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

        <br>

        <div class="container fonting section-shadow" style="direction: rtl;text-align: right">
            <div style="font-size: 140%;text-align: right;" class="featurepage">  نظرات :</div>

<br>
            <div>
                <?$countert=0;?>
                @foreach($comments as $comment)
                    <?$countert++;?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header" style="direction: rtl;text-align: justify;text-justify: inter-word">
                                        <?=$comment->name?>&nbsp; <span>میگه :</span>
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0 " style="direction: rtl">
                                            <div style="text-align: justify;text-justify: inter-word" class="fonting"><?=$comment->comment?></div>
                                            <footer class="blockquote-footer fonting" style="direction: rtl"><?=timeAgo($comment->comment_on)?>
                                                <cite title="Source Title"></cite></footer>
                                        </blockquote>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>


                @endforeach
            </div>
            <?if($countert==0){?>
            <div class="alert alert-info" style="direction: rtl;width: 70%;margin: auto auto;text-align: center">
                <h4 class="fonting">برای این محصول نظری وجود ندارد</h4>
            </div>
            <?}?>
            <br>

            @if(isset($_SESSION['email']))

                <button class="btn btn-info fonting" style="font-weight: normal;position: absolute;right: 10%;padding: 5px 10px">
                    <div  id="flip1">افزودن نظر</div>

                </button>

                <div id="comment_aleart" class="alert alert-info collapse" style="position: absolute;right: 80px;margin-top: 50px;direction: rtl">
                    <span class="fonting">نظر شما ثبت شد و پس از بررسی در لیست نظرات قرار میگیرد.</span>
                </div>

                <br >
                <div class="container" style="margin-top: 4px">
                    <div id="panel2">
                        <div class="form-group" style="direction: rtl" >
                            <textarea class="form-control fonting" id="exampleTextarea" rows="3"></textarea>
                        </div>

                    </div>
                </div>
            @else
                <a style="float: right;" href="/account">
                    <span class="btn btn-dark fonting">ورود / ثبت نام</span>
                </a>
                <br>
            @endif


        </div>

        <br>

        <div class="container fonting section-shadow" style="">
            <div style="font-size: 130%;text-align: right;color: red;direction: rtl;"
                 class="fonting featurepage1">محصولات مشابه</div>


            <br>

            <div class="slider scrollbar" id="slider">
                <div class="slide" id="slide">


                    <? foreach ($sames as $product1){ ?>

                    <div class="card mycart">
                        <a href="/product/<?=replace_alling($product1->title)?>">
                            <img class="card-img-top" src="/images/<?=$product1->image?>" style="height: 170px;object-fit: contain" alt="<?=$product1->description?>">
                            <div class="card-body">
                                <p class="card-text fonting"><?=$product1->title?></p>
                                <p class="card-text fonting" style="direction: rtl">
                                <?if($product1->takhfif > 0){?>
                                    <span style="background-color: red;color: white;border-radius: 40px;padding: 2px;font-size: 90%;font-weight: bold">%<?=$product1->takhfif?></span>
                                <?}?>
                                    <span><?=number_format($product1->price)?></span> <span>تومان</span>

                            </div>
                        </a>

                    </div>
                    <? } ?>
                    <a href="/<?=$product->type?>">
                        <div class="card mycart-bishtar" style="width: 15rem;height: 4rem;margin-top: 35%;">

                            <div class="card-body">
                                <i class="fa fa-mail-forward" ></i>
                                <b class="card-text fonting" style="color: #ff163d;">مشاهده محصولات بیشتر</b>
                            </div>
                        </div>
                    </a>

                </div>
                <button class="ctrl-btn pro-prev"><i class="fa carousel-control-prev-icon"></i></button>
                <button class="ctrl-btn pro-next"><i class="fa carousel-control-next-icon"></i></button>
            </div>


        </div>


    </div>



    <script>
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

@section('js')
    <script src="/js/comment.min.js?kj"></script>
    <script src="/js/feature-page.min.js"></script>
    <script src="/js/add-cart.min.js?n"></script>
@endsection







