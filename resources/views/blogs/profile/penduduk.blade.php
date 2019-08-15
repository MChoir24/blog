@extends('layouts.app')
@section('title', 'Profil')
@section('active2', 'active')
@section('content')

<div class="container bg-white border rounded-2 p-4 shadow">
    <h1 class="mb-4">Penduduk</h1>
    <form class="mb-4" action="/profile/penduduk" method="post">
        <div class="row">
            <div class="col-sm-3">
                <select name="tahun" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Tahun...</option>
                    @foreach ($tahun as $key)
                        @php
                            $thn = substr($key->id, 0, 2);
                        @endphp
                        <option value={{ $thn }}>20{{ $thn }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm">
                <input type="submit" name="submit" value="submit" class="btn">
            </div>
        </div>
        {{ csrf_field() }}
    </form>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Umur</th>
                <th scope="col">Laki-laki</th>
                <th scope="col">Perempuan</th>
                <th scope="col">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($penduduks as $penduduk)
                <tr>
                    <th scope="row">{{ $no }}</th>
                    <td>{{ $penduduk->umur }}</td>
                    <td>{{ $penduduk->laki }}</td>
                    <td>{{ $penduduk->perempuan }}</td>
                    <td>{{ $penduduk->jumlah }}</td>
                </tr>
                @php
                    $no+=1;
                @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection
