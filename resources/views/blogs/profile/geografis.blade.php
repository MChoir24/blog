@extends('layouts.app')
@section('title', 'Geografis')
@section('active2', 'active')
@section('content')

    <div class="container bg-white border rounded-2 p-4 shadow">
        <h1 class="mb-4">Letak Geografis Kecamatan Labang</h1>
        <ol type="I">
            <div class="row">
                <div class="col-sm-3 my-2"><li>Luas</li></div>
                <div class="col-sm-4">: {{$ha}} Ha</div>
            </div>
            <div class="row">
                <div class="col-sm-3 my-2">&nbsp;</div>
                <div class="col-sm-4">: {{ $km2 }} Km2</div>
            </div>
            <div class="row">
                <div class="col-sm-3 my-2"><li>Tinggi Dari Permukaan laut</li></div>
                <div class="col-sm-4">: {{ $tinggi }} m</div>
            </div>
            <div class="row">
                <div class="col-sm-3 my-2"><li>Batasan-batasannya</div>
            </div>
            <ul>
                <div class="row">
                    <div class="col-sm-3 my-2"><li>Sebelah Utara</li></div>
                    <div class="col-sm-4">: {{ $batas_utara }}</div>
                </div>
                <div class="row">
                    <div class="col-sm-3 my-2"><li>Sebelah Timur</li></div>
                    <div class="col-sm-4">: {{ $batas_timur }}</div>
                </div>
                <div class="row">
                    <div class="col-sm-3 my-2"><li>Sebelah Selatan</li></div>
                    <div class="col-sm-4">: {{ $batas_selatan }}</div>
                </div>
                <div class="row">
                    <div class="col-sm-3 my-2"><li>Sebelah Barat</li></div>
                    <div class="col-sm-4">: {{ $batas_barat }}</div>
                </div>
                </li>
            </ul>
        </ol>
    </div>
@endsection
