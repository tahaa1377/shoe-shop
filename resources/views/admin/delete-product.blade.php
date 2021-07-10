
@extends('app-email')

@section("section")

    <br>
    <br>
    <br>
    <h2 class="fonting">حذف محصول </h2>
    <br>
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="form-group">

                    <input id="search_del_pro" style="direction: rtl" type="text" class="form-control fonting"  placeholder="نام محصول را جستجو کنید ...">
                    <small  class="form-text text-muted"></small>

                </div>



            </div>
        </div>
        <br>
        <br>
        <br>

        <div id="res_del_pro">

        </div>


    </div>


@endsection

@section("js")
    <script src="/js/search_delete_pro.min.js"></script>
@endsection