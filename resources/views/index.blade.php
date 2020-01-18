<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="{{ mix('vendor/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ mix('app/css/app.css') }}">


    <script src="{{ mix('vendor/js/vendor.js') }}"></script>
    <script src="{{ mix('app/js/app.js') }}"></script>


    <script type="text/javascript">


    </script>


</head>
<body class="bg-light h-100">

@include('layout.top-navbar')


<div style="height: 1100px">

    <p>
        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Link with href
        </a>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Button with data-target
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
        </div>
    </div>

</div>




</body>
</html>
