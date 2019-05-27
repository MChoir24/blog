@extends('layouts.admin_app')
@section('title', 'home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-dark table-striped">
                    <tr>
                        <th>id</th>
                        <th>judul</th>
                        <th>deskripsi</th>
                        <th>nama gambar</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>action</th>
                    </tr>
                </thead>
                @php
                    // dd($blogs)
                @endphp
                @foreach ($blogs as $blog)
                <tbody>
                    <tr>
                        <th scope="row">{{ $blog->id }}</th>
                        <td>{{ $blog->judul }}</td>
                        <td>{{ substr($blog->deskripsi,0,50) }}. . .</td>
                        <td><a href="img/artikel/{{ $blog->gambar }}" target="_blank">{{ $blog->gambar }}</a></td>
                        <td>{{ $blog->CREATED_AT }}</td>
                        <td>{{ $blog->UPDATED_AT }}</td>
                        <td>
                            <a href="/admin/{{ $blog->id }}" type="button" class="btn btn-primary mb-3">selengkapnya</a>
                            <a href="/admin/{{ $blog->id }}/edit" type="button" class="btn btn-primary mb-3">edit</a>
                            <form class="" action="/admin/{{ $blog->id }}" method="post">
                                <input type="submit" name="submit" value="delete">

                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            {{-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
        </div>
        @endif

        You are logged in!
    </div>
</div> --}}
</div>
</div>
</div>
@endsection
