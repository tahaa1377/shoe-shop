<?
function replace_alling($name){
return str_replace(' ','-',$name,count(explode(" ",$name)));
}
?>
@if(count($results) != 0)

<div style="background-color: #fff;
width: 100%;position: relative;
cursor: pointer;box-shadow: 0 0 20px darkgrey;
border-radius: 7px;">


    <? foreach ($results as $result){?>
    <div class="row_responsive ">
        <a href="/product/<?=replace_alling($result->title)?>" style="color: black">
        <div class="colm-fill cols-fill colx-fill row-search-result">
            <span class="fonting search-reults"><?=$result->title?></span>
            <img style="width: 65px;height: 40px;position: absolute;left: 22px" src="/images/<?=$result->image?>">
        </div>
        </a>
    </div>
        <?}?>
</div>

@endif