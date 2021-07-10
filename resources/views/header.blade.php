<div class="header-main">

    <div class="row_responsive">
        <div class="colx-0 colm-fill cols-fill">
            <img style="background: black;width: 20%;height: 20px" src="/images/test.svg" alt="">

        </div>
    </div>

    <div class="row_responsive" style="margin-top:4px;position: relative">



        <div class="colx-1 colm-1 cols-1" style="position: fixed;margin-top: 10px">
            <a href="/cart" class="special-a">
                <i data-count="<?=$count?>" class="fa fa-shopping-cart fa-2x " aria-hidden="true"
                   style="cursor: pointer" id="counti">
                 <span class="basket-count-j">
                    <?if($count > 0){?>
                          <?if($count < 10){?>
                                  <span class="basket-count"><?=$count?></span>
                              <?}else{?>
                                  <span class="basket-count-two"><?=$count?></span>
                         <?}?>
                    <?}?>
                 </span>
                </i>
            </a>
            <div class="cart_show"></div>
        </div>


        <div class="colxx-0 colm-1 cols-1" style="position: fixed;margin-left: 45px;margin-top: 16px">
            <?if(isset($_SESSION['id']) && !empty($_SESSION['id'])){?>
            <a href="/logout" style="text-decoration-line: none;font-size: 80%;color: darkgray">
                <i class="fa fa-user-circle fa-2x"></i>
            </a>
                <?}else{?>
                <a href="/account" style="text-decoration-line: none;font-size: 80%;color: darkgray">
                    <i class="fa fa-user-circle fa-2x"></i>
                </a>
             <?}?>
        </div>

        <div class="colx-3 colm-0 cols-0" style="vertical-align: top;">
            <div style="vertical-align: middle" >

                <?if(isset($_SESSION['id']) && !empty($_SESSION['id'])){?>
                    <button class="fonting special-btn">
                    <a href="/logout" style="text-decoration-line: none;vertical-align: middle">
                        <span style="vertical-align: middle;color: #616161;">خروج از حساب کاربری
                        </span>&nbsp;&nbsp;<i style="vertical-align: middle;color: #616161;" class="fa fa-user-circle fa-2x"></i>
                    </a>
                    </button>
                <?}else{?>

                    <button class="fonting special-btn">
                        <a href="/account" style="text-decoration-line: none;vertical-align: middle">
                        <span style="vertical-align: middle;color: #616161;">ورود به حساب کاربری
                        </span>&nbsp;&nbsp;<i style="vertical-align: middle;color: #616161;" class="fa fa-user-circle fa-2x"></i>
                        </a>
                    </button>

                    <?}?>

                            {{--<button class="fonting special-btn ">--}}
                                {{--<a href="/account" style="text-decoration-line: none;vertical-align: middle">--}}
                            {{--<span style="vertical-align: middle;color: #616161;">ورود به حساب کاربری</span>&nbsp;&nbsp;<i style="vertical-align: middle;color: #616161;" class="fa fa-user-circle fa-2x"></i>--}}
                                {{--</a>--}}
                            {{--</button>--}}



            </div>
        </div>


        <div class="colm-6 cols-6 colx-3" style="margin-right: 10px">
            <div class="form-group">
                <div class="form-group has-search" style="direction: rtl;">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input id="input-search" type="text" class="form-control fonting" style="font-size: 90%;cursor: auto;margin-left: 20px" placeholder="جستجو کفش ...">
                    <div id="serach-main"></div>
                </div>
            </div>

        </div>



        <div class="colm-0 cols-0 colx-1" style="position: absolute;top: 8px;">
            <img style="background: black;width: 90%" src="/images/test.svg" alt="">
        </div>


    </div>

    <div class="row_responsive">
        <div class="colx-fill">
            <div id="aaleart" style="direction: rtl" class="alert alert-success fonting collapse w-75 m-auto">
                <strong style="margin: auto auto;text-align: center">محصول به سبد خرید اضافه شد.</strong>
            </div>
        </div>
    </div>

</div>

<br>
<br>
<br>

<script src="/js/header.min.js?mxm"></script>