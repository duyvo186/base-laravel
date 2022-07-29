@extends('admin.user.main')

@section('content')
    <form action="{{route('admin.invoice.search')}}" method="get"
          class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        <div style="float: left;" class="input-group">
            <select style="margin-left: 800px;" class="browser-default custom-select">
                <option selected>Product Name</option>

            </select>
            <input class="form-control" value="" name="name" placeholder="Search for..." aria-label="Search for..."
                   aria-describedby="btnNavbarSearch"/>
            <button class="btn btn-info" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th>ID INVOICE</th>
            <th>TOATAL PRICE</th>
            <th>NGAY MUA HANG</th>
            <th>STATUS</th>
        </tr>
        </thead>
        <tbody>
        @foreach($invoices as $invoice)
            <tr>
                <td>{{$invoice->id}}</td>
                <td>{{$invoice->total}} </td>
                <td>{{$invoice->created_at}} </td>
                <td>@if($invoice->status == 0 )
                        <p class="text-danger">Not Complete<p>
                    @else
                        <p class="text-primary">Complete<p>
                    @endif
                </td>
                <td>
                    <button type="button"
                            onclick="removeRow({{$invoice->id}},'{{route('admin.invoice.destroy', $invoice->id)}}')"
                            class="btn btn-danger">Delete
                    </button>
                    <a class="btn btn-info" href="invoiceProduct/{{$invoice->id}}">view and edit</a>
                </td>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
