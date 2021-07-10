<?
function replace_alling($name){
    return str_replace(' ','-',$name,count(explode(" ",$name)));
}
?>

    <div class="container">
        <div class="row">
            <?
            $countee=0;
            foreach ($products as $product){
            $countee++;
                ?>

            <div class="col-md-3 col-sm-4 col-12" >
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
{{--pagination--}}

    @if($countee > 0)
    <a href="#section11" style="text-decoration: none">
        <span data-pageination="1" class="btn btn-secondary pageination">1</span>
    </a>&nbsp;
    <div class="btn-group mr-2" role="group" aria-label="First group">

        <?for ($i=$pageIndex-2;$i<=$pageIndex+2;$i++){?>

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

        @else
        <div class="fonting">محصولی با این عنوان یافت نشد</div>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js?ih"></script>
<script src="/js/main2.min.js?ouu"></script>
