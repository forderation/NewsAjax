<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- Title untuk halaman --}}
    <title>Halaman Utama Portal - Kabar Burung</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .title {
            color: #6792DC;
        }

        .date {
            font-style: italic;
        }
    </style>
</head>

<body>
    {{-- Konten untuk detail --}}
    <div class="container my-4">
        <h1><a href="/">Portal - Kabar Burung</a></h1>
        <br>
        @if(strcmp($post[0]->published,'yes')==0)
            <h4 class="title">{{ $post[0]->title }}</h4>
            <?php $date = strtotime($post[0]->created_at) ?>
            <h5 class="date">{{ date('d/M/Y', $date) }}</h5>
            <h5>
                <textarea class="form-control" id="content_edit" cols="40" rows="40" disabled>{{ $post[0]->content }}</textarea>
            </h5>
        @endif
    </div>
</body>

</html>