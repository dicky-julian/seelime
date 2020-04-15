<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    public function getDataTransaksi()
    {
        $data = DB::table('pesanan')
        ->join('transaksi','pesanan.id','=','transaksi.id_pesanan')
        ->join('pelanggan','pesanan.id_pelanggan','=','pelanggan.id')
        ->join('users','pesanan.id_user','=','users.id')
        ->get();

        return (array)$data;
    }

    public function getPelanggan()
    {
        $data = DB::table('pelanggan')->get();

        return $data;
    }

    public function check_pelanggan($nama_pelanggan, $nomor_hp)
    {
        $data = DB::table('pelanggan')->where([
            ['nama_pelanggan', 'like', '%'.$nama_pelanggan.'%'],
            ['nomor_hp', '=', $nomor_hp],
        ])->get();

        $data = $data->toArray();

        if(empty($data))
        {
            return [
                'status'    => 0,
            ];
        } else {
            return [
                'status'    => 1,
                'data'      => $data
            ];
        }
    }

    public function getPelangganByNamaNomor($nama_pelanggan, $nomor_hp)
    {
        $data = DB::table('pelanggan')->where([
            ['nama_pelanggan', '=', $nama_pelanggan],
            ['nomor_hp', '=', $nomor_hp],
        ])->first();

        return $data;
    }

    public function createPelanggan($nama_pelanggan, $alamat, $nomor_hp, $jenis_kelamin)
    {
        DB::table('pelanggan')
        ->insert(['nama_pelanggan' => $nama_pelanggan, 'alamat' => $alamat, 'nomor_hp' => $nomor_hp, 'jenis_kelamin' => $jenis_kelamin]);
    }

    public function createPesanan($id_pelanggan, $id_user)
    {
        $data = DB::table('pesanan')
        ->insertGetId(['id_pelanggan' => $id_pelanggan, 'id_user' => $id_user]);

        return $data;
    }

    public function createRiwayatPesanan($id_pesanan, $id_menu, $jumlah)
    {
        DB::table('riwayat_pesanan')
        ->insert(['id_pesanan' => $id_pesanan, 'id_menu' => $id_menu, 'jumlah' => $jumlah]);
    }

    public function addTransaksi($id_pesanan, $total, $bayar)
    {
        DB::table('transaksi')
        ->insert(['id_pesanan' => $id_pesanan, 'total' => $total, 'bayar' => $bayar]);
    }

    public function countCustomer()
    {
        $data = DB::table('pelanggan')->count();
        
        return $data;
    }

    public function countTransaksi()
    {
        $data = DB::table('transaksi')->count();
        
        return $data;
    }

    public function deleteTransaksi($id_pesanan)
    {
        DB::table('transaksi')->where('id_pesanan', $id_pesanan)->delete();
        DB::table('riwayat_pesanan')->where('id_pesanan', $id_pesanan)->delete();
        DB::table('pesanan')->where('id', $id_pesanan)->delete();
    }
}
