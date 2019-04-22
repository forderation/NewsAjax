@extends('master')
@section('title', 'Halaman Utama Portal - Kabar Burung')
@section('body')
<div class="container my-4">
<h1><a href="/">Portal - Kabar Burung</a></h1>
<table class="table table-hover table-striped">
    <style type="text/css">
    </style>
    <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Published</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0 ?>
        @foreach ($posts as $post)
        <?php $no++ ?>
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->published }}</td>
            <?php $date = strtotime($post->created_at) ?>
            <td>{{  date('d/M/Y', $date) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<br />
Halaman : {{ $posts->currentPage() }} <br />
Jumlah Data : {{ $posts->total() }} <br />
Data Per Halaman : {{ $posts->perPage() }} <br />
{{ $posts->links() }}
@stop
</div>