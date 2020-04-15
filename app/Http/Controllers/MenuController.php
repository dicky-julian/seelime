<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Menu as mMenu;
use App\Customer as mCustomer;

class MenuController extends Controller
{
    public function menu()
    {
        $mMenu  = new mMenu();
        $mCustomer = new mCustomer();
        
        $data   = $mMenu->getMenu();
        
        $order  = $mMenu->getMenuByIdAndCount();

        $countMenu   = $mMenu->countMenu();
        $countCustomer = $mCustomer->countCustomer();
        $countTransaksi = $mCustomer->countTransaksi();

        return view('data.menu', ['data' => $data, 'countMenu' => $countMenu, 'countCustomer' => $countCustomer, 'countTransaksi' => $countTransaksi]);
    }


    public function add_menu(Request $request)
    {
        $mMenu  = new mMenu();
        $mCustomer = new mCustomer();

        $countMenu   = $mMenu->countMenu();
        $countCustomer = $mCustomer->countCustomer();
        $countTransaksi = $mCustomer->countTransaksi();

        if(isset($_POST['add_menu']))
        {
            $nama_menu  = $request->input('nama_menu');
            $harga      = $request->input('harga');
            $type       = $request->input('type');
            $file_menu  = $request->file('foto');
            
            $file_extens= $file_menu->getClientOriginalExtension();
            
            $file_name  = Crypt::encryptString($nama_menu).'.'.$file_extens;
            $file_location = 'assets\img\menus';
            $file = $file_menu->move($file_location, $file_name);

            $mMenu = new mMenu();
            $action = $mMenu->addMenu($nama_menu, $harga, $type, $file_name);

            return redirect('/menus');
        } 
        else
        {
            return view('data.add_menu', ['countMenu' => $countMenu, 'countCustomer' => $countCustomer, 'countTransaksi' => $countTransaksi]);
        }
    }

    public function update_menu(Request $request, $id)
    {
        if(isset($_POST['update_menu']))
        {
            $nama_menu  = $request->input('nama_menu');
            $harga      = $request->input('harga');
            $type       = $request->input('type');
            $file_menu  = $request->file('foto');
            $file_extens= $file_menu->getClientOriginalExtension();
            $file_name  = Crypt::encryptString($nama_menu).'.'.$file_extens;

            $mMenu      = new mMenu();
            $action     = $mMenu->getMenuById($id);
            $data       = (array)$action;

            $file_loc   = 'assets/img/menus';
            $file       = $data['data']['file_name'];
            
            $delFile    = \File::delete($file_loc.'/'.$file);

            if($delFile == true)
            {
                $file_menu->move($file_loc, $file_name);
                $action = $mMenu->updateMenu($id, $nama_menu, $harga, $type, $file_name);
                return redirect('/menus');
            }   
            else
            {
                return redirect('/menus');
            }         
        }
        else
        {
            $mMenu  = new mMenu();
            $mCustomer = new mCustomer();

            $countMenu   = $mMenu->countMenu();
            $countCustomer = $mCustomer->countCustomer();
            $countTransaksi = $mCustomer->countTransaksi();

            $action = $mMenu->getMenuById($id);
            $data   = (array)$action;
            
            return view('data.update_menu', ['data' => $data, 'countMenu' => $countMenu, 'countCustomer' => $countCustomer, 'countTransaksi' => $countTransaksi]);
        }
    }

    public function delete_menu($id)
    {
        $mMenu      = new mMenu();
        $action     = $mMenu->getMenuById($id);
        $data       = (array)$action;

        $file_loc   = 'assets/img/menus';
        $file       = $data['data']['file_name'];
        
        $delFile    = \File::delete($file_loc.'/'.$file);

        if($delFile == true)
            {
                $mMenu->delMenu($id);
                return redirect('/menus');
            }   
            else
            {
                return redirect('/menus');
            }     
    }

    public function find_menu(Request $request)
    {
        $nama_menu = $request->input('nama_menu');

        $mMenu  = new mMenu();
        $mCustomer = new mCustomer();

        $countMenu   = $mMenu->countMenu();
        $countCustomer = $mCustomer->countCustomer();
        $countTransaksi = $mCustomer->countTransaksi();
            
        $data   = $mMenu->getMenuByName($nama_menu);

        return view('data.menu',['data' => $data, 'countMenu' => $countMenu, 'countCustomer' => $countCustomer, 'countTransaksi' => $countTransaksi]);
    }
}