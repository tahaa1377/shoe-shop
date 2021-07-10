@extends('app-email')

@section("section")
    <br>
    <br>
    <br>
    <br>
<div class="container">


    <form method="post" action="{{route('upload.image.form')}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <input style="direction: rtl" type="file" class="form-control fonting" name="upload_image" >
            <small class="form-text text-muted"></small>
        </div>

        <button name="submits" type="submit" class="btn btn-dark fonting">تایید</button>

    </form>

</div>
@endsection