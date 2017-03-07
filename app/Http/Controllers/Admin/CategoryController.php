<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use App\Category;
use App\Product;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas = Category::all();
        return view('admin.pages.categories.list')->with('datas',$datas);
    }

    public function create()
    {
        $datas = Category::all();
        return view('admin.pages.categories.new')->with('datas',$datas);
    }

    public function store(Request $request)
    {

        $messages = [
            'required' => 'Kategori ismini girmelisiniz.',
        ];

        $this->validate($request, [
            'name' => 'required|max:255'
        ], $messages);

        $input = $request->all();
        $input ['slug']= str_slug($input['name'],'-');

        if ($request->hasFile('image')) {
            
            if ($request->image->isValid()) {
                $extension = $request->image->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension;
                $request->image->move(config('settings.site_upload').'/cats', $fileName);
                $input ['image']= $fileName;
            }
            else
            {
                $request->session()->flash('alert-danger', 'Dosya yüklemede hata oluştu!');
                return redirect('admin/categories');        
            }
        }
        else
        {
            $input ['image']= "default.png";
        }

        Category::create($input);
        $request->session()->flash('alert-success', 'Kategori başarıyla eklendi!');
        return redirect('admin/categories');
    }

    public function show($id)
    {
        $data = Category::findOrFail($id);
        return view('admin.pages.categories.show')->with('data',$data);
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        $categories = Category::all();
        return view('admin.pages.categories.edit')->with('data',$data)->with('categories',$categories);
    }

    public function update(Request $request, $id)
    {

        $messages = [
            'required' => 'Kategori ismini girmelisiniz.',
        ];

        $this->validate($request, [
            'name' => 'required|max:255'
        ], $messages);

        $input = $request->all();
        $input ['slug']= str_slug($input['name'],'-');
    
        if ($request->hasFile('image')) {
            if ($request->image->isValid()) {
                $extension = $request->image->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension;
                $request->image->move(config('settings.site_upload').'/cats', $fileName);
                $input ['image']= $fileName;
                File::delete(config('settings.site_upload').'/cats/'.$input['oldimage']);
            } 
            else
            {
                $request->session()->flash('alert-danger', 'Dosya yüklemede hata oluştu!');
                return redirect('admin/categories');
            }
        }
        
        $data = Category::findOrFail($id);
        $data->fill($input)->save();
        $request->session()->flash('alert-success', 'Kategori başarıyla güncellendi!');
        return redirect('admin/categories');
    }

    public function destroy($id, Request $request)
    {
        echo "ok";
        
        $data = Category::findOrFail($id);
        
        if ($data->products->count() > 0) {
            $request->session()->flash('alert-danger', 'Kategori dolu olduğundan silinemedi!');
            return redirect('admin/categories');
        } else {
            File::delete(config('settings.site_upload').'/cats/'.$data->image);
            $data->delete();
            $request->session()->flash('alert-success', 'Kategori başarıyla silindi!');
            return redirect('admin/categories');
        }
        
    }
}