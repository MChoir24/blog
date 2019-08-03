@extends('layouts.app')
@section('title', 'home')
@section('active', 'active')
@section('content')
{{-- {{ dd($visi->visi) }} --}}
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
    <div class="row border rounded-2 padding-defult">
        <div class="col">
            <h2>Kegiatan</h2>
                <p>...</p>
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


<div class="container bg-white border rounded-2 mt-4 p-4 shadow">
    <h1 class="my-4">Visi Misi Kecamatan</h1>
    <div class="row border rounded-2 padding-defult">
        <div class="col">
            <h2>Visi</h2>
            <p>{{ $visi->visi }}</p>
        </div>
    </div>

    <div class="row border rounded-2 padding-defult">
        <div class="col">
            <h2>Misi</h2>
            <p>{{ $visi->misi }}</p>
        </div>
    </div>
</div>

</div>
@endsection
