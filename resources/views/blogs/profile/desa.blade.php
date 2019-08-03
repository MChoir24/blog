@extends('layouts.app')
@section('title', 'Profil')
@section('active2', 'active')
@section('content')
<div class="container-fluid ">
    <div class="row justify-content-around">
        <div class="col-sm-2 bg-white rounded-2 border p-4 shadow">
            <h1>Desa/Kelurahan</h1> <hr>
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="desa1-list" data-toggle="list" href="#desa1" role="tab" aria-controls="home">desa 1</a>
                <a class="list-group-item list-group-item-action" id="desa2-list" data-toggle="list" href="#desa2" role="tab" aria-controls="profile">desa 2</a>
                <a class="list-group-item list-group-item-action" id="desa3-list" data-toggle="list" href="#desa3" role="tab" aria-controls="messages">desa 3</a>
                <a class="list-group-item list-group-item-action" id="desa4-list" data-toggle="list" href="#desa4" role="tab" aria-controls="settings">desa 4</a>
            </div>
        </div>
        <div class="col-sm-7 bg-white rounded-2 border p-4 shadow">
            <form class="mb-4" action="/profile/desa" method="post">
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
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="desa1" role="tabpanel" aria-labelledby="desa1-list">desa 1</div>
                <div class="tab-pane fade" id="desa2" role="tabpanel" aria-labelledby="desa2-list">desa 2</div>
                <div class="tab-pane fade" id="desa3" role="tabpanel" aria-labelledby="desa3-list">desa 3</div>
                <div class="tab-pane fade" id="desa4" role="tabpanel" aria-labelledby="desa4-list">desa 4</div>
            </div>
        </div>
        <div class="col-sm-2 bg-white rounded-2 border p-4 shadow">
            @for ($i=0; $i < 10; $i++)
                <a href="#">a</a><br>
            @endfor
        </div>
    </div>

</div>
@endsection
