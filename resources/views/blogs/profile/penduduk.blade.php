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
                    <option value="11">2011</option>
                    <option value="12">2012</option>
                    <option value="13">2013</option>
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
            <tr>
                <th scope="row">1</th>
                <td>0-4</td>
                <td>xxx</td>
                <td>xxx</td>
                <td>xxx</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
