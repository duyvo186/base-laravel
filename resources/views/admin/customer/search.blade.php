@extends('admin.user.main')

@section('content')
    <form action="{{route('admin.customer.search')}}" method="get"
          class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        <div style="float: left;" class="input-group">
            <select style="margin-left: 800px;" class="browser-default custom-select">
                <option selected>Customer Name</option>

            </select>
            <input class="form-control" value="" name="name" placeholder="Search for..." aria-label="Search for..."
                   aria-describedby="btnNavbarSearch"/>
            <button class="btn btn-info" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
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
                <td style="width: 300px!important;" >
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
