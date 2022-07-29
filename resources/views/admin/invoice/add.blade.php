@extends('admin.user.main')

@section('content')
    <script src="/ckeditor/ckeditor.js"></script>
    <form class="row g-3 needs-validation" action="{{route('admin.invoice.store')}}" method="POST">
        <div class="col-md-12">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Customer Name</label>
                <select name="customer_id" >
                @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                @endforeach
                </select>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>

        <div class="col-md-6">
            <dl class="dropdown">

                <dt>
                    <a href="#">
                        <span class="hida">Select</span>
                        <p class="multiSel"></p>
                    </a>
                </dt>

                <dd>
                    <div class="mutliSelect">
                        <ul>
                            @foreach($products as $product)
                                <li>
                                    <input name="product_id[]" type="checkbox" value="{{$product->id}}" />{{$product->name}}</li>
                                <li>
                            @endforeach
                        </ul>
                    </div>
                </dd>
            </dl>
        </div> <div class="col-md-6">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Quantity</label>
                <input type="text" class="form-control" id="validationCustom01" name="quantity" id="quantity"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Total</label>
                <input type="text" class="form-control" id="validationCustom01" name="total" id="total"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-outline">
                <label for="validationCustom01" class="form-label">Total All</label>
                <input type="text" class="form-control" id="validationCustom01" name="totalAll" id="totalAll"/>
                <div class="valid-feedback">Looks good!</div>
            </div>
        </div>
        <div class="col-md-12">

        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Create Product</button>
        </div>

        @csrf
    </form>
<style>


    .dropdown ul {
        margin: -1px 0 0 0;
    }

    .dropdown dd {
        position: relative;
        index:1000;
    }

    .dropdown a,
    .dropdown a:visited {
        color: #fff;
        text-decoration: none;
        outline: none;
        font-size: 12px;
    }

    .dropdown dt a {
        background-color: #4F6877;
        display: block;
        padding: 8px 20px 5px 10px;
        min-height: 25px;
        line-height: 24px;
        overflow: hidden;
        border: 0;
        width: 272px;
    }

    .dropdown dt a span,
    .multiSel span {
        cursor: pointer;
        display: inline-block;
        padding: 0 3px 2px 0;
    }

    .dropdown dd ul {
        background-color: #4F6877;
        border: 0;
        color: #fff;
        display: none;
        left: 0px;
        padding: 2px 15px 2px 5px;
        position: absolute;
        top: 2px;
        width: 280px;
        list-style: none;
        height: 100px;
        overflow: auto;
    }

    .dropdown span.value {
        display: none;
    }

    .dropdown dd ul li a {
        padding: 5px;
        display: block;
    }

    .dropdown dd ul li a:hover {
        background-color: #fff;
    }

    button {
        background-color: #6BBE92;
        width: 302px;
        border: 0;
        padding: 10px 0;
        margin: 5px 0;
        text-align: center;
        color: #fff;
        font-weight: bold;
    }
</style>
    <script>
        /*
	Dropdown with Multiple checkbox select with jQuery - May 27, 2013
	(c) 2013 @ElmahdiMahmoud
	license: https://www.opensource.org/licenses/mit-license.php
*/

        $(".dropdown dt a").on('click', function() {
            $(".dropdown dd ul").slideToggle('fast');
        });

        $(".dropdown dd ul li a").on('click', function() {
            $(".dropdown dd ul").hide();
        });

        function getSelectedValue(id) {
            return $("#" + id).find("dt a span.value").html();
        }

        $(document).bind('click', function(e) {
            var $clicked = $(e.target);
            if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
        });

        $('.mutliSelect input[type="checkbox"]').on('click', function() {

            var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
                title = $(this).val() + ",";

            if ($(this).is(':checked')) {
                var html = '<span title="' + title + '">' + title + '</span>';
                $('.multiSel').append(html);
                $(".hida").hide();
            } else {
                $('span[title="' + title + '"]').remove();
                var ret = $(".hida");
                $('.dropdown dt a').append(ret);

            }
        });
    </script>
@endsection
