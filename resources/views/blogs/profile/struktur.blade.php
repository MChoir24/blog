@extends('layouts.app')
@section('title', 'Profil')
@section('active2', 'active')
@section('content')

    <div class="container bg-white border rounded-2 p-4 shadow">
        <div class="row justify-content-between">
            <div class="col-md-2"> <h1>Struktur</h1> </div>
            <div class="col-md-auto"> <a class="btn btn-primary" href="#" role="button">Lihat pohon Struktur >></a> </div>
        </div>
        <hr>
        <div class="row">
            <div class="col mb-4"> <h1>Kepegawaian</h1> </div>
        </div>
        @for ($i=0; $i < 3; $i++)
            <div class="row border">
                <div class="col-md-auto pl-0">
                    <img class="fiximg-profile" src="/img/profile/photo_profile.png" alt="">
                </div>
                <div class="col-md-auto py-2">
                    <p>Nama: Fulan <br>
                        jabatan: ...</p>
                    </div>
                </div>
        @endfor
    </div>
@endsection
