@extends('layouts.app')
@section('title', 'Result')
@section('content')
<div class="container bg-white border rounded-2 p-4 shadow">
    <h1>Hasil Pencarian</h1>
    {{-- {{ dd($blogs->count()) }} --}}
    @if ($blogs->count() > 0)
        <div class="d-flex flex-wrap justify-content-center">
            <div class="card-group">
                {{-- {{ dd($blogs) }} --}}
            @foreach ($blogs as $blog)
                    <div class="card">
                        <img class="card-img-top" src="/img/artikel/{{ $blog->gambar }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->judul }}</h5>
                            <p class="card-text">{{ $blog->deskripsi }}</p>
                            <p class="card-text"><small class="text-muted">Dibuat pada {{ $blog->CREATED_AT }}</small></p>
                        </div>
                    </div>
            @endforeach
        </div>
        </div>
    @else
        <h2>tidak ada kata untuk "{{ $word }}"</h2>
    @endif
    {{ $blogs->onEachSide(3)->links() }}
    {{-- {{ dd($blogs->url(6)) }} --}}
</div>
@endsection
