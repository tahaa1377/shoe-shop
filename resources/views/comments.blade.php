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
?>

@extends('app')

@section("section")
    <br>

    <a style="text-decoration-line: none" href="/<?=$product->type?>">
        <button style="vertical-align: middle;float: left;margin-left: 20px" type="button" class="btn btn-primary fonting">بازگشت به فروشگاه</button>
    </a>



    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-12" >
                <div class="tpanels-lin">
                    <div>
                        <div style="position: relative">
                            <img style="width: 240px;height: 180px;float: right;margin: 5px 5px;margin-right: 30px" src="/images/<?=$product->image?>" alt="<?=$product->description?>">
                        </div>
                    </div>

                    <div>
                        <input type="hidden" id="product_id" value="<?=$product->product_id?>">

                        <div style="margin-top: 20px">
                            <div style="margin-top: 5px;font-size: 180%;text-align: right" class="fonting">
                                <?=$product->title?>&nbsp;&nbsp;&nbsp;
                            </div>
                            <div style="margin-top: 5px;font-size: 140%;color: darkblue;text-align: right"  class="fonting" >
                                <i><?=$product->description?></i>&nbsp;&nbsp;&nbsp;
                            </div>
                            <div style="margin-top: 5px;text-align: right">
                                <?if($product->takhfif!=0){?>
                                <span  style="font-size: 140%;text-decoration: line-through;color: orange"><?=number_format($product->price)?></span>&nbsp;
                                &nbsp;
                                <?}?>
                                <span style="font-size: 140%"><?=number_format($product->price- ($product->takhfif / 100*$product->price))?></span>
                                &nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                        <div style="text-align: right">

                            <button style="padding: 4px 25px;margin-top: 6px" data-idp="<?=$product->product_id?>"  type="button" class="btn btn-outline-success btn-lg buy">
                                <i    style="vertical-align: middle" class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;
                                <span style="vertical-align: middle" class="fonting">خرید</span>

                            </button>
                            &nbsp;

                            <div id="aaleart" class="alert alert-success collapse" style="direction: rtl;width: 70%;margin: auto auto">
                                <span class="fonting">محصول با موفقیت به سبد خرید اضافه شد.</span>
                            </div>
                            &nbsp;
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>


    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h2 style="float: right" class="fonting">نظرات</h2>
        </div>
        </div>
        </div>

<div id="comment_ajax_add_comment">
    <?$countert=0;?>
    @foreach($comments as $comment)
        <?$countert++;?>
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" style="direction: rtl">
                            <?=$comment->name?>&nbsp; <span>میگه :</span>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0 " style="direction: rtl">
                                <span class="fonting"><?=$comment->comment?></span>
                                <footer class="blockquote-footer fonting" style="direction: rtl"><?=timeAgo($comment->comment_on)?>
                                    <cite title="Source Title"></cite></footer>
                            </blockquote>
                        </div>
                    </div>
                    <br>
                </div>
            </div>

        </div>
    @endforeach


</div>

    <?if($countert==0){?>
    <div class="alert alert-info" style="direction: rtl;width: 70%;margin: auto auto">
        <h3 class="fonting">برای این محصول نظری وجود ندارد</h3>
    </div>
    <?}?>
    <br>


    @if(isset($_SESSION['email']))

    <button class="btn btn-info fonting" style="font-weight: normal;position: absolute;right: 10%;padding: 5px 10px">
        <div  id="flip1">افزودن نظر</div>

    </button>

    <div id="comment_aleart" class="alert alert-info collapse" style="position: absolute;right: 50px;margin-top: 50px;direction: rtl">
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
        <a style="float: right;margin-right: 60pt" href="/account">
            <span class="btn btn-dark fonting">ورود / ثبت نام</span>
        </a>
@endif
<?if($countert > 2){?>
    <a style="text-decoration-line: none" href="/">
        <button style="vertical-align: middle;float: left;margin-left: 60pt" type="button" class="btn btn-primary fonting">بازگشت به فروشگاه</button>
    </a>
    <?}?>
    <br>
    <br>
@endsection
@section("js")
    <script src="/js/comment.min.js?b"></script>
@endsection