<?
function replace_alling($name){
   return str_replace(' ','-',$name,count(explode(" ",$name)));
}
?>

@extends('app')

@section("section")



    <?
    if (!isset($_SESSION['type'])){
        $_SESSION['type']='grid';
    } ?>
    <div  id="section11">

    </div>

    {{--<div style="z-index: 1001;position: fixed;width: 100%;height: 50px;background-color: #343a40;">--}}

        {{--<div class="btn-group" style="padding: 10px;font-size: 150%;cursor: pointer;position: absolute;right: 1%;top: -5px">--}}
            {{--<span class="cart_counts btn btn-light">--}}
              {{--<?=$counting?>--}}
            {{--</span>--}}

            {{--<span class="btn btn-outline-light fonting sanad">--}}
            {{--<a href="/cart" style="text-decoration: none">--}}
                {{--<span class="sanad">سبد خرید</span>--}}
            {{--</a>--}}
            {{--</span>--}}

            {{--<button id="icon_basket" type="button"--}}
                    {{--class="btn btn-outline-light dropdown-toggle dropdown-toggle-split"--}}
                    {{--aria-haspopup="true" aria-expanded="false">--}}
            {{--</button>--}}
            {{--<div class="dropdown-menu" >--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div id="cart" >--}}
            {{--<span id="tbag" style="overflow-y: scroll;"></span>--}}
        {{--</div>--}}


        {{--<div style="float: left">--}}
            {{--<? if (isset($_SESSION['id'])){ ?>--}}
                {{--&nbsp;--}}
            {{--<a href="/logout"><button style="margin-top: 7px" type="button" class="btn btn-outline-light fonting">خروج</button></a>--}}
                {{--@if($_SESSION['access'] == 'modir')--}}
                    {{--<a href="/admmiin_pages_G"><button style="margin-top: 7px" type="button" class="btn btn-outline-light fonting">پنل مدیریت</button></a>--}}
                {{--@endif--}}

            {{--<?}else{?>--}}
            {{--&nbsp;--}}
            {{--<a href="/account"> <span style="margin-top: 7px" class="btn btn-outline-light fonting"> <span>حساب کاربری</span></span></a>--}}
            {{--<?}?>--}}

        {{--</div>--}}
    {{--</div>--}}
    <div id="all">
        @include('header',['count'=>$count])
        <div class="row_responsive">
        <div class="colx-0 colm-fill cols-fill">
        <br>
        </div>
        </div>

        {{--<button class="fonting btn-primary btn" style="margin-bottom: 7px">--}}
            {{--<a href="/">صفحه اصلی</a>--}}
        {{--</button>--}}
        <br>
    <div class="container" style="margin-top: -15px;">
        <div class="row">

@if($_SESSION['dota'] != 'na')
            <div id="icons" class="col-10 col-sm-5 col-md-3 col-lg-3 ">
                      <span id="linear" data-type="linear"><button type="button" class="btn btn-outline-dark">
                           <i class="fa fa-align-justify" aria-hidden="true"></i></button>
                      </span>
                <span id="grid" data-type="grid"><button type="button" class="btn btn-outline-dark">
                        <i class="fa fa-th" aria-hidden="true"></i></button>
                      </span>
            </div>

@endif

    <input id="xxxx" type="hidden" value="grid">

<div class="col-sm-1 col-md-1 col-lg-5"></div>

            <div class="col-12 col-sm-10 col-md-10 col-lg-3">
                <input id="search" type="search" class="form-control fonting" style="direction: rtl"
                       placeholder="جستجو...">
                &nbsp;
            </div>

        </div>
    </div>






    <div id="messageshow">

    </div>

    <div id="products" style="margin: auto auto" >

        <? if ($_SESSION['type'] == 'grid'){ ?>
        <div class="container">
            <div class="row ">
                <? foreach ($products as $product){ ?>
                <div class="col-md-3 col-sm-4 col-12">
                    <a href="/product/<?=replace_alling($product->title)?>">
                    <div class="tpanels">


                        @if($product->takhfif == 0)
                            {{--<span  style="z-index: 100;position: absolute;top:10px;left: 0;background-color: orange;padding: 4px 6px;border-bottom-right-radius: 14%;border-top-right-radius: 14%;color: white;font-size: 90%" class="fonting">فروشی</span>--}}
                        @else
                            <span  style="z-index: 100;position: absolute;top: 9px;left: 0;background-color: green;padding: 4px 6px;border-bottom-right-radius: 14%;border-top-right-radius: 14%;color: white;font-size: 90%" class="fonting">فروش ویژه</span>
                        @endif

                        {{--<a href="/comments/<?=$product->product_id?>" >--}}
                            {{--<span class="like">--}}
                                {{--<i style="color: white" class="fa fa-comments" aria-hidden="true"></i>--}}
                            {{--</span>--}}
                        {{--</a>--}}





                        <div>
                            <div style="margin: 50px 0 20px 0">
                                <img style="object-fit: contain;width: 95%;max-height: 47%;position: absolute;top: 25px;margin: auto;left: 0;right: 0" src="/images/<?=$product->image?>" alt="<?=$product->description?>">
                            </div>
                        </div>
<div style="position: absolute;top: 120px;width: 100%">
  &nbsp;
</div>

                        <div style="position: absolute;bottom: 20px;left: 0;right: 0;margin: auto">
                            <div style="margin-top: 5px;font-size: 120%;color: black" class="fonting">
                                <?=$product->title?>
                            </div>

                            <div style="margin-top: 5px;direction: rtl">
                                <?if($product->takhfif!=0){?>
                                <div>
                                    <span style="font-size: 120%;color: brown;text-decoration: line-through;direction: rtl"><?=number_format($product->price)?></span>
                                    <span style="direction: rtl;color: #060606" class="fonting">تومان</span>
                                </div>
                                    <?}?>


                                <span style="font-size: 130%;color: black" ><?=number_format($product->price- ($product->takhfif / 100*$product->price))?></span>
                                    <span style="direction: rtl;color: #060606" class="fonting">تومان</span>
                            </div>

                        </div>




                        {{--<button data-idp="<?=$product->product_id?>"--}}
                                {{--style="padding: 3px 25px;position: absolute;bottom: 10px;left: 0;right: 0;margin: auto auto;"--}}
                                {{--type="button" class="btn btn-outline-success btn-lg buy">--}}

                                {{--<i style="vertical-align: middle" class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;<span style="vertical-align: middle" class="fonting">خرید</span>--}}
                        {{--</button>--}}
                    </div> </a>

                </div>
                <?}?>

            </div>
        </div>
        <?}else{?>
        <div class="container">
            <div class="row">
                <? foreach ($products as $product){ ?>
                    <div class="col-md-12" >
                        <div class="tpanels-lin">
                            <div>
                                <div style="position: relative">
                                    <img style="object-fit: contain;width: 240px;height: 180px;float: right;margin: 5px 5px;margin-right: 30px" src="/images/<?=$product->image?>" alt="<?=$product->description?>">
                                </div>
                            </div>

                            <div >

                                <div style="margin-top: 20px">
                                    <div style="margin-top: 5px;font-size: 180%;text-align: right" class="fonting">
                                        <?=$product->title?>&nbsp;&nbsp;
                                    </div>
                                    <div style="margin-top: 5px;font-size: 140%;color: darkblue;text-align: right"  class="fonting" >
                                        <i><?=$product->description?></i>&nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div style="margin-top: 5px;text-align: right;direction: rtl">
                                        <?if($product->takhfif!=0){?>
                                            &nbsp;&nbsp;
                                        <span style="font-size: 140%;text-decoration: line-through;color: brown"><?=number_format($product->price)?></span>
                                            <span style="direction: rtl;color: #060606" class="fonting">تومان</span>


                                        <?}?>
                                            &nbsp;
                                        <span style="font-size: 140%"><?=number_format($product->price- ($product->takhfif / 100*$product->price))?></span>
                                            <span style="direction: rtl;color: #060606" class="fonting">تومان</span>

                                            &nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                                <div style="text-align: right">

                                    <div>


                                    {{--<button  data-idp="<?=$product->product_id?>"  type="button" class="btn btn-outline-success  buy">--}}
                                        {{--<i    style="vertical-align: middle" class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;--}}
                                        {{--<span  class="fonting">خرید</span>--}}
                                    {{--</button>--}}


                                    {{--<a href="/comments/<?=$product->product_id?>"><button  type="button" class="btn btn-outline-dark fonting">نظرات</button></a>--}}
                                        <a style="text-decoration-line: none" href="/product/<?=replace_alling($product->title)?>">
                                            <span class="btn btn-outline-info fonting">توضیحات</span>&nbsp;&nbsp;
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <?}?>

            </div>
        </div>
        <?}?>
        {{--////////////////////////--}}
        <a href="#section11" style="text-decoration: none">
            <span data-pageination="1" class="btn btn-secondary pageination">1</span>
        </a>&nbsp;
        <div class="btn-group mr-2" role="group" aria-label="First group">

            <?for ($i=$pageIndex-3;$i<=$pageIndex+3;$i++){?>

            <? if ($i <= 1)  { continue;}?>
            <?  if ($i >= $counts){ continue;}?>

            <? if ($pageIndex == $i){ ?>
            <a href="#section11">
                <span class="btn btn-light"><?=$i?></span>
            </a>
            <?}else{?>
            <a href="#section11">
                <span data-pageination="<?=$i?>" class="btn btn-secondary pageination"><?=$i?></span>
            </a>
            <?}

            }?>

        </div>
        <?if($counts != 1){?>
        <a href="#section11">
            <span data-pageination="<?=$counts?>" class="btn btn-secondary pageination"><?=$counts?></span>
        </a>
        <?}?>
        {{--//////////////////////--}}
    </div>

    <br>
    <br>
    </div>


@endsection

@section("js")
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/main.min.js?z"></script>
    <script src="/js/main2.min.js?oi"></script>

@endsection

