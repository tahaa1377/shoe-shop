@extends('app-email')

@section('section')
<br>
<br>
<br>

<h1 class="fonting alert alert-danger w-75 m-auto">لینک مورد نظر پیدا نشد 404</h1>
<br>

<h2 style="text-align: center;direction: rtl" class="fonting">لینک مورد نظر شما یافت نشد و ممکن است به دلایل زیر باشد:

</h2>

<ul>

<div class="row_responsive">
    <div  class="cols-6 colx-6">
        <li style="direction: rtl;float: right;text-align: right"><h6 class="fonting">لینک مطلب در سرویس ( زیر دامنه فعلی ) فعال نباشد</h6></li>
    </div>
    <div class="cols-1 colx-1">&nbsp;</div>
</div>

    <div class="row_responsive">
        <div  class="cols-6 colx-6">
            <li style="direction: rtl;float: right;text-align: right"><h6 class="fonting">لینک از سایتی غیر موثق، گزارش شده باشد</h6></li>
        </div>
        <div class="cols-1 colx-1">&nbsp;</div>
    </div>

    <div class="row_responsive">
        <div  class="cols-6 colx-6">
            <li style="direction: rtl;float: right;text-align: right"><h6 class="fonting">به دلایلی مطلب یا لینک از حالت انتشار خارج شده باشد</h6></li>
        </div>
        <div class="cols-1 colx-1">&nbsp;</div>
    </div>
</ul>

    <br>
    <br>

@endsection

