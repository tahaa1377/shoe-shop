<?
$total_price=0;
foreach ($products as $product){?>
<div class="baba" style="background-color: rgba(255,255,255,0.8);width: 95%;height: 50px;margin: auto;margin-top: 5px;border-radius: 10px;position: relative">

    <img src="/images/<?=$product->image?>" style="width: 40px;height: 40px;float: left;margin-top:5px;margin-left: 5px;border-radius: 5px;position: relative ">

    <span class="a">
    <i data-idp="<?=$product->order_id?>" style="position: absolute;top: 18px;right: 8px" class="fa fa-times-circle"></i>
    </span>

    <?if(strlen($product->title) <= 24){?>
    <div class="fonting" style="font-weight: bold;float: left;margin-left: 1px;display: block"><?=$product->title?></div><br>
    <?}else{?>
    <div class="fonting" style="font-size: 90%;font-weight: bold;float: left;margin-left: 1px;display: block"><?=$product->title?></div><br>
<?}?>
    <div style="font-weight: bold;float: left;margin-left: 5px"><?=$product->quantity?>&nbsp;*</div>
    <div style="font-weight: bold;float: left;margin-left: 5px"><?=number_format($product->price- ($product->takhfif / 100*$product->price))?></div>
</div>
<?
$total_price+=($product->quantity*($product->price- ($product->takhfif / 100*$product->price)));
}?>
<div style="margin-top: 10px;margin-bottom: 10px;direction: rtl">
<span style="border: 1px solid white;padding: 4px 10px;background-color: white;direction: rtl"><?=number_format($total_price)?>&nbsp;<span class="fonting">تومان</span></span>
</div>
<div>
<a  href="/cart"><button  type="button" class="btn btn-success fonting" >سبد</button></a>
<a  href=""><button  type="button" class="btn btn-primary fonting">پرداخت</button></a>

    <br>
</div>