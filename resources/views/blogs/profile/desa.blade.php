@extends('layouts.app')
@section('title', 'Profil')
@section('active2', 'active')
@section('content')

<div class="container-fluid ">
    <div class="row justify-content-around">
        <div class="col-sm-2 bg-white rounded-2 border p-4 shadow">
            <h1>Desa</h1> <hr>
            <div class="list-group" id="list-tab" role="tablist">
                @foreach ($desas as $desa)
                    <a class="list-group-item list-group-item-action" id="a{{$desa->kode_desa}}-list" data-toggle="list" href="#a{{$desa->kode_desa}}" role="tab" aria-controls="home">{{$desa->nama_desa}}</a>
                @endforeach
            </div>
        </div>
        <div class="col-sm-7 bg-white rounded-2 border p-4 shadow">
            <form class="mb-4" action="/profile/desa" method="post">
                <div class="row">
                    <div class="col-sm-3">
                        <select name="tahun" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option value="" selected>Tahun...</option>
                            @foreach ($tahun as $thn)
                                @php
                                    $thn = substr($thn->id,0,2);
                                @endphp
                                <option value="{{ $thn }}">20{{ $thn }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm">
                        <input type="submit" name="submit" value="submit" class="btn">
                    </div>
                </div>
                {{ csrf_field() }}
            </form>

            <div class="tab-content" id="nav-tabContent">
                @foreach ($desas as $desa)
                    @php
                        $id = $desa->kode_desa-1;
                        // dd($id);
                    @endphp
                    {{-- {{ dd($luas_wilayah[$id]) }} --}}
                    <div class="tab-pane fade show" id="a{{$id+1}}" role="tabpanel" aria-labelledby="a{{$id+1}}-list">
                            <div class="container-fluid">
                                {{-- Geografis----------------------------- --}}
                                <div class="row">
                                    <div class="col"><h1 id='geografis'><b>Geografis</b></h1></div>
                                </div>
                                    {{-- luas_wilayah --}}
                                <div class="row">
                                    <div class="col"><h2>{{ $geografis[0] }}</h2></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">Luas</div>
                                    <div class="col-sm">: {{ $luas_wilayah[$id]->luas }} Km2</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">% thd. Luas Kecamatan</div>
                                    <div class="col-sm">: {{ $luas_wilayah[$id]->luas_kecamatan }} %</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">Jarak ke Kec.</div>
                                    <div class="col-sm">: {{ $luas_wilayah[$id]->jarak_kecamatan }} Km</div>
                                </div>
                                    {{-- luas_wilayah_tanah --}}
                                <div class="row">
                                    <div class="col"> <h2>{{ $geografis[1] }}</h2> </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Sawah </div>
                                    <div class="col-sm"> : {{ $luas_wilayah_tanah[$id]->sawah }} Ha</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Tegalan </div>
                                    <div class="col-sm"> : {{ $luas_wilayah_tanah[$id]->tegalan }} Ha</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Bang./Pekarangan </div>
                                    <div class="col-sm"> : {{ $luas_wilayah_tanah[$id]->pekarangan }} Ha</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Hutan Negara </div>
                                    <div class="col-sm"> : {{ $luas_wilayah_tanah[$id]->hutan_negara }} Ha</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Lain-lain </div>
                                    <div class="col-sm"> : {{ $luas_wilayah_tanah[$id]->lain_lain }} Ha</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Jumlah </div>
                                    <div class="col-sm"> : {{ $luas_wilayah_tanah[$id]->jumlah }} Ha</div>
                                </div>
                                <hr>
                                {{-- pemerintahan----------------------------- --}}
                                {{-- jumlah dusun --}}
                                <div class="row">
                                    <div class="col"><h1 id='pemerintahan'><b>Pemerintahan</b></h1></div>
                                </div>
                                <div class="row">
                                    <div class="col"><h2>{{ $pemerintah[0] }}</h2></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Kampung/ Dusun </div>
                                    <div class="col-sm"> : {{ $jumlah_dusun[$id]->dusun }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Rukun Warga (RW) </div>
                                    <div class="col-sm"> : {{ $jumlah_dusun[$id]->rw }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Rukun Warga (RT) </div>
                                    <div class="col-sm"> : {{ $jumlah_dusun[$id]->rt }}</div>
                                </div>
                                {{-- pembagian_wilayah --}}
                                <div class="row">
                                    <div class="col"><h2>{{ $pemerintah[1] }}</h2></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Swadaya </div>
                                    <div class="col-sm"> : {{ $pembagian_wilayah[$id]->swadaya }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Swakarsa </div>
                                    <div class="col-sm"> : {{ $pembagian_wilayah[$id]->swakasa }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Swasembada </div>
                                    <div class="col-sm"> : {{ $pembagian_wilayah[$id]->swasembada }}</div>
                                </div>
                                {{-- jumlah_aparat --}}
                                <div class="row">
                                    <div class="col"><h2>{{ $pemerintah[2] }}</h2></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Kepala Desa  </div>
                                    <div class="col-sm"> : {{ $jumlah_aparat[$id]->kepala_desa }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Sekretaris Desa </div>
                                    <div class="col-sm"> : {{ $jumlah_aparat[$id]->sekr }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Kepala Dusun </div>
                                    <div class="col-sm"> : {{ $jumlah_aparat[$id]->kepala_dusun }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Kepala Urusan </div>
                                    <div class="col-sm"> : {{ $jumlah_aparat[$id]->kepala_urusan }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Staf/ Pemb. </div>
                                    <div class="col-sm"> : {{ $jumlah_aparat[$id]->staf }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"> Jumlah </div>
                                    <div class="col-sm"> : {{ $jumlah_aparat[$id]->jumlah }}</div>
                                </div>

                            </div>
                        {{$desa->nama_desa}}
                        {{$id}}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-sm-2 bg-white rounded-2 border p-4 shadow">
            <a href="#geografis">Geografis</a>
            @foreach ($listPoint as $key => $value)

            @endforeach
        </div>
    </div>

</div>
@endsection
