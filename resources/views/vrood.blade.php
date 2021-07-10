@extends('app')

@section("section")



    <div class="row_responsive">
        <div class="colxx-fill colm-0 cols-0">
            <div style="width: 100%;background-color: #343a40">&nbsp;</div>
        </div>
    </div>


    @if (Session::has('change-pass'))
        <div class="alert alert-success fonting" style="direction: rtl">{{ Session::get('change-pass') }}</div>
    @endif

    <div class="row_responsive">
        <div class="colxx-0 colm-fill cols-fill">
            @if (Session::has('sign_error'))
                <div class="alert alert-danger fonting">{{ Session::get('sign_error') }}</div>
            @endif
            @if (Session::has('login_error'))
                <div class="alert alert-danger fonting">{{ Session::get('login_error') }}</div>
            @endif
        </div>
    </div>


    <br>
    <div class="row_responsive">
        <div class="colxx-fill colm-0 cols-0">
            <br>
        </div>
    </div>


    <section>
        <div class="container">
            <div class="row" style="direction: rtl">

                <div class="col-md-6">
                    <form method="post" action="/login">

                        <h2 class="fonting">ورود</h2>

                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control fonting" name="login_email" placeholder="ایمیل" value="{{old('login_email')}}">
                            <small class="form-text text-muted"></small>
                            <div class="alert-danger fonting">{{$errors->first('login_email')}}</div>

                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control fonting" name="login_password" placeholder="رمز عبور">
                            <small  class="form-text text-muted"></small>
                            <div class="alert-danger fonting">{{$errors->first('login_password')}}</div>
                        </div>

                        <button style="padding: 7px 40px"  name="submitl" type="submit" class="btn btn-dark fonting">ورود</button>
                        <small  class="form-text text-muted"></small>

                        <div class="row_responsive">
                            <div class="colxx-fill colm-0 cols-0">
                                @if (Session::has('login_error'))
                                    <div class="alert alert-danger fonting">{{ Session::get('login_error') }}</div>
                                @endif
                            </div>
                        </div>


                    </form>
                    <br>
                    <a href="/resetpass" class="fonting" style="text-decoration-line: none">فراموشی رمز عبور</a>
                    <hr>


                </div>

                <div class="col-md-6">

                    <form method="post" action="/sign_up">
                        <h2 class="fonting">ثبت نام</h2>
                        @csrf
                        <div class="form-group">

                            <input type="text" class="form-control fonting" name="sign_name"  placeholder="نام" value="{{old('sign_name')}}">
                            <small  class="form-text text-muted"></small>
                            <div class="alert-danger fonting">{{$errors->first('sign_name')}}</div>

                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control fonting" name="sign_email"  placeholder="ایمیل" value="{{old('sign_email')}}">
                            <small class="form-text text-muted"></small>
                            <div class="alert-danger fonting">{{$errors->first('sign_email')}}</div>

                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control fonting" name="sign_password" placeholder="رمز عبور">
                            <small  class="form-text text-muted"></small>
                            <div class="alert-danger fonting">{{$errors->first('sign_password')}}</div>
                        </div>

                        <button style="padding: 7px 40px" name="submits" type="submit" class="btn btn-dark fonting">ثبت نام</button>
                        <small  class="form-text text-muted"></small>

                        <div class="row_responsive">
                            <div class="colxx-fill colm-0 cols-0">
                                @if (Session::has('sign_error'))
                                    <div class="alert alert-danger fonting">{{ Session::get('sign_error') }}</div>
                                @endif
                            </div>
                        </div>

                        <hr>
                    </form>
                </div>

            </div>
        </div>
    </section>

<br>


@endsection