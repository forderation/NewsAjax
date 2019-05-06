<?php
    use App\Post;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- Title untuk halaman --}}
    <title>Halaman Utama Portal - Kabar Burung</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <h5> posted by: {{ Post::find($post->id)->pencipta->nama_pencipta}} </h5>
            <h5> tags: 
                <?php
                 $post_tag = Post::where('id', '=', $post->id)
                     ->with('tags')
                     ->first();
                 foreach($post_tag->tags as $tag){
                     echo $tag->nama_tag." ";
                 }
                ?>
            </h5>
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
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>
</html>