<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Setting;

class SettingController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = Setting::all();
        return view('admin.pages.settings.list', ['datas' => $datas]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Setting::findOrFail($id);
        return view('admin.pages.settings.edit')->with('data',$data);
    }

    public function update(Request $request, $id)
    {
        $data = Setting::findOrFail($id);
        $input = $request->all();
        $data->fill($input)->save();
        Cache::forget('settings');
        $request->session()->flash('alert-success', 'Ürün başarıyla eklendi!');
        return redirect('admin/settings');
    }

    public function destroy($id, Request $request)
    {
        //
    }
}
