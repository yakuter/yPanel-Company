<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ProductController extends Controller
{
     
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $search = \Request::get('search');

        if ($search!==null) {

            $datas = Product::where('name', 'like', '%'.$search.'%')
                            ->orWhere('slug', 'like', '%'.$search.'%')
                            ->orWhere('info', 'like', '%'.$search.'%')
                            ->orWhere('keywords', 'like', '%'.$search.'%')
                            ->orWhere('description', 'like', '%'.$search.'%')
                            ->orderBy('name', 'asc')
                            ->paginate(10);
        } else {
            $datas = Product::orderBy('name', 'asc')->paginate(10);
        }

        return view('admin.pages.products.list')->with('datas',$datas)->with('search',$search);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.products.new')->with('categories',$categories);
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Ürün ismini girmelisiniz!',
            'info.required' => 'Ürün açıklamasını girmelisiniz!',
        ];

        $this->validate($request, [
            'name' => 'required|max:255',
            'info' => 'required',
        ], $messages);

        $input = $request->all();
        $input ['slug']= str_slug($input['name'],'-');
        Product::create($input);
        $request->session()->flash('alert-success', 'Ürün başarıyla eklendi!');
        return redirect('admin/products');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.pages.products.edit')->with('data',$data)->with('categories',$categories);
    }

    public function update(Request $request, $id)
    {

        $messages = [
            'name.required' => 'Ürün ismini girmelisiniz!',
            'info.required' => 'Ürün açıklamasını girmelisiniz!',
        ];

        $this->validate($request, [
            'name' => 'required|max:255',
            'info' => 'required',
        ], $messages);

        $data = Product::findOrFail($id);
        $input = $request->all();
        $input ['slug']= str_slug($input['name'],'-');
        $data->fill($input)->save();
        $request->session()->flash('alert-success', 'Ürün başarıyla güncellendi!');
        return redirect('admin/products');
    }

    public function destroy($id, Request $request)
    {
        $data = Product::findOrFail($id);
        if ($data->photos->count() > 0) {
            $request->session()->flash('alert-danger', 'Ürüne ait fotoğraflar bulunduğundan ürün silinemedi!');
            return redirect('admin/products');
        } else {
            $data->delete();
            $request->session()->flash('alert-success', 'Ürün başarıyla silindi!');
            return redirect('admin/products');
        }
    }
}
