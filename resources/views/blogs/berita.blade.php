@extends('layouts.app')
@section('title', 'berita')
@section('bg-img', 'img/bg.jpeg')
@section('active1', 'active')
@section('content')

<div class="container bg-white border rounded-2 p-4 shadow">
    <h1 class="my-4">Berita Kecamatan Labang
    </h1>
    @foreach ($blogs as $blog)
        <div class="row">
            <div class="col-md">
                <a href="#">
                    <img class="img-thumbnail rounded mb-3 mb-md-0 fiximg" src="/img/artikel/{{ $blog->gambar }}" alt="">
                </a>
            </div>
            <div class="col-md">
                <h2><b>{{ $blog->judul }}</b></h2>
                <p class="h5">
                    {{ substr($blog->deskripsi,0,500) }} . . .
                </p>
                <a class="btn btn-primary" href="/berita/{{ $blog->id }}">Selengkapnya</a>
            </div>

        </div>
        <hr>
    @endforeach

    <!-- Pagination -->
    {{ $blogs->links() }}

    {{-- <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul> --}}
</div>
@endsection
