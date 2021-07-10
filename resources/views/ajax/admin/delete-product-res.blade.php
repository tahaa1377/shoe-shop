<table id="tablea" style="width: 90%;margin: auto auto" class="table table-hover">
    <colgroup>
        <col style="width: 20%;">
        <col style="width: 5%;">
        <col style="width: 5%;">
        <col style="width: 5%;">
        <col style="width: 5%;">
        <col style="width: 2%;">
    </colgroup>

    <head>
        <th class="fonting">تصویر محصول</th>
        <th class="fonting">نام محصول</th>
        <th class="fonting" style="direction: rtl">قیمت(تومان)</th>
        <th class="fonting"> تخفیف</th>
    </head>

    <?foreach ($products as $product){?>
    <tr class="cartItem updata-ajax-pro" data-updatid="{{$product->product_id}}">
        {{--<a href="{{route('update.product',$product->product_id)}}">--}}


        <td >
            <img class="imgc" src="/images/<?=$product->image?>" style="width: 60%;height: 128px;" alt="<?=$product->description?>">
        </td>


        <td>
            <br>
            <br>
            <div class="titlec fonting" style="font-weight: bold;"><?=$product->title?></div><br>
        </td>



        <td>
            <br>
            <br>
            <div class="pricec" style="font-weight: bold;">
                <?=number_format($product->price- ($product->takhfif / 100*$product->price))?>
            </div>
        </td>

        <td>
            <br>
            <br>
            <div class="pricec" style="font-weight: bold;">
                <?=number_format(($product->takhfif))?>
            </div>
        </td>

        {{--</a>--}}
    </tr>
    <?}?>
</table>