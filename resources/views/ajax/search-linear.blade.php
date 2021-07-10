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
                                <button class="btn btn-outline-info fonting">توضیحات</button>&nbsp;&nbsp;
                            </a>
                        </div>
                    </div>

                    </div>
                </div>

            </div>
            <?}?>

        </div>
    </div>

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
    <script src="/js/main3.min.js"></script>