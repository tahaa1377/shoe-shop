
@extends('app-email')

@section("section")

    <br>
    <br>
    <br>

    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <form method="post" action="{{route('update.product.form')}}" enctype="multipart/form-data">
                    <h2 class="fonting">ویرایش محصول </h2>
                    <br>
                    @csrf
                    <div class="form-group">
                        اسم محصول
                        <input style="direction: rtl" type="text" class="form-control fonting" name="p_name"  placeholder="نام محصول" value="{{$product->title}}">
                        <small  class="form-text text-muted"></small>
                        <div class="alert-danger">{{$errors->first('p_name')}}</div>

                    </div>
                    <hr>
                    <div class="form-group">
                        توضیحات محصول
                        <input style="direction: rtl" type="text" class="form-control fonting" name="p_decription"  placeholder="توضیحات محصول" value="{{$product->description}}">
                        <small  class="form-text text-muted"></small>
                        <div class="alert-danger">{{$errors->first('p_decription')}}</div>

                    </div>
                    <hr>
                    <div class="form-group">
                        قیمت محصول
                        <input style="direction: rtl" type="number" class="form-control fonting" name="p_price"  placeholder="قیمت (تومان)" value="{{$product->price}}">
                        <small  class="form-text text-muted"></small>
                        <div class="alert-danger">{{$errors->first('p_price')}}</div>

                    </div>

                    <div class="form-group">
                        تخفیف محصول
                        <input style="direction: rtl" type="number" class="form-control fonting" name="p_discount"  placeholder="تخفیف" value="{{$product->takhfif}}">
                        <small  class="form-text text-muted"></small>
                        <div class="alert-danger">{{$errors->first('p_discount')}}</div>

                    </div>

                    <div class="form-group">
                        تعداد محصول
                        <input style="direction: rtl" type="number" class="form-control fonting" name="p_available"  placeholder="" value="{{$product->available}}">
                        <small  class="form-text text-muted"></small>
                        <div class="alert-danger">{{$errors->first('p_available')}}</div>

                    </div>

                    <div class="form-group">

                        <div class="row_responsive">

                            <div class="colx-4 colm-fill cols-fill">
                                <img style="width: 300px" src="/images/<?=$product->image?>" alt="<?=$product->description?>">
                            </div>

                            <div class="colx-4 colm-fill cols-fill">

                                <input style="direction: rtl" type="file" class="form-control fonting" name="p_image" >
                                <small  class="form-text text-muted"></small>
                                <div class="alert-danger">{{$errors->first('p_image')}}</div>
                            </div>

                        </div>

                    </div>

                    <input type="hidden" name="p_id" value="<?=$product->product_id?>">


                    <button style="padding: 7px 40px" name="submits" type="submit" class="btn btn-dark fonting">تایید</button>
                    <small  class="form-text text-muted"></small>

                    <hr>
                </form>

            </div>

        </div>

    </div>


@endsection