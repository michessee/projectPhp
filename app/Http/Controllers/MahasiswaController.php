<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mahasiswa;

use Illuminate\Support\Facades\DB;
use Session;

use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa',['mahasiswa'=>$mahasiswa]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:csv,txt,xls,xlsx'
        ]);

        $file = $request->file('file');

        $file_name = rand().$file->getClientOriginalName();

        $file->move('file_siswa',$file_name);

        Excel::import(new MahasiswaImport, public_path('/file_siswa/'.$file_name));

        Session::flash('sukses','Import Data Success');

        return redirect('/mahasiswa');
    }
}
