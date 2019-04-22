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
    <div class="container my-4">
        <h1><a href="/">Portal - Kabar Burung</a></h1>
        <br>
        <?php $no = 0 ?>
        @foreach ($posts as $post)
        @if(strcmp($post->published,'yes')==0)
            <?php $no++ ?>
            <h4 class="title">{{ $post->title }}</h4>
            <?php $date = strtotime($post->created_at) ?>
            <h5 class="date">{{ date('d/M/Y', $date) }}</h5>
            <h5>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->diffForHumans() }}</h5>
            <h5>
                @if(strlen($post->content)>1000)
                    {{Str::words($post->content,100)}}
                    <br>
                    <a href="detail/{{$post->id}}" style="font-size: 20px;">Selengkapnya</a>
                @else
                    {{$post->content}}
                @endif
            </h5>
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