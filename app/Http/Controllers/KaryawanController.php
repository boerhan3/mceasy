<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;

class KaryawanController extends Controller
{
    public function index()
   {
      return view('karyawan.index'); 
   }

   public function listData()
   {
   
     $karyawan = Karyawan::orderBy('id_karyawan', 'desc')->get();
     $no = 0;
     $data = array();
     foreach($karyawan as $list){
       $no ++;
       $row = array();
       $row[] = $no;
       $row[] = $list->no_induk;
       $row[] = $list->nama;
       $row[] = $list->alamat;
       $row[] = $list->tgl_lahir;
       $row[] = $list->tgl_gabung;
       $row[] = $list->sisa_cuti;
       $row[] = '<div class="btn-group">
               <a onclick="editForm('.$list->id_karyawan.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
               <a onclick="deleteData('.$list->id_karyawan.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
       $data[] = $row;
     }

     $output = array("data" => $data);
     return response()->json($output);
   }

   public function store(Request $request)
   {

      $karyawan = new Karyawan;
      $karyawan->no_induk   = $request['no_induk'];
      $karyawan->nama   = $request['nama'];
      $karyawan->alamat = $request['alamat'];
      $karyawan->tgl_lahir = $request['tgl_lahir'];
      $karyawan->tgl_gabung = $request['tgl_gabung'];
      $karyawan->save();

   }

   public function edit($id)
   {
     $karyawan = Karyawan::find($id);
     echo json_encode($karyawan);
   }

   public function update(Request $request, $id)
   {
      $karyawan = Karyawan::find($id);
      $karyawan->no_induk   = $request['no_induk'];
      $karyawan->nama   = $request['nama'];
      $karyawan->alamat = $request['alamat'];
      $karyawan->tgl_lahir = $request['tgl_lahir'];
      $karyawan->tgl_gabung = $request['tgl_gabung'];
      $karyawan->update();
   }

   public function destroy($id)
   {
      $karyawan = Karyawan::find($id);
      $karyawan->delete();
   }
}
