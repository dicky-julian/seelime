<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer as mCustomer;
use App\Menu as mMenu;

class TransaksiController extends Controller
{
    public function transaksi()
    {
        $mMenu  = new mMenu();
        $mCustomer  = new mCustomer();

        $countMenu   = $mMenu->countMenu();
        $countCustomer = $mCustomer->countCustomer();
        $countTransaksi = $mCustomer->countTransaksi();

        $data     = $mCustomer->getDataTransaksi();
        
        foreach($data as $d)
        {
            $data = $d;
        }

        return view('data.transaksi', ['data' => $data, 'countMenu' => $countMenu, 'countCustomer' => $countCustomer, 'countTransaksi' => $countTransaksi]);
    }

    public function add_transaksi(Request $request)
    {
        $mCustomer = new mCustomer();
        $mMenu  = new mMenu();

        $countMenu   = $mMenu->countMenu();
        $countCustomer = $mCustomer->countCustomer();
        $countTransaksi = $mCustomer->countTransaksi();

        if (isset($_POST['user_check']))
        {
            $nama_pelanggan     = $request->input('nama_pelanggan');
            $nomor_hp           = $request->input('nomor_hp');
            $alamat             = $request->input('alamat');
            $jenis_kelamin      = $request->input('jenis_kelamin');

            $action    = $mCustomer->check_pelanggan($nama_pelanggan, $nomor_hp);

            if($action['status'] == 1)
            {
                return view('data.add_transaksi',['step' => 'list_pelanggan', 'data' => $action['data'], 'countMenu' => $countMenu, 'countCustomer' => $countCustomer, 'countTransaksi' => $countTransaksi]);
            }
            else
            {
                $action = $mCustomer->createPelanggan($nama_pelanggan, $alamat, $nomor_hp, $jenis_kelamin);
                $data   = $mCustomer->getPelangganByNamaNomor($nama_pelanggan, $nomor_hp);

                return view('data.add_transaksi',['step' => 'confirm_pelanggan', 'data' => $data, 'countMenu' => $countMenu, 'countCustomer' => $countCustomer, 'countTransaksi' => $countTransaksi]);
            }
        }

        else if (isset($_POST['list_menu']))
        {
            $id_pelanggan = $request->input('id_pelanggan');
            $id_user    = 1;
            $id_pesanan = $mCustomer->createPesanan($id_pelanggan, $id_user);
            $data       = $mMenu->getMenu();

            return view('data.add_transaksi',['step' => 'list_menu', 'id_pesanan' => $id_pesanan, 'data' => $data, 'countMenu' => $countMenu, 'countCustomer' => $countCustomer, 'countTransaksi' => $countTransaksi]);
        }

        else if (isset($_POST['submit_transaksi']))
        {
            $data       = $mMenu->getMenu();

            foreach($data as $d)
            {
                $id_pesanan     = $request->input('id_pesanan');
                // jumlah pesanan
                $jumlah{$d->id} = $request->input('jumlah'.$d->id);
                // jumlah bayar
                $bayar          = $request->input('bayar');

                if($jumlah{$d->id} > 0)
                {
                    $mCustomer->createRiwayatPesanan($id_pesanan, $d->id, $jumlah{$d->id});
                }
            }

            $data   = $mMenu->getMenuByIdPesanan($id_pesanan);

            foreach($data as $d)
            {
                $data = $d;
                $total = 0;

                foreach($data as $d)
                {
                    $sum_total = $d->jumlah * $d->harga;
                    $total += $sum_total;
                }
            }

            $mCustomer->addTransaksi($id_pesanan, $total, $bayar);

            return view('data.add_transaksi',['step' => 'submit_transaksi', 'data' => $data, 'bayar' => $bayar, 'total' => $total, 'countMenu' => $countMenu, 'countCustomer' => $countCustomer, 'countTransaksi' => $countTransaksi]);
        }

        else
        {
            return view('data.add_transaksi',['step' => 'user_check', 'countMenu' => $countMenu, 'countCustomer' => $countCustomer, 'countTransaksi' => $countTransaksi]);
        }
    }

    public function delete_transaksi($id_pesanan)
    {
        $mCustomer  = new mCustomer();
        $mCustomer->deleteTransaksi($id_pesanan);

        return redirect('/transaksi');
    }
}
