
@extends('app-email')

@section("section")

    <div style="font-size: 100%;font-weight: bold;font-family: system-ui,serif">


<h1>فروشگاه کفش</h1>

<a href="http://h-id.ir/account">ورود</a>
{{--<a href="http://shop.localhost/account">ورود</a>--}}




<?$total_price=0;
foreach ($products as $product){ ?>
<div class="col-12">
    <div class="tpanels">

            <div style="margin: 30px 0 20px 0">
                {{--<img style="width: 120px;height: 100px;position: absolute;top: 20px;margin: auto;left: 0;right: 0" src="http://shop.localhost/images/<?=$product->image?>" alt="<?=$product->description?>">--}}
                <img style="max-width: 95%;max-height: 130px;width: auto;height: auto;position: absolute;top: 20px;margin: auto;left: 0;right: 0" src="http://h-id.ir/images/<?=$product->image?>" alt="<?=$product->description?>">
            </div>

        <div style="position: absolute;bottom: 60px;left: 0;right: 0;margin: auto">
            <div style="margin-top: 5px;font-size: 120%;font-family: system-ui,serif;direction: rtl" >
                <span><?=$product->quantity?>عدد</span>
                &nbsp;
                <?=$product->title?>
            </div>

            <div style="margin-top: 5px;direction: ltr">
                <?if($product->takhfif!=0){?>

                    تومان<span style="font-size: 130%;text-decoration: line-through"><?=number_format($product->price)?></span>&nbsp;&nbsp;
                <?}?>
                     <span style="font-size: 140%;color: orangered"><?=number_format($product->price- ($product->takhfif / 100*$product->price))?>تومان</span>

            </div>
        </div>
    </div>

</div>
<hr>
<?
$total_price+=($product->quantity*($product->price- ($product->takhfif / 100*$product->price)));
}?>
<div style="text-align: right">
    <span>هزینه ی کل :</span>
    <span><?=number_format($total_price)?>تومان</span>
</div>

    </div>
@endsection

