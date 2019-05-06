<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.jpg') }}">

    <!-- CSFR token for ajax call -->
    <meta name="_token" content="{{ csrf_token() }}"/>

    <title>Manage Posts</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- icheck checkboxes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/yellow.css">

    <!-- toastr notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .panel-heading {
            padding: 0;
        }
        .panel-heading ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .panel-heading li {
            float: left;
            border-right:1px solid #bbb;
            display: block;
            padding: 14px 16px;
            text-align: center;
        }
        .panel-heading li:hover {
            background-color: #ccc;
        }
        .panel-heading li:last-child {
            border-right: none;
        }
        .panel-heading li a:hover {
            text-decoration: none;
        }

        .table.table-bordered tbody td {
            vertical-align: baseline;
        }
        /* icheck checkboxes */
        .iradio_flat-yellow {
            background: url(https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/yellow.png) no-repeat;
        }
    </style>

</head>

<body>
    <div class="col-md-10 col-md-offset-1">
    <h1><a href="/">Admin - Kabar Burung</a></h1>    
    <h2 class="text-center">Manage Posts</h2>
    <br />
    <div class="panel panel-default">
    <div class="panel-heading">
        <ul>
            <li><i class="fa fa-file-text-o"></i> List Menu:</li>
            <li style="{{request()->is('admin/post') ? 'font-weight: bold;' : ''}}">
                <a href="post">
                    <span class="title">Post</span><span class="selected"></span>
                </a>
            </li>
            <li style="{{request()->is('admin/kategori') ? 'font-weight: bold;' : ''}}">
                <a href="kategori">
                    <span class="title">Kategori</span><span class="selected"></span>
                </a>
            </li>
            <li style="{{request()->is('admin/pencipta') ? 'font-weight: bold;' : ''}}">
                <a href="pencipta">
                    <span class="title">Pencipta</span><span class="selected"></span>
                </a>
            </li>
            <li style="{{request()->is('admin/tag') ? 'font-weight: bold;' : ''}}">
                <a href="tag">
                    <span class="title">Tag</span><span class="selected"></span>
                </a>
            </li>
        </ul>
    </div>
    @yield('body')
    @yield('js')
</body>
</html>