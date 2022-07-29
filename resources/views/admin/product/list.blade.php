@extends('admin.user.main')

@section('content')
    <a class="btn btn-info" href="{{route('admin.product.create')}}">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>MENU</th>
            <th>PRICE</th>
            <th>PRICE-SALE</th>
            <th>DESCRIPTION</th>
            <th>CONTENT</th>
            <th>ACTIVE</th>
            <th style="">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $key => $product)
            <tr>
                <td>{{$product->id}} </td>
                <td>{{$product->name}} </td>
                <td><img src="{{$product->thumb}}" width="100px"></td>
                <td>{{$product->price}} </td>
                <td>{{$product->price_sale}} </td>
                <td>{!! $product->description !!}</td>
                <td>{!!$product->content!!} </td>
                <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td>{{$product->updated_at}} </td>
                <td>&nbsp;</td>
                <td>
                    {{--               <button type="button" onclick="removeRow({{$product->id}},'{{route('admin.product.destroy')}}')" class="btn btn-danger">Xóa</button>--}}
                    <form action="{{route('admin.product.destroy',$product->id)}}" method="post">

                        @method('Delete')
                        @csrf
                        <button type="submit" style="float: right;margin-left: 20px;" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                    <a class="btn btn-info" href="product/{{$product->id}}">Edit</a>

                </td>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--    {!! $products->links() !!}--}}
@endsection
