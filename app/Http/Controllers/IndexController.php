<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Menu as mMenu;
use App\Customer as mCustomer;

class IndexController extends Controller
{
    public function dashboard()
    {
        $mMenu  = new mMenu();
        $mCustomer = new mCustomer();

        $countMenu   = $mMenu->countMenu();
        $countCustomer = $mCustomer->countCustomer();
        $countTransaksi = $mCustomer->countTransaksi();

        $data = $mMenu->getMenuLimit(5);

        return view('data.index',['data' => $data, 'countMenu' => $countMenu, 'countCustomer' => $countCustomer, 'countTransaksi' => $countTransaksi]);
    }
}
