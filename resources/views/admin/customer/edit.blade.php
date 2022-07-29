@extends('admin.user.main')

@section('content')
    <script src="/ckeditor/ckeditor.js"></script>
    <form class="row g-3 needs-validation" action="" method="POST">

        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="validationCustom01" value="{{$menu->name}}" name="name"
                       id="name" placeholder="Nhập tên danh mục"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="validationCustom01" value="{{$menu->phone}}" name="phone"
                       id="phone" placeholder="Nhập tên danh mục"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Email</label>
                <input type="text" class="form-control" id="validationCustom01" value="{{$menu->email}}" name="email"
                       id="email" placeholder="Nhập tên danh mục"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Address</label>
                <input type="text" class="form-control" id="validationCustom01" value="{{$menu->address}}"
                       name="address" id="address" placeholder="Nhập tên danh mục"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <!-- Default radio -->
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Edit Customer</button>
        </div>
        @csrf
    </form>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
