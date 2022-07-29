@extends('admin.user.main')

@section('content')
    <a class="btn btn-info" href="{{route('admin.customer.create')}}">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th>CUSTOMER ID</th>
            <th>CUSTOMER NAME</th>
            <th>CUSTOMER ADDRESS</th>
            <th>CUSTOMER PHONE</th>
            <td>CUSTOMER EMAIL</td>
            <th style="">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $key => $customer)
            <tr>
                <td>{{$customer->id}} </td>
                <td>{{$customer->name}} </td>
                <td>{{$customer->address}} </td>
                <td>{{$customer->phone}} </td>
                <td>{{$customer->email}} </td>
                <td>&nbsp;</td>
                <td>
                    <form action="{{route('admin.customer.destroy',$customer->id)}}" method="post">

                        @method('Delete')
                        @csrf
                        <button type="submit" style="float: right;margin-left: 20px;" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                    <a class="btn btn-info" href="customer/{{$customer->id}}">view</a>
                    {{--                    <a  class="btn btn-info" href="customer/{{$customer->id}}/edit">Edit</a>--}}
                </td>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--    //{!! $invoices->links() !!}--}}
@endsection
