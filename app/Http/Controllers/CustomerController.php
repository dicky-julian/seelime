<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu as mMenu;
use App\Customer as mCustomer;

class CustomerController extends Controller
{
    public function customer()
    {
        $mMenu  = new mMenu();
        $mCustomer = new mCustomer();

        $countMenu   = $mMenu->countMenu();
        $countCustomer = $mCustomer->countCustomer();
        $countTransaksi = $mCustomer->countTransaksi();

        $data = $mCustomer->getPelanggan();

        return view('data.customer',['data' => $data, 'countMenu' => $countMenu, 'countCustomer' => $countCustomer, 'countTransaksi' => $countTransaksi]);
    }
}
