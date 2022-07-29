@extends('admin.user.main')

@section('content')
    <form class="row g-3 needs-validation" action="{{route('admin.invoiceProduct.store')}}" method="POST">

        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label" for="menu_id">Name</label>
                <select class="form-control" name="product_id">
                    <option value="0">Choose Product</option>
                    @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
                @foreach($invoices as $invoice)
                    <input type="hidden" name="invoice_id" value="{{$invoice->invoice_id}}">
                    @csrf
                @endforeach

                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Quantity</label>
                <input type="text" class="form-control" id="validationCustom01" name="quantity" id="quantity"
                       value="{{$product->quantity}}"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <?php $total = $product->price + $product->quantity ?>
        <input type="hidden" name="total" value="{{$total}}">
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Create Invoice</button>
        </div>
        @csrf
    </form>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
