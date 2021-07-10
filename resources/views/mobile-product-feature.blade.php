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

    {{--<?foreach($iamges as $iamge){?>--}}
    {{--<img src="/images/<?=$iamge->image_url?>">--}}
    {{--<?}?>--}}

    @include('header',['count'=>$count])
    <br>
    <br>

    <div class="fonting text-right container" style="margin-bottom: 7px">

        <a href="/">صفحه اصلی</a>
        <span>/</span>
        <a href="/<?=$ttype?>"><?=defin_type($ttype)?></a>
        <span>/</span>
        <a href="#"><?=$product->title?></a>
    </div>

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

        <br>
        <h5 class="fonting" style="text-align: right;font-size: 100%">رنگ</h5>
        <div class="form-group">
            <select name="color_s" class="form-control m_color fonting" style="direction: rtl">
                <option value="سبز" class="fonting">سبز</option>
                <option value="آبی" class="fonting">آبی</option>
                <option value="قرمز" class="fonting">قرمز</option>
                <option value="مشکی" class="fonting">مشکی</option>
            </select>
        </div>


        <br>
        <h5 class="fonting" style="text-align: right;font-size: 100%">سایز</h5>
        <div class="form-group">
            <select name="size_s" class="form-control m_size fonting" style="direction: rtl">
                <option value="74" class="fonting">74</option>
                <option value="75" class="fonting">75</option>
                <option value="76" class="fonting">76</option>
                <option value="77" class="fonting">77</option>
            </select>
        </div>



            <div style="position: fixed;bottom: 0;width: 100%;left: 0;background-color: #fff;z-index: 1000;
padding: 5px 20px;box-shadow: 0 0 5px silver">
                <button data-idp="<?=$product->product_id?>" class="btn buym btn-success" style="width: 100%">
                    <i style="vertical-align: middle" class="fa fa-shopping-cart fa-2x" aria-hidden="true" ></i>
                    <span style="vertical-align: middle;font-size: 120%" class=" fonting">افزودن به سبد خرید</span>
                </button>
            </div>



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

    <br>



    {{--//////////////////////////////////////////////////////////////////////////////////--}}

    <div class="container fonting section-shadow" style="direction: rtl;text-align: right;width: 95%">
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
        <div class="alert alert-info" style="direction: rtl;width: 95%;margin: auto auto;text-align: center;font-size: 70%">
            <h6 class="fonting">برای این محصول نظری وجود ندارد</h6>
        </div>
        <?}?>
        <br>

        @if(isset($_SESSION['email']))

            <button class="btn btn-info fonting" style="font-weight: normal;position: absolute;right: 10%;padding: 4px 10px">
                <div id="flip1">افزودن نظر</div>

            </button>

            <div id="comment_aleart" class="alert alert-info collapse" style="position: absolute;right: 1px;margin-top: 50px;direction: rtl">
                <span class="fonting" style="font-size: 90%">نظر شما ثبت شد و پس از بررسی در لیست نظرات قرار میگیرد.</span>
            </div>

            <br>
            <div style="margin-top: 4px;">
                <div id="panel2">
                    <div class="form-group" style="direction: rtl">
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

    <div class="container fonting section-shadow" style="width: 95%">
        <div style="font-size: 110%;text-align: right;color: red;direction: rtl;"
             class="fonting featurepage1">محصولات مشابه</div>


        <br>

        <div class="slider" id="slider" style="scrollbar-width: none;width: 100%">
            <div class="slide" id="slide">


                <? foreach ($sames as $product1){ ?>

                <div class="card mycart">
                    <a href="/product/<?=replace_alling($product1->title)?>">
                        <img class="card-img-top" src="/images/<?=$product1->image?>" style="height: 170px;object-fit: contain" alt="<?=$product1->description?>">
                        <div class="card-body">
                            <p class="card-text fonting"><?=$product1->title?></p>
                            <p class="card-text fonting" style="direction: rtl">
                                <?if($product1->takhfif > 0){?>
                                <span style="background-color: red;color: white;border-radius: 100px;padding: 2px 4px;font-size: 90%;font-weight: bold">%<?=$product1->takhfif?></span>
                                <?}?>
                                <span><?=number_format($product1->price- ($product1->takhfif / 100*$product1->price))?></span> <span>تومان</span>

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


@section('js')
    <script src="/js/comment.min.js?vmn"></script>
    <script src="/js/feature-page.min.js"></script>
    <script src="/js/add-cart-m.min.js?mb"></script>

@endsection