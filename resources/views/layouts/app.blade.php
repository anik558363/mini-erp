<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Mini ERP')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body{
            background:#f5f6fa;
        }

        .sidebar{
            min-height:100vh;
            background:#212529;
        }

        .sidebar a{
            color:#fff;
            text-decoration:none;
            display:block;
            padding:12px 20px;
        }

        .sidebar a:hover{
            background:#343a40;
        }

        .content{
            padding:25px;
        }
    </style>

    @stack('styles')

</head>

<body>

@include('partials.navbar')

<div class="container-fluid">

    <div class="row">

        <div class="col-md-2 p-0">
            @include('partials.sidebar')
        </div>

        <div class="col-md-10">

            <div class="content">

                @yield('content')

            </div>

        </div>

    </div>

</div>

@include('partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

@stack('scripts')

</body>

</html>
