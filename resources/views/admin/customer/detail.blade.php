@extends('admin.user.main')

@section('content')
    @php $totalprice = 0;@endphp
    @foreach($customerDetails as $customer)
        <dl class="row">
            <dt class="col-sm-3">Customer Name</dt>
            <dd class="col-sm-9">{{$customer->name}}</dd>
            <dt class="col-sm-3">Total amount paid</dt>
            <dd class="col-sm-9">
                <dl class="row">
                    <dd class="col-sm-8">{{$totalprice}}</dd>
                </dl>
            </dd>
            <dt class="col-sm-3">Customer Address</dt>
            <dd class="col-sm-9">
                <p>{{$customer->address}}</p>
                <p></p>
            </dd>
            <dt class="col-sm-3">Customer Phone</dt>
            <dd class="col-sm-9">{{$customer->phone}}</dd>
            <dt class="col-sm-3 text-truncate">Customer Email</dt>
            <dd class="col-sm-9">
                {{$customer->email}}
            </dd>
        </dl>
    @endforeach
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
            <div class="card">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-7">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID INVOICE</th>
                                    <th>TOTAL PRODUCT</th>
                                    <th>TOTAL PRICE</th>
                                    <th>DATE BUY</th>
                                    <th>STATUS</th>
                                    <th style="">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customerDetails as $customerdetail)
                                    @foreach($customerdetail->invoices as $invoice)
                                        @php $total = 0; @endphp
                                        @foreach($invoice->invoiceProducts as $invoiceDetail)
                                            @php $quantitys = $invoiceDetail->quantity;
                                                 $total+=$quantitys;
                                            @endphp
                                            @php
                                                $price = $invoice->total;
                                                $totalprice +=  $price;
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td>{{$invoice->id}} </td>
                                            <td>{{$total}} </td>
                                            <td>{{$invoice->total}} </td>
                                            <td>{{$invoice->created_at}} </td>
                                            <td>@if($invoice->status == 0 )
                                                    <p class="text-danger">Not Complete<p>
                                                @else
                                                    <p class="text-primary">Complete<p>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-info"
                                                   href="{{route('admin.invoiceProduct.show', $invoice->id)}}">view and
                                                    edit</a>
                                            </td>
                                            <td>
                                                @csrf
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-5">
                            Total amount paid : @php echo $totalprice @endphp
                        </div>
@endsection
