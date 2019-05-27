@extends('layouts.admin_app')
@section('title', 'home')

@section('content')
<div class="container">
    <h1>post blog</h1>
    <form action="/admin/{{ $blog->id }}" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-6">
                judul
            </div>
            <div class="col-md-6">
            <input type="text" name="judul" value="{{ $blog->judul }}">
                @if ($errors->has('judul'))
                <p class="text-danger">{{ $errors->first('judul') }}</p>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                deskripsi
            </div>
            <div class="col-md-6">
                <textarea name="deskripsi" rows="8" cols="80">{{ $blog->deskripsi }}</textarea>
                @if ($errors->has('deskripsi'))
                <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                imgSelect image to upload:
            </div>
            <div class="col-md-6">
                <input type="file" name="fileToUpload" id="fileToUpload" value="">
                @if ($errors->has('fileToUpload'))
                <p class="text-danger">{{ $errors->first('fileToUpload') }}</p>
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="submit" name="submit" value="submit">
            </div>
        </div>
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
    </form>
</div>
@endsection
