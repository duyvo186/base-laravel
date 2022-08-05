@extends('admin.user.main')

@section('content')
    <script src="/ckeditor/ckeditor.js"></script>
    <form class="row g-3 needs-validation" action="" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Name</label>
                <input type="text" class="form-control" id="validationCustom01" value="{{$categories->name}}"
                       name="name"
                       id="name" placeholder="Nhập tên danh mục"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label" for="menu">Category</label>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Content</label>
                <textarea type="text" class="form-control" id="validationCustom01" name="description" id="description"
                          value="Mark" placeholder="Nhập mô tả">{{$categories->description}}   </textarea>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Description</label>
                <textarea type="text" class="form-control" name="content"
                          id="content">{{$categories->content}}   </textarea>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <!-- Default radio -->
        <p>Status</p>
        <div class="form-check">
            <input class="form-check-input" value="1" id="active" type="radio"
                   name="active" {{$categories->active == 1 ? 'checked=""' : ''}}/>
            <label class="form-check-label" for="flexRadioDefault1"> Yes Active </label>
        </div>
        <!-- Default checked radio -->
        <div class="form-check">
            <input class="form-check-input" value="0" id="no active" type="radio"
                   name="no active" {{$categories->active == 0 ? 'checked=""' : ''}}/>
            <label class="form-check-label" for="flexRadioDefault2"> No Active </label>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Edit Menu</button>
        </div>
        @csrf
    </form>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
