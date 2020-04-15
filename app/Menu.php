<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    public function getMenu()
    {
        $data = DB::table('menu')->get();

        return $data;
    }

    public function getMenuLimit($limit)
    {
        $data = DB::table('menu')->limit($limit)->get();

        return $data;
    }

    public function getMenuById($id)
    {
        $data = DB::table('menu')->where('id', $id)->first();

        return [
            'data' => (array)$data
        ];
    }

    public function getMenuByName($nama_menu)
    {
        $data = DB::table('menu')->where('nama_menu', 'like', '%'.$nama_menu.'%')
        ->get();

        return $data;
    }

    public function getMenuByIdAndCount()
    {
        $data = DB::table('menu')
            ->join('riwayat_pesanan', 'menu.id', '=', 'riwayat_pesanan.id_menu')
            ->select('riwayat_pesanan.id_menu')
            ->get();
    }

    public function getMenuByIdPesanan($id_pesanan)
    {
        $data = DB::table('menu')
        ->join('riwayat_pesanan', 'menu.id', '=', 'riwayat_pesanan.id_menu')
        ->where('riwayat_pesanan.id_pesanan','=', $id_pesanan)
        ->get();

        return (array)$data;
    }

    public function addMenu($nama_menu, $harga, $type, $file_name)
    {
        
       DB::table('menu')->insert(
            ['nama_menu' => $nama_menu, 'harga' => $harga, 'type' => $type, 'file_name' => $file_name]
        );
    }

    public function updateMenu($id, $nama_menu, $harga, $type, $file_name)
    {
        DB::table('menu')->where('id', $id)
        ->update(['nama_menu' => $nama_menu, 'harga' => $harga, 'type' => $type, 'file_name' => $file_name]);
    }

    public function delMenu($id)
    {
        DB::table('menu')->where('id', $id)
        ->delete();
    }

    public function countMenu()
    {
        $data = DB::table('menu')->count();
        
        return $data;
    }
}
