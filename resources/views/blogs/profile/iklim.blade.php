@extends('layouts.app')
@section('title', 'Profil')
@section('active2', 'active')
@section('content')

<div class="container bg-white border rounded-2 p-4 shadow">
    <h1 class="mb-4">Iklim</h1>
    <form class="mb-4" action="/profile/iklim" method="post">
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
                <th scope="col">Bulan</th>
                <th scope="col">Curah Hujan (mm)</th>
                <th scope="col">Hari Hujan</th>
                <th scope="col">Rata-rata curah hujan (mm/hari)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($iklims as $iklim)
                <tr>
                    <th scope="row">{{ $no }}</th>
                    <td>{{ $iklim->bulan }}</td>
                    <td>{{ $iklim->curah_hujan }}</td>
                    <td>{{ $iklim->hari_hujan }}</td>
                    <td>{{ $iklim->rata_curah_hujan }}</td>
                </tr>
                @php
                    $no+=1;
                @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection
