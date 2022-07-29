@extends('admin.user.main')

@section('content')
    <div class="customer">
        <ul>
            @foreach($invoices as $invoice)
            @endforeach
            <form action="{{route('admin.invoice.update', $invoice->invoice->id)}}" method="POST">
                @method('PUT')
                @csrf
                <li>Customer Name:
                    <select name="id">
                        <option>{{$invoice->invoice->customer->name}}</option>

                        @foreach($customers as $customer)

                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                </li>
        </ul>
        <button style="float: right;margin-left: 20px;" class="btn btn-primary" type="submit">Update Info Customer
        </button>
        </form>
        <style>
            input {
                background: transparent;
            }
        </style>
    </div>
    <div class="col-12">
        <a style="float: right;margin-left: 20px;" class="btn btn-success"
           href="{{route('admin.invoiceProduct.edit', $invoice->invoice->id ) }} ">Add Product</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>NAME</th>
            <th>IMAGE</th>
            <th>TOTAL</th>
            <th>QUALITY</th>
            <th style="">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @php $total = 0; @endphp
        @foreach($invoices as $invoice)
            <tr>
                <td>{{$invoice->product->name}} </td>
                <td><img src="{{$invoice->product->thumb}}" width="100px"></td>
                <td>{{$invoice->total}}</td>
                <td>{{$invoice->quantity}}</td>
                <td>
                    <form action="{{route('admin.invoiceProduct.destroy',$invoice->id)}}" method="post">

                        @method('Delete')
                        @csrf
                        <button type="submit" style="float: right;margin-left: 20px;" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                    @csrf
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
