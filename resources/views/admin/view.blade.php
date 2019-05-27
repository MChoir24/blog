@extends('layouts.admin_app')
@section('title', 'home')

@section('content')
    <div class="container border rounded-2">
        <h2>{{ $blog->judul }}</h2>
        <img src="/img/artikel/{{ $blog->gambar }}" alt="{{ $blog->gambar }}">
        <p>{!! nl2br($blog->deskripsi) !!}</p>

    </div>
@endsection
