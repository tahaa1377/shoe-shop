
@extends('app')

@section("section")


    <br>
    <br>
    {{--<div class="fonting" >--}}
        {{--رمز عبور نباید کمتر از پنج حرف باشد--}}
    {{--</div>--}}
    <br>





    <form method="post" action="/cheack_reset_pass">

        @csrf

    <div class="form-group row_responsive">
        <div class="cols-1 colx-2">&nbsp;</div>

        <div class="cols-5 colx-2">
            <span class="fonting" style="text-align: right;float: right"> رمز عبور</span>
            <input type="password" class="form-control " name="change_pass_first">
            <small class="form-text text-muted"></small>
            <div class="alert-danger">{{$errors->first('change_pass_first')}}</div>
        </div>

        <div class="cols-1 colx-2">&nbsp;</div>

    </div>



    <div class="form-group row_responsive">
        <div class="cols-1 colx-2">&nbsp;</div>

        <div class="cols-6 colx-2">
            <span class="fonting" style="text-align: right;float: right"> مجدداً رمز عبور</span>
            <input type="password" class="form-control " name="change_pass_second">
            <small class="form-text text-muted"></small>
            <div class="alert-danger">{{$errors->first('change_pass_second')}}</div>
        </div>

        <div class="cols-1 colx-2">&nbsp;</div>

    </div>

    <button style="padding: 7px 40px" name="submits" type="submit" class="btn btn-dark fonting">ثبت رمز عبور</button>
    <small  class="form-text text-muted"></small>


    </form>

    {{--@if (Session::has('change_pass_error'))--}}
        {{--<div class="alert alert-danger fonting">{{ Session::get('change_pass_error') }}</div>--}}
    {{--@endif--}}

    <br>
    <br>
@endsection