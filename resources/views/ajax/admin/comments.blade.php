@extends('app-email')

@section("section")
<br>
<br>

<table id="tablea" style="width: 90%;margin: auto auto" class="table table-hover">
    <colgroup style="border-top: 2px solid currentColor">
        <col style="width: 10%;">
        <col style="width: 10%;">
        <col style="width: 60%;">
        <col style="width: 10%;">
        <col style="width: 10%;">
    </colgroup>

    <head>
        <th class="fonting">نام محصول</th>
        <th class="fonting">نام کاربر</th>
        <th class="fonting">متن نظر</th>
        <th class="fonting" style="direction: rtl">انتشار</th>
        <th class="fonting" style="direction: rtl">حذف</th>
    </head>

    <?foreach ($comments as $comment){?>
    <tr class="cartItem">

        <td style="vertical-align: middle">

            <div class="fonting" style="font-weight: bold;"><?=$comment->title?></div>
        </td>

        <td style="vertical-align: middle">

            <div class="fonting" style="font-weight: bold;"><?=$comment->name?></div>
        </td>



        <td style="vertical-align: middle">
            <div class="fonting" style="font-weight: bold">
                <?=$comment->comment?>
            </div>
        </td>

        <td style="vertical-align: middle">
             <button class="btn btn-success fonting luanch" data-id="<?=$comment->comment_id?>">انتشار نظر</button>
        </td>

        <td>
             <button class="btn btn-danger fonting remove" data-id="<?=$comment->comment_id?>">حذف نظر</button>
        </td>

    </tr>
    <?}?>
</table>
<br>
<br>
<br>

@endsection

@section("js")

    <script src="/js/admin-comment-check.min.js"></script>
@endsection