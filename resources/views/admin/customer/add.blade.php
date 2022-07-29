@extends('admin.user.main')

@section('content')
    <script src="/ckeditor/ckeditor.js"></script>
    <form class="row g-3 needs-validation" action="{{route('admin.customer.store')}}" method="POST">
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Customer Name</label>
                <input type="text" class="form-control" id="validationCustom01" name="name" id="name"
                       value="{{old('name')}}"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Phone</label>
                <input type="text" class="form-control" id="validationCustom01" value="{{old('price')}}" name="phone"
                       id="phone"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Address</label>
                <input type="text" class="form-control" id="validationCustom01" name="address" id="address"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Email</label>
                <input type="text" class="form-control" id="validationCustom01" name="email" id="email"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Create Product</button>
        </div>
        @csrf
    </form>

@endsection
