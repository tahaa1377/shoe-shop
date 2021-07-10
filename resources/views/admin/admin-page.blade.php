
@extends('app-email')

@section("section")

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        {{--<a class="navbar-brand" href="#">Navbar</a>--}}
        <button  class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span style="direction: rtl;float: right;text-align: right" class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto fonting">
                <li class="nav-item active" style="margin: 0 20px">
                    <a class="nav-link " href="/admmiin_pages_G/add-new-product">اضافه کردن محصول جدید</a>
                </li>

                <li class="nav-item active" style="margin: 0 20px">
                    <a class="nav-link" href="/admmiin_pages_G/update-product">ویرایش محصول</a>
                </li>

                <li class="nav-item active fonting" style="margin: 0 20px">
                    <a class="nav-link" href="/">صفحه اصلی</a>
                </li>

                <li class="nav-item active fonting" style="margin: 0 20px">
                    <a class="nav-link" href="/admmiin_pages_G/comments-list">لیست نظرات کاربران</a>
                </li>

                <li class="nav-item active fonting" style="margin: 0 20px">
                    <a class="nav-link" href="/admmiin_pages_G/delete-product">حذف محصول</a>
                </li>

                <li class="nav-item active fonting" style="margin: 0 20px">
                    <a class="nav-link" href="/admmiin_pages_G/upload-image">آپلود عکس</a>
                </li>

                <li class="nav-item active fonting" style="margin: 0 20px">
                    <a class="nav-link" href="/admmiin_pages_G/users-list">لیست کاربران</a>
                </li>
            </ul>
        </div>
    </nav>


    <br>
    <br>
    <br>

    @if (Session::has('successing'))
        <div class="alert alert-success fonting w-50 m-auto" style="direction: rtl">{{ Session::get('successing') }}</div>
    @endif

@endsection