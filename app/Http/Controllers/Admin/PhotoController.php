<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use App\Product;
use App\Photo;

class PhotoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $search = \Request::get('search');

        if (($search==null) OR ($search==0)) {
            $datas = Photo::paginate(14);
        } else {
            $datas = Photo::where('product_id', $search)
                          ->paginate(14);
        }        
        
        $products = Product::all();
        return view('admin.pages.photos.list')->with('datas', $datas)->with('products', $products)->with('search',$search);
    }

    public function create()
    {
        $datas = Product::all();
        return view('admin.pages.photos.new')->with('datas', $datas);
    }

    public function store(Request $request)
    {

        $input = $request->all();

        if ($request->hasFile('image')) {
            
            if ($request->image->isValid()) {
                $extension = $request->image->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension;
                $request->image->move(config('settings.site_upload').'/products', $fileName);
                $input ['image']= $fileName;
            }
        }
        else
        {
            $input ['image']= "default.png";
        }

        Photo::create($input);
        $request->session()->flash('alert-success', 'Resim başarıyla eklendi!');
        return redirect('admin/photos');
    }

    public function show($id)
    {
        $data = Photo::findOrFail($id);
        return view('admin.pages.photos.goster')->with('data',$data);
    }

    public function edit($id)
    {
        $data = Photo::findOrFail($id);
        $products = Product::all();
        return view('admin.pages.photos.edit')->with('data',$data)->with('products',$products);
    }

    public function update(Request $request, $id)
    {

        $input = $request->all();

        if ($request->hasFile('image')) {
            if ($request->image->isValid()) {
                $extension = $request->image->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension;
                $request->image->move(config('settings.site_upload').'/products', $fileName);
                $input ['image']= $fileName;
                File::delete(config('settings.site_upload').'/products/'.$input['oldimage']);
            }
        }

        $data = Photo::findOrFail($id);
        $data->fill($input)->save();
        $request->session()->flash('alert-success', 'Resim başarıyla güncellendi!');
        return redirect('admin/photos');
    }

    public function destroy($id, Request $request)
    {
        $data = Photo::findOrFail($id);
        if (File::delete(config('settings.site_upload').'/products/'.$data->image)) {
            $data->delete();    
        }
        $request->session()->flash('alert-success', 'Resim başarıyla silindi!');
        return redirect('admin/photos');
    }
}