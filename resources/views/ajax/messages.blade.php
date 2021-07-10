 <? foreach ($messages as $message){?>

    <?if($message->msgFrom == $_SESSION['id']){?>
<br>
        <div class="right">
        <?=$message->msg?>
        </div>
 <br>
 <br>
    <?}else{?>
        <div class="left">
            <?=$message->msg?>
        </div>

 <br>
 <br>
        <?}?>
    <?}?>
