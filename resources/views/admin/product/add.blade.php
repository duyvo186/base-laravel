@extends('admin.user.main')

@section('content')
    <script src="/ckeditor/ckeditor.js"></script>
    <form class="row g-3 needs-validation" action="{{route('admin.product.store')}}" method="POST">
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Name</label>
                <input type="text" class="form-control" id="validationCustom01" name="name" id="name"
                       value="{{old('name')}}" placeholder="Nhập tên danh mục"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Price</label>
                <input type="text" class="form-control" id="validationCustom01" value="{{old('price')}}" name="price"
                       id="price" placeholder="Nhập giá"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Price Sale</label>
                <input type="text" class="form-control" id="validationCustom01" name="price_sale" id="price_sale"
                       value="{{old('price_sale')}}" placeholder="Nhập giá giảm"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label" for="menu_id">Category</label>
                <select class="form-control" name="menu_id">
                    <option value="0">Danh Mục Cha</option>
                    @foreach($categories as $menu)
                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                    @endforeach
                </select>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Content</label>
                <textarea type="text" class="form-control" id="validationCustom01" name="description" id="description"
                          value="{{old('description')}}" placeholder="Nhập mô tả">   </textarea>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Description</label>
                <textarea type="text" class="form-control" name="content" id="content">   </textarea>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="form-group">
            <label for="menu">Image Product</label>
            <input type="file" class="form-control" id="uploadimg">
            <div id="image_show">
            </div>
            <input type="hidden" name="thumb" id="thumb">
        </div>
        <!-- Default radio -->
        <div class="form-check">
            <input class="form-check-input" value="1" id="active" type="radio" name="active"/>
            <label class="form-check-label" for="flexRadioDefault1"> Có </label>
        </div>
        <!-- Default checked radio -->
        <div class="form-check">
            <input class="form-check-input" value="0" id="no active" type="radio" name="no active"/>
            <label class="form-check-label" for="flexRadioDefault2"> Không </label>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Tạo Danh Mục</button>
        </div>
        @csrf
    </form>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
