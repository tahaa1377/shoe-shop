<?
function replace_alling($name){
    return str_replace(' ','-',$name,count(explode(" ",$name)));
}
?>
@if(count($products) != 0)

    <div class="cart_backset">

    <div style="float: right;direction: rtl;text-align: right">
        در سبد خرید شما <a href="/cart" style="font-weight: bold"><?=$count?></a> کالا وجود دارد.
    </div>

        <br>

     <div style="height: 1px;width: 100%;background-color: darkgrey">&nbsp;</div>

    <?
    $total_price=0;
    foreach ($products as $product){?>
<div class="row_responsive">
    <div class="colx-5" style="text-align: right;vertical-align: middle">
        <a href="/product/<?=replace_alling($product->title)?>" class="fonting"><?=$product->title?></a><br>
        <div class="fonting" style="direction: rtl">
            <span>سایز :</span>
            <span><?=$product->size?></span>
        </div>
        <div class="fonting" style="direction: rtl">
            <span>رنگ :</span>
            <span><?=$product->color?></span>
        </div>

        <span style="float: left;margin-left: 20px">تومان</span>
        <span style="font-weight: bold;"><?=$product->quantity?>&nbsp;*</span>
        <span style="font-weight: bold;"><?=number_format($product->price- ($product->takhfif / 100*$product->price))?></span>

    </div>
    <div class="colx-3">
        <img src="/images/<?=$product->image?>" alt="" style="max-width: 90%;max-height: 70%;width: auto;height: auto;vertical-align: middle">
    </div>


</div>
        <div style="height: 1px;width: 100%;background-color: darkgrey">&nbsp;</div>

    <?$total_price+=($product->quantity*($product->price- ($product->takhfif / 100*$product->price)));

    }?>

        <div class="row_responsive">
            <div class="colx-fill fonting" style="text-align: right;background-color: #e6e6e6;padding: 1rem;">
                <span>جمع :</span>
                <span style="font-weight: bold"><?=number_format($total_price)?> &nbsp; تومان</span>
            </div>
        </div>

        <div class="row_responsive">
            <div class="colx-fill" style="text-align: right;">
                <a href="/cart">
                <button class="btn btn-dark" style="border: 1px solid white">سبد خرید</button>
                </a>
            </div>
        </div>

    </div>
@endif