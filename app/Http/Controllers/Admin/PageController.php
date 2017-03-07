<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use App\Page;

class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $search = \Request::get('search');

        if ($search!==null) {

            $datas = Page::where('name', 'like', '%'.$search.'%')
                          ->orWhere('slug', 'like', '%'.$search.'%')
                          ->orWhere('info', 'like', '%'.$search.'%')
                          ->orWhere('description', 'like', '%'.$search.'%')
                          ->orWhere('keywords', 'like', '%'.$search.'%')
                          ->paginate(10);
        } else {
            $datas = Page::paginate(10);
        }
        
        return view('admin.pages.pages.list')->with('datas',$datas)->with('search',$search);
    }

    public function create()
    {
        return view('admin.pages.pages.new');
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Lütfen başlığı giriniz!',
            'info.required' => 'Lütfen sayfa metnini giriniz!'
        ];

        $this->validate($request,[
            'name' => 'required|max:255',
            'info' => 'required'
        ], $messages);
        
        $input = $request->all();
        $input ['permalink']= str_slug($input['name'],'-');
        
        if ($request->hasFile('image')) {
            if ($request->image->isValid()) {
                $extension = $request->image->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension;
                $request->image->move(config('settings.site_upload').'/pages', $fileName);
                $input ['image']= $fileName;
            }
            else
            {
                $request->session()->flash('alert-danger', 'Dosya yüklemede hata oluştu!');
                return redirect('admin/pages');        
            }
        }
        else
        {
            $input ['image']= "default.png";
        }
        
        Page::create($input);
        $request->session()->flash('alert-success', 'Yazı başarıyla eklendi!');
        return redirect('admin/pages');
    }

    public function show($id)
    {
        $data = Page::findOrFail($id);
        return view('admin.pages.pages.show')->with('data',$data);
    }

    public function edit($id)
    {
        $data = Page::findOrFail($id);
        return view('admin.pages.pages.edit')->with('data',$data);
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'Lütfen başlığı giriniz!',
            'info.required' => 'Lütfen sayfa metnini giriniz!'
        ];

        $this->validate($request,[
            'name' => 'required|max:255',
            'info' => 'required'
        ], $messages);

        $input = $request->all();
        $input ['permalink']= str_slug($input['name'],'-');
        
        if ($request->hasFile('image')) {
            if ($request->image->isValid()) {
                $extension = $request->image->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension;
                $request->image->move(config('settings.site_upload').'/pages', $fileName);
                $input ['image']= $fileName;
                File::delete(config('settings.site_upload').'/pages/'.$input['oldimage']);
            }
            else
            {
                $request->session()->flash('alert-danger', 'Dosya yüklemede hata oluştu!');
                return redirect('admin/pages');        
            }
        }    
        
        $data = Page::findOrFail($id);
        $data->fill($input)->save();
        $request->session()->flash('alert-success', 'Sayfa başarıyla güncellendi!');
        return redirect('admin/pages');
    }
    
    public function destroy($id, Request $request)
    {
        $data = Page::findOrFail($id);
        File::delete(config('settings.site_upload').'/pages/'.$data->image);
        $data->delete();
        $request->session()->flash('alert-success', 'Sayfa başarıyla silindi!');
        return redirect('admin/pages');
    }
}
