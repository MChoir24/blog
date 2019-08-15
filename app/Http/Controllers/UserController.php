<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Blog;

class UserController extends Controller
{
    public function __construct()
    {
        $desa = array('1' => 1);
    }

    public function main()
    {
        $blogs = Blog::orderBy('CREATED_AT','DESC')->get()->take(3);
        $visi = DB::table('visi_misi')->first();

        $data = array('blogs' => $blogs,
                        'visi' => $visi);
        return view('blogs/welcome', $data);
    }
    public function berita()
    {
        $blogs = Blog::orderBy('CREATED_AT','DESC')->paginate(3);
        // dd($blogs);
        // return Blog::paginate();

        return view('blogs/berita', ['blogs' => $blogs]);
    }

    public function detail($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            abort(404);
        }
        return view('blogs/detail',['blog'=>$blog]);
    }

    public function search()
    {
        $blogs = Blog::orderBy('CREATED_AT','DESC')->paginate(3);
        if (!$blogs) {
            abort(404);
        }
        // $blogs->withPath('search/result');
        // dd($blogs->count());
        return view('blogs/search',['blogs'=>$blogs]);
    }

    public function search1(Request $request)
    {
        $blogs = Blog::whereRaw("deskripsi like '%$request->word%' or judul like '%$request->word%'")->orderBy('CREATED_AT','DESC')->paginate(3);
        if (!$blogs) {
            abort(404);
        }
        // dd($blogs->count());
        // return Blog::paginate();
        $blogs->withPath('search/result');
        return view('blogs/search',['blogs'=>$blogs, 'word'=>$request->word]);
    }

    public function iklim()
    {
        $tahun = DB::table('iklim')->select('id')->where('id', 'like', '%01')->orderBy('id','asc')->get(); // ambil tahun
        $table = DB::table('iklim')->orderBy('id','desc')->get(); // get data

        $data = array('iklims' => $table, 'tahun' => $tahun);
        return view('/blogs/profile/iklim',$data);
        // dd($table);
    }

    public function filter_iklim(Request $request)
    {
        $tahun = DB::table('iklim')->select('id')->where('id', 'like', '%01')->orderBy('id','asc')->get(); // ambil tahun
        $table = DB::table('iklim')->where('id','like',$request->tahun.'%')->orderBy('id','desc')->get();
        $data = array('iklims' => $table, 'tahun' => $tahun);
        return view('/blogs/profile/iklim',$data);
    }

    public function geografis()
    {
        $table = DB::table('geografis')->orderBy('id', 'desc')->first();
        $data = array('ha' => $table->luas_ha,
                    'km2' => $table->luas_km2,
                    'tinggi' => $table->tinggi,
                    'batas_utara' => $table->batas_utara,
                    'batas_timur' => $table->batas_timur,
                    'batas_selatan' => $table->batas_selatan,
                    'batas_barat' => $table->batas_barat);
        return view('blogs/profile/geografis', $data);
    }

    public function penduduk()
    {
        $tahun = DB::table('proyeksi_penduduk')->select('id')->where('id', 'like', '%01')->orderBy('id','asc')->get(); // ambil tahun
        $table = DB::table('proyeksi_penduduk')->orderBy('id','desc')->get(); // get data

        $data = array('penduduks' => $table, 'tahun' => $tahun);
        return view('/blogs/profile/penduduk',$data);
    }
    public function filter_penduduk(Request $request)
    {
        $tahun = DB::table('proyeksi_penduduk')->select('id')->where('id', 'like', '%01')->orderBy('id','asc')->get(); // ambil tahun
        $table = DB::table('proyeksi_penduduk')->where('id','like',$request->tahun.'%')->orderBy('id','desc')->get();

        $data = array('penduduks' => $table, 'tahun' => $tahun);
        return view('/blogs/profile/penduduk',$data);
    }

    public function desa(Request $request)
    {
        if ($request->tahun == null) {
            $request->tahun = '';
        }
        $desa = DB::table('desa')->orderBy('kode_desa', 'asc')->get();

        $tahun = DB::table('luas_wilayah')->select('id')->where('id', 'like','%01')->get(); // ambil tahun

        //geografis
        $luas_wilayah = DB::table('luas_wilayah')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $luas_wilayah_tanah = DB::table('luas_wilayah_tanah')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        // dd($luas_wilayah);
        //pemerintahan
        $jumlah_dusun = DB::table('jumlah_dusun')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $pembagian_wilayah = DB::table('pembagian_wilayah')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $jumlah_aparat = DB::table('jumlah_aparat')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $luas_tanah_bengkok = DB::table('luas_tanah_bengkok')->where('id', 'like', $request->tahun.'%')->limit(13)->get();

        //penduduk
        $jumlah_rumah_tangga = DB::table('jumlah_rumah_tangga')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $kepadatan_penduduk = DB::table('kepadatan_penduduk')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $sex_ratio = DB::table('sex_ratio')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $jumlah_kelahiran_kematian = DB::table('jumlah_kelahiran_kematian')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $jumlah_rumah_tangga_menurut_penerangan = DB::table('jumlah_rumah_tangga_menurut_penerangan')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $jumlah_rumah_tangga_menurut_penggunaan_bahan_bakar = DB::table('jumlah_rumah_tangga_menurut_penggunaan_bahan_bakar')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $jumlah_rumah_tangga_menurut_penggunaan_sumber_air = DB::table('jumlah_rumah_tangga_menurut_penggunaan_sumber_air')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $rumah_tangga_menurut_sektor_ekonomi = DB::table('rumah_tangga_menurut_sektor_ekonomi')->where('id', 'like', $request->tahun.'%')->limit(13)->get();

        //sosial
        $jumlah_sekolah_negeri_swasta = DB::table('jumlah_sekolah_negeri_swasta')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $jumlah_sekolah_islam = DB::table('jumlah_sekolah_islam')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $jumlah_sarana_kesehatan = DB::table('jumlah_sarana_kesehatan')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $jumlah_tenaga_kesehatan = DB::table('jumlah_tenaga_kesehatan')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $jumlah_keluarga_kesejahteraan = DB::table('jumlah_keluarga_kesejahteraan')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $jumlah_posyandu = DB::table('jumlah_posyandu')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $peserta_kb = DB::table('peserta_kb')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $realasi_pencapaian = DB::table('realasi_pencapaian')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $jumlah_pemeluk_agama = DB::table('jumlah_pemeluk_agama')->where('id', 'like', $request->tahun.'%')->limit(13)->get();
        $jumlah_tempat_peribadatan = DB::table('jumlah_tempat_peribadatan')->where('id', 'like', $request->tahun.'%')->limit(13)->get();

        $listPoint = array('Geografis', 'Pemerintah', 'Penduduk', 'Sosial');
        $geografis = array('Luas Wilayah dan Jarak Desa ke Kecamatan',
            'Luas Wilayah Menurut Jenis Penggunaan Tanah (Ha)');
        $pemerintah = array('Jumlah Kampung/ Dusun, RT dan RW per desa',
            'Pembagian Wilayah Administrasi Pemerintahan',
            'Jumlah Aparat Pemerintah Desa / Pamong Desa',
            'Luas Tanah Bengkok Perangkat Desa (Ha)');
        $penduduk = array('Luas Wilayah, Jumlah Rumah Tangga dan Jumlah Penduduk',
            'Kepadatan Penduduk  dan  Rumahtangga  per Km2',
            'Penduduk  menurut Jenis Kelamin dan Sex Ratio',
            'Jumlah Kelahiran dan Kematian Menurut Jenis Kelamin',
            'Jumlah Rumah Tangga Menurut Penggunaan Penerangan',
            'Rumah Tangga menurut Penggunaan Bahan Bakar',
            'Rumah Tangga menurut Penggunaan Sumber Air untuk Memasak',
            'Rumah Tangga menurut Sektor Ekonomi');
        $sosial = array('Jumlah Sekolah Negeri dan Swasta',
            'Jumlah Sekolah Islam',
            ' Jumlah Sarana Kesehatan',
            'Jumlah Tenaga Kesehatan',
            'Jumlah Keluarga menurut Tahapan Kesejahteraan',
            'Jumlah Posyandu, Pos KB dan Kader Pelaksana KB',
            'Peserta KB Aktif menurut Alat kontrasepsi yang Digunakan',
            'Realisasi Pencapaian Akseptor KB Baru',
            'Jumlah Pemeluk Agama',
            'Jumlah Tempat Peribadatan',);

        $data = array(
            'desas' => $desa,
            'tahun' => $tahun,
            'coba' => $request->tahun,
            //table
            'luas_wilayah' => $luas_wilayah,
            'luas_wilayah_tanah' => $luas_wilayah_tanah,
            'jumlah_dusun' => $jumlah_dusun,
            'jumlah_dusun' => $jumlah_dusun,
            'pembagian_wilayah' => $pembagian_wilayah,
            'jumlah_aparat' => $jumlah_aparat,
            'luas_tanah_bengkok' => $luas_tanah_bengkok,
            'jumlah_rumah_tangga' => $jumlah_rumah_tangga,
            'kepadatan_penduduk' => $kepadatan_penduduk,
            'sex_ratio' => $sex_ratio,
            'jumlah_kelahiran_kematian' => $jumlah_kelahiran_kematian,
            'jumlah_rumah_tangga_menurut_penerangan' => $jumlah_rumah_tangga_menurut_penerangan,
            'jumlah_rumah_tangga_menurut_penggunaan_bahan_bakar' => $jumlah_rumah_tangga_menurut_penggunaan_bahan_bakar,
            'jumlah_rumah_tangga_menurut_penggunaan_sumber_air' => $jumlah_rumah_tangga_menurut_penggunaan_sumber_air,
            'rumah_tangga_menurut_sektor_ekonomi' => $rumah_tangga_menurut_sektor_ekonomi,
            'jumlah_sekolah_negeri_swasta' => $jumlah_sekolah_negeri_swasta,
            'jumlah_sekolah_islam' => $jumlah_sekolah_islam,
            'jumlah_sarana_kesehatan' => $jumlah_sarana_kesehatan,
            'jumlah_tenaga_kesehatan' => $jumlah_tenaga_kesehatan,
            'jumlah_keluarga_kesejahteraan' => $jumlah_keluarga_kesejahteraan,
            'jumlah_posyandu' => $jumlah_posyandu,
            'peserta_kb' => $peserta_kb,
            'realasi_pencapaian' => $realasi_pencapaian,
            'jumlah_pemeluk_agama' => $jumlah_pemeluk_agama,
            'jumlah_tempat_peribadatan' => $jumlah_tempat_peribadatan,

            //list Point
            'listPoint' => $listPoint,
            'geografis' => $geografis,
            'pemerintah' => $pemerintah,
            'penduduk' => $penduduk,
            'sosial' => $sosial
    );
        return view('/blogs/profile/desa',$data);
    }
}
