<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.user.head')
</head>
<body class="sb-nav-fixed">
@include('admin.user.sidebar')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">{{$title}}</h1>
            @include('admin.user.alert')
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>
            @yield('content')
        </div>
    </main>
</div>
</div>
@include('admin.user.footer')
</body>
</html>

