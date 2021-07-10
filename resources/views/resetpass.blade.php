@extends('app')

@section("section")

    <br>
    <br>

<div id="setRequest">
    <br>
    <br>

    <h4 class="fonting">ایمیل خود را وارد کنید</h4>
    <br>
    <br>

    <div class="row_responsive">

        <div class="cols-1 colx-2">&nbsp;</div>
        <div class="cols-6 colx-4" style="margin: auto auto;text-align: center">
            <input id="inputrespass"  type="email" class="form-control ">
        </div>
        <div class="cols-1 colx-2">&nbsp;</div>

        <br>
        <br>

    </div>
    <div class="row_responsive">
        <div class="cols-1 colxx-2">&nbsp;</div>
    <button id="clickrespass" style="padding: 7px 20px" type="submit" class="btn btn-dark fonting cols-6 colxx-4">بازنشانی رمز</button>
        <div class="cols-1 colxx-2">&nbsp;</div>

    </div>
    <br>
</div>

    <br>
    <br>
@endsection


@section("js")
    <script src="/js/restpass.min.js?y"></script>
@endsection