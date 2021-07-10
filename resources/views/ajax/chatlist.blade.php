<div id="message">

    <div style="width: 100%;height: 20px;background-color: rgba(255,255,255,0.9)">
        <i class="fa fa-times chatzarbdar" aria-hidden="true"></i>
    </div>
   <div style="overflow-y: scroll; position: absolute; width: 100%;
  height: 95%;">
    <?

    foreach ($lists as $list){?>

    <div class="listschating">
      <div class="list" style="margin-top: 15px" data-idt="<?=$list->user_id?>"><?=$list->name?></div>
    </div>

    <?}?>
   </div>

</div>