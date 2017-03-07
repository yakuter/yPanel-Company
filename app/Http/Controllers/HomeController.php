<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\User;
use App\Setting;
use App\Category;
use App\Product;
use App\Customer;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        /*
        $site_datas = Setting::all();
        foreach ($site_datas as $data) {
            session([$data->slug => $data->value]);
        }*/
        
        //$user_info = Auth::user();
        
        /*
        $user = Cache::remember('user', '60', function () {
            return Auth::user();
        });
        */

        /*
        session(['user_name_surname'=>$user_info->name_surname]);
        session(['user_image'=>$user_info->image]);
        session(['user_id'=>$user_info->id]);
        */
        
        

        /*$data = User::findOrFail($id);

        var_dump($data)
        session(['UserID' => $id]);

        echo session('UserID');

        */
        
        /*$kategoriler = Kategori::all();
        $urunler = Urun::all();
        $firmalar = Firma::all();
        return view (   'admin.pages.home', 
                        ['urunler' => $urunler], 
                        ['kategoriler' => $kategoriler], 
                        ['customers' => $customers]
                    );
        */
        
        return view ('admin.pages.home');
    }
}