<?
function replace_alling($name){
    return str_replace(' ','-',$name,count(explode(" ",$name)));
}
?>

@extends('app')

@section("section")

    <div id="all">

        @include('header',['count'=>$count])


  <div class="row_responsive">
      <div class="colx-0 colm-fill cols-fill">
          <br>
      </div>
  </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand fonting" href="#" style="direction: rtl;float: right;text-align: right">
        نوع محصولات</a>

    <button  class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav"
             aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span style="direction: rtl;float: right;text-align: right" class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" style="direction: rtl;float: right;text-align: right">
        <ul class="navbar-nav m-auto fonting">
            <li class="nav-item active" style="margin: 0 20px">
                <a class="nav-link h-titlee" href="/man">
                    <h5 style="font-size: 120%">مردانه</h5>
                </a>
            </li>

            <li class="nav-item active" style="margin: 0 20px">
                <a class="nav-link h-titlee" style="font-weight: bold" href="/woman">
                    <h5 style="font-size: 120%">
                        زنانه
                    </h5>
                </a>
            </li>

            <li class="nav-item active fonting" style="margin: 0 20px">
                <a class="nav-link h-titlee" style="font-weight: bold" href="/sport"><h5 style="font-size: 120%">ورزشی</h5></a>
            </li>

            <li class="nav-item active fonting" style="margin: 0 20px">
                <a class="nav-link h-titlee" style="font-weight: bold;" href="/baby"><h5 style="font-size: 120%">بچه گانه</h5></a>
            </li>



        </ul>
    </div>
</nav>


<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
</ol>
<div class="carousel-inner">
<div class="carousel-item active">
<img style="object-fit: fill" src="/images/a3.jpg" class="d-block w-100 coursel-res"  alt="...">
<div class="carousel-caption d-none d-md-block fonting">
    <h5>سلام گنجی جان</h5>
    <p>سلام گنجی جان</p>
</div>
</div>
<div class="carousel-item">
<img style="object-fit: fill" src="/images/a2.jpg"  class="d-block w-100 coursel-res"  alt="...">
<div class="carousel-caption d-none d-md-block fonting">
    <h5>خدافظ گنجی جان</h5>
    <p>خدافظ گنجی جان</p>
</div>
</div>
<div class="carousel-item">
<img style="object-fit: fill" src="/images/background.jpg" class="d-block w-100 coursel-res"  alt="...">
<div class="carousel-caption d-none d-md-block fonting">
    <h5> گنجی جان</h5>
    <p> گنجی جان</p>
</div>
</div>
</div>
<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>


    <br>
    <br>

<h2 class="titlee fonting">مردانه</h2>

    <br>

<div class="slider scrollbar" id="slider">
    <div class="slide" id="slide">


        <? foreach ($mans as $product){ ?>

        <div class="card mycart">
            <a href="/product/<?=replace_alling($product->title)?>">
            <img class="card-img-top" src="/images/<?=$product->image?>" style="max-height: 170px;object-fit: contain" alt="<?=$product->description?>">
            <div class="card-body" >
                <p class="card-text fonting"><?=$product->title?></p>
                <p class="card-text fonting" style="direction: rtl">
                    <?if($product->takhfif > 0){?>
                    <span style="background-color: red;color: white;border-radius: 100px;padding: 2px 4px;font-size: 90%;font-weight: bold">%<?=$product->takhfif?></span>
                    <?}?>
                    <span><?=number_format($product->price- ($product->takhfif / 100*$product->price))?></span> <span>تومان</span>
            </div>
            </a>

        </div>
            <? } ?>
            <a href="/man">
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

    <br>
    <br>
<h2 class="titlee fonting">زنانه</h2>
<br>


<div class="slider1 scrollbar" id="slider1">
    <div class="slide1" id="slide1">


        <? foreach ($womanss as $product){ ?>

        <div class="card mycart">
            <a href="/product/<?=replace_alling($product->title)?>">
                <img class="card-img-top" src="/images/<?=$product->image?>" style="height: 170px;object-fit: contain" alt="<?=$product->description?>">
                <div class="card-body">
                    <p class="card-text fonting"><?=$product->title?></p>
                    <p class="card-text fonting" style="direction: rtl">
                        <?if($product->takhfif > 0){?>
                        <span style="background-color: red;color: white;border-radius: 100px;padding: 2px 4px;font-size: 90%;font-weight: bold">%<?=$product->takhfif?></span>
                        <?}?>
                        <span><?=number_format($product->price- ($product->takhfif / 100*$product->price))?></span> <span>تومان</span>
                </div>
            </a>

        </div>
        <? } ?>

            <a href="/woman">
                <div class="card mycart-bishtar" style="width: 15rem;height: 4rem;margin-top: 35%;">

                    <div class="card-body">
                        <i class="fa fa-mail-forward" ></i>
                        <b class="card-text fonting" style="color: #ff163d;">مشاهده محصولات بیشتر</b>
                    </div>
                </div>
            </a>

    </div>
    <button class="ctrl-btn pro-prev1 fonting"><i class="fa carousel-control-prev-icon"></i></button>
    <button class="ctrl-btn pro-next1 fonting"><i class="fa carousel-control-next-icon"></i></button>
</div>


    <br>
    <br>

<h2 class="titlee fonting">ورزشی</h2>
<br>

<div class="slider2 scrollbar" id="slider2">
    <div class="slide2" id="slide2">


        <? foreach ($sports as $product){ ?>

        <div class="card mycart">
            <a href="/product/<?=replace_alling($product->title)?>">
                <img class="card-img-top" src="/images/<?=$product->image?>" style="height: 170px;object-fit: contain" alt="<?=$product->description?>">
                <div class="card-body">
                    <p class="card-text fonting"><?=$product->title?></p>
                    <p class="card-text fonting" style="direction: rtl">
                        <?if($product->takhfif > 0){?>
                        <span style="background-color: red;color: white;border-radius: 100px;padding: 2px 4px;font-size: 90%;font-weight: bold">%<?=$product->takhfif?></span>
                        <?}?>
                   <span><?=number_format($product->price- ($product->takhfif / 100*$product->price))?></span> <span>تومان</span>
                    </p>
                </div>
            </a>

        </div>
        <? } ?>

            <a href="/sport">
                <div class="card mycart-bishtar" style="width: 15rem;height: 4rem;margin-top: 35%;">
                    <div class="card-body">
                        <i class="fa fa-mail-forward" ></i>
                        <b class="card-text fonting" style="color: #ff163d;">مشاهده محصولات بیشتر</b>
                    </div>
                </div>
            </a>

    </div>
    <button class="ctrl-btn pro-prev2 fonting"><i class="fa carousel-control-prev-icon"></i></button>
    <button class="ctrl-btn pro-next2 fonting"><i class="fa carousel-control-next-icon"></i></button>
</div>



    <br>
    <br>

        <h2 class="titlee fonting">بچه گانه</h2>
        <br>

        <div class="slider3 scrollbar" id="slider3">
            <div class="slide3" id="slide3">


                <? foreach ($babys as $product){ ?>

                <div class="card mycart">
                    <a href="/product/<?=replace_alling($product->title)?>">
                        <img class="card-img-top" src="/images/<?=$product->image?>" style="height: 170px;object-fit: contain" alt="<?=$product->description?>">
                        <div class="card-body">
                            <p class="card-text fonting"><?=$product->title?></p>
                            <p class="card-text fonting" style="direction: rtl">
                                <?if($product->takhfif > 0){?>
                                <span style="background-color: red;color: white;border-radius: 100px;padding: 2px 4px;font-size: 90%;font-weight: bold">%<?=$product->takhfif?></span>
                                <?}?>
                                <span><?=number_format($product->price- ($product->takhfif / 100*$product->price))?></span> <span>تومان</span>
                            </p>
                        </div>
                    </a>

                </div>
                <? } ?>

                <a href="/baby">
                    <div class="card mycart-bishtar" style="width: 15rem;height: 4rem;margin-top: 35%;">
                        <div class="card-body">
                            <i class="fa fa-mail-forward" ></i>
                            <b class="card-text fonting" style="color: #ff163d;">مشاهده محصولات بیشتر</b>
                        </div>
                    </div>
                </a>

            </div>
            <button class="ctrl-btn pro-prev3 fonting"><i class="fa carousel-control-prev-icon"></i></button>
            <button class="ctrl-btn pro-next3 fonting"><i class="fa carousel-control-next-icon"></i></button>
        </div>



    </div>
@endsection
@section("js")
    <script src="/js/mainPage.min.js?bzm"></script>
@endsection

@section("css")
    <style>
        .mycart{
            border: 1px solid #dfdfdf
        }
    </style>
@endsection