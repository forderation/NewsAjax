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
    {{-- Konten untuk halaman --}}
    <div class="container">
        <h1>Portal - Kabar Burung</h1>
        <br>
        <?php $no = 0 ?>
        @foreach ($posts as $post)
        @if(strcmp($post->published,'yes')==0)
            <?php $no++ ?>
            <h4 class="title">{{ $post->title }}</h4>
            <?php $date = strtotime($post->created_at) ?>
            <h5 class="date">{{ date('d/M/Y', $date) }}</h5>
            <h5>
                {{ $post->content }}
            </h5>
            <a href="#" style="font-size: 20px;">Selengkapnya</a>
            <hr />
        @endif
        @endforeach
        <br />
        Halaman : {{ $posts->currentPage() }} <br />
        Jumlah Data : <?php echo $no ?> <br />
        Data Per Halaman : {{ $posts->perPage() }} <br />
        {{ $posts->links() }}
    </div>
</body>

</html>