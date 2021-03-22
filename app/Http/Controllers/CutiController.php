<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Cuti;
use App\Karyawan;
use App\CutiDetail;

class CutiController extends Controller
{
    public function index()
   {
    $karyawan = Karyawan::all();
    return view('cuti.index', compact('karyawan')); 
   }

   public function listData()
   {
   
    $cuti = Cuti::leftJoin('karyawan', 'karyawan.id_karyawan', '=', 'cuti.id_karyawan')
    ->orderBy('cuti.id_cuti', 'desc')
    ->get();
        $no = 0;
        $data = array();
     foreach($cuti as $list){
       $no ++;
       $row = array();
       $row[] = $no;
       $row[] = $list->no_induk;
       $row[] = $list->nama;
       $row[] = $list->tgl_cuti;
       $row[] = $list->lama_cuti;
       $row[] = $list->keterangan;
       $row[] = '<div class="btn-group">
               <a onclick="editForm('.$list->id_cuti.')" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
               <a onclick="deleteData('.$list->id_cuti.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
       $data[] = $row;
     }

     $output = array("data" => $data);
     return response()->json($output);
   }

   public function store(Request $request)
   {

      $cuti = new Cuti;
      $cuti->no_induk   = $request['no_induk'];
      $cuti->tgl_cuti   = $request['tgl_cuti'];
      $cuti->lama_cuti = $request['lama_cuti'];
      $cuti->keterangan = $request['keterangan'];
      $cuti->save();

   }

   public function edit($id)
   {
     $cuti = Cuti::find($id);
     echo json_encode($cuti);
   }

   public function update(Request $request, $id)
   {
      $cuti = Cuti::find($id);
      $cuti->no_induk   = $request['no_induk'];
      $cuti->nama   = $request['nama'];
      $cuti->tgl_cuti   = $request['tgl_cuti'];
      $cuti->lama_cuti = $request['lama_cuti'];
      $cuti->keterangan = $request['keterangan'];
      $cuti->update();
   }

   public function destroy($id)
   {
      $cuti = Cuti::find($id);
      $cuti->delete();
   }

   
}
