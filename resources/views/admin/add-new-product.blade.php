
@extends('app-email')

@section("section")

    <br>
    <br>
    <br>

    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <form method="post" action="{{route('add.new.product.form')}}" enctype="multipart/form-data">
                    <h2 class="fonting">اضافه کردن محصول جدید</h2>
                    <br>
                    @csrf
                    <div class="form-group">

                        <input style="direction: rtl" type="text" class="form-control fonting" name="p_name"  placeholder="نام محصول">
                        <small  class="form-text text-muted"></small>
                        <div class="alert-danger">{{$errors->first('p_name')}}</div>

                    </div>

                    <div class="form-group">

                        <input style="direction: rtl" type="text" class="form-control fonting" name="p_decription"  placeholder="توضیحات محصول">
                        <small  class="form-text text-muted"></small>
                        <div class="alert-danger">{{$errors->first('p_decription')}}</div>

                    </div>

                    <div class="form-group">

                        <input style="direction: rtl" type="number" class="form-control fonting" name="p_price"  placeholder="قیمت (تومان)">
                        <small  class="form-text text-muted"></small>
                        <div class="alert-danger">{{$errors->first('p_price')}}</div>

                    </div>

                    <div class="form-group">

                        <input style="direction: rtl" type="number" class="form-control fonting" name="p_discount"  placeholder="تخفیف">
                        <small  class="form-text text-muted"></small>
                        <div class="alert-danger">{{$errors->first('p_discount')}}</div>

                    </div>

                    <div class="form-group">

                        <select name="p_type" class="form-control" style="direction: rtl">
                            <option value="man" class="fonting">مردانه</option>
                            <option value="woman"  class="fonting">زنانه</option>
                            <option value="baby"    class="fonting">بچه گانه</option>
                            <option value="sport"  class="fonting">اسپورت</option>
                        </select>
                        <div class="alert-danger">{{$errors->first('p_type')}}</div>

                    </div>


                    <div class="form-group">

                        <input style="direction: rtl" type="file" class="form-control fonting" name="p_image" >
                        <small  class="form-text text-muted"></small>
                        <div class="alert-danger">{{$errors->first('p_image')}}</div>

                    </div>





                    <button style="padding: 7px 40px" name="submits" type="submit" class="btn btn-dark fonting">تایید</button>
                    <small  class="form-text text-muted"></small>

                    <hr>
                </form>

            </div>

        </div>

    </div>


@endsection