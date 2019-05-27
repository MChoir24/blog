@extends('layouts.app')
@section('title', 'home')
@section('active', 'active')
@section('content')

<header class="masthead shadow container-fluid" style="background-image: url('img/bg.jpeg') ;margin-top: -55px">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="font-weight-light">Selamat Datang</h1>
                {{-- <p class="lead">Website Desa __</p> --}}
            </div>
        </div>
    </div>
</header>

<div class="container bg-white border rounded-2 mt-4 p-4 shadow">
    <h1 class="my-4">Tulisan Terbaru</h1>
    <div class="row ">
        <div class="col">
            <h2>Berita</h2>

            @foreach ($blogs as $blog)
                <div class="row">
                    <div class="col-md">
                        <a href="#">
                            <img class="img-thumbnail rounded mb-3 mb-md-0 fiximg" src="/img/artikel/{{ $blog->gambar }}" alt="">
                        </a>
                    </div>
                    <div class="col-md">
                        <h3>{{ $blog->judul }}</h3>
                        <p>
                            {{ substr($blog->deskripsi,0,500) }} . . .
                        </p>
                        <a class="btn btn-primary" href="/berita/{{ $blog->id }}">Selengkapnya</a>
                    </div>

                </div>
            @endforeach

            {{-- <hr> --}}
            <div class="row">
                <div class="col" style="text-align : right">
                    <a href="/berita" type="button" class="btn btn-secondary">Lihat Selengkapnya ></a></div>
            </div>
        </div>
    </div>

    <div class="row border rounded-2 padding-defult">
        <div class="col">
            <h1>cuplikan tentang profil desa</h1>
        </div>
    </div>


</div>
</div>
@endsection
