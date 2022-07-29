@extends('admin.user.main')

@section('content')
    <script src="/ckeditor/ckeditor.js"></script>
    <form class="row g-3 needs-validation" action="{{route('admin.product.update',$product->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Name</label>
                <input type="text" class="form-control" class="form-control" id="validationCustom01" name="name"
                       id="name" value="{{$product->name}}" placeholder="Nhập tên danh mục"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Price</label>
                <input type="text" class="form-control" id="validationCustom01" value="{{$product->price}}" name="price"
                       id="price" placeholder="Nhập giá"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Price Sale</label>
                <input type="text" class="form-control" id="validationCustom01" name="price_sale" id="price_sale"
                       value="{{$product->price_sale}}" placeholder="Nhập giá giảm"/>

                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label" for="menu_id">Menu</label>
                {{--                <input type="text" class="form-control" id="validationCustom01" name="menu" id="menu"  required />--}}
                <select class="form-control" name="menu_id">
                    @foreach($categories as $category)
                        <option
                            value="{{$category->id}}" {{$category->menu_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Content</label>
                <textarea type="text" class="form-control" id="validationCustom01" name="description" id="description"
                          placeholder="Nhập mô tả"> {{$product->description}}  </textarea>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="validationCustom01" name="content"
                          id="content">  {{$product->content}} </textarea>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <p>Status</p>
        <!-- Default radio -->
        <div class="form-check">
            <input class="form-check-input" value="1" id="active" type="radio"
                   name="active" {{$product->active == 1 ? 'checked' :''}}/>
            <label class="form-check-label" for="flexRadioDefault1">Yes Active </label>
        </div>
        <!-- Default checked radio -->
        <div class="form-check">
            <input class="form-check-input" value="0" id="no active" type="radio"
                   name="no active" {{$product->active == 0 ? 'checked' :''}}/>
            <label class="form-check-label" for="flexRadioDefault2"> No Active</label>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Create Product</button>
        </div>
        @csrf
    </form>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
