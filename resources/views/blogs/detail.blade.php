@extends('layouts.app')
@section('title', 'berita')
@section('active1', 'active')
@section('content')
    <div class="container bg-white border rounded-2 p-4 shadow">
        <div class="row "> <div class="col "> <img class="center" src="/img/artikel/{{ $blog->gambar }}" alt="{{ $blog->gambar }}"> </div></div>
        <div class="row"> <div class="col my-4"> <h2><b>{{ $blog->judul }}</b></h2></div> </div>
        <div class="row"><div class="col"> <p class="h4"> {!! nl2br($blog->deskripsi) !!} </p> </div></div>
    </div>
@endsection
