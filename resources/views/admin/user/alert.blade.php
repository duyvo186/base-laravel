@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('error'))
    <div class="alert-danger">
        {{Session::get('error')}}
    </div>
@endif
@if (Session::has('success'))
    <div class="alert-primary">
        {{Session::get('success')}}
        @if(Session::has('deleteSuccess'))
            <div class="alert-danger">
                {{Session::get('deleteSuccess')}}
            </div>
        @endif
        @if(Session::has('updateSuccess'))
            <div class="alert-primary">
                {{Session::get('updateSuccess')}}
            </div>
        @endif
        @if(Session::has('createSuccess'))
            <div class="alert-primary">
                {{Session::get('createSuccess')}}
            </div>
        @endif
    </div>
@endif
@if(Session::has('getIdCustomer'))
    <style>
        #icon-login-success {
            display: block;
        }
        #button-login-customer {
            display: none;
        }
    </style>
@endif
@if(\Illuminate\Support\Facades\Session::has('popupform'))
    <script>document.getElementById('exampleModalToggle1').className = "login"</script>
@endif
