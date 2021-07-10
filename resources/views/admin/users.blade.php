@extends('app-email')

@section("section")

    <br>
    <table id="tablea" style="width: 90%;margin: auto auto" class="table table-hover">
        <colgroup>
            <col style="width: 20%;">
            <col style="width: 20%;">
            <col style="width: 20%;">

        </colgroup>

        <head>
            <th class="fonting">نام کاربر</th>
            <th class="fonting">ایمیل کاربر</th>
            <th class="fonting">نوع کاربر</th>

        </head>

    <? foreach ($users as $user){ ?>

    <tr class="cartItem updata-ajax-pro">

        <td style="">
            <div class="titlec fonting" style="font-weight: bold;vertical-align: middle">   <?=$user->name?></div>
        </td>



        <td>
            <div class="pricec" style="font-weight: bold;vertical-align: middle"><?=$user->email?></div>
        </td>

        <td>
            <div class="pricec" style="font-weight: bold;vertical-align: middle"><?=$user->access?></div>
        </td>


    </tr>



        <?}?>
    </table>

@endsection