<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use App\Headline;

class HeadlineController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = Headline::all();
        return view('admin.pages.headlines.list')->with('datas',$datas);
    }

    public function create()
    {
        return view('admin.pages.headlines.new');
    }

    public function store(Request $request)
    {

        $messages = [
            'required' => 'Manşet ismini girmelisiniz.',
        ];

        $this->validate($request, [
            'name' => 'required|max:255'
        ], $messages);

        $input = $request->all();

        if ($request->hasFile('image')) {
            if ($request->image->isValid()) {
                $extension = $request->image->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension;
                $request->image->move(config('settings.site_upload').'/headlines', $fileName);
                $input ['image']= $fileName;
            }
        }
        else
        {
            $input ['image']= "default.png";
        }

        Headline::create($input);
        
        $request->session()->flash('alert-success', 'Manşet başarıyla eklendi!');
        return redirect('admin/headlines');
    }

    public function show($id)
    {
        $data = Headline::findOrFail($id);
        return view('admin.pages.headlines.show')->with('data',$data);
    }

    public function edit($id)
    {
        $data = Headline::findOrFail($id);
        return view('admin.pages.headlines.edit')->with('data',$data);
    }

    public function update(Request $request, $id)
    {
        
        $messages = [
            'required' => 'Manşet ismini girmelisiniz.',
        ];

        $this->validate($request, [
            'name' => 'required|max:255'
        ], $messages);

        $input = $request->all();

        if ($request->hasFile('image')) {
            if ($request->image->isValid()) {
                $extension = $request->image->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension;
                $request->image->move(config('settings.site_upload').'/headlines', $fileName);
                $input ['image']= $fileName;
                File::delete(config('settings.site_upload').'/headlines/'.$input['oldimage']);
            }
            else
            {
                $request->session()->flash('alert-danger', 'Dosya yüklemede hata oluştu!');
                return redirect('admin/headlines');        
            }
        }

        $data = Headline::findOrFail($id);
        $data->fill($input)->save();
        
        $request->session()->flash('alert-success', 'Manşet başarıyla güncellendi!');
        return redirect('admin/headlines');
    }

    public function destroy($id, Request $request)
    {
        $data = Headline::findOrFail($id);
        File::delete(config('settings.site_upload').'/headlines/'.$data->image);
        $data->delete();
        $request->session()->flash('alert-success', 'Manşet başarıyla silindi!');
        return redirect('admin/headlines');
    }
}