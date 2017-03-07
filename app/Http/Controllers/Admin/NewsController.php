<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $search = \Request::get('search');

        if ($search!==null) {

            $datas = News::where('name', 'like', '%'.$search.'%')
                          ->orWhere('slug', 'like', '%'.$search.'%')
                          ->orWhere('info', 'like', '%'.$search.'%')
                          ->orWhere('keywords', 'like', '%'.$search.'%')
                          ->orWhere('description', 'like', '%'.$search.'%')
                          ->orderBy('date', 'desc')
                          ->paginate(10);
        } else {
            $datas = News::orderBy('date', 'desc')
                          ->paginate(10);
        }
        
        return view('admin.pages.news.list')->with('datas',$datas)->with('search',$search);
    }

    public function create()
    {
        return view('admin.pages.news.new');
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
        
        var_dump($input);
        
        //Tarih Dönüşümü
        $new_date= explode('/',$input ['date']);
        $temp = $new_date[0];
        $new_date[0] = $new_date[1];
        $new_date[1] = $temp;
        $input ['date'] = implode('/', $new_date);
        //Bitiş

        $date = strtotime($input ['date']);
        $input['date'] = date("Y-m-d", $date);
        $input['slug']= str_slug($input['name'],'-');
        News::create($input);
        $request->session()->flash('alert-success', 'Haber başarıyla eklendi!');
        return redirect('admin/news');
    }

    public function show($id)
    {
        $data = News::findOrFail($id);
        return view('admin.pages.news.goster')->with('data',$data);
    }

    public function edit($id)
    {
        $data = News::findOrFail($id);
        return view('admin.pages.news.edit')->with('data',$data);
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

        $data = News::findOrFail($id);
        $input = $request->all();

        //Tarih Dönüşümü
        $new_date= explode('/',$input ['date']);
        $temp = $new_date[0];
        $new_date[0] = $new_date[1];
        $new_date[1] = $temp;
        $input ['date'] = implode('/', $new_date);
        //Bitiş
        
        $date = strtotime($input ['date']);
        $input ['date'] = date("Y-m-d", $date);
        $input ['slug']= str_slug($input['name'],'-');
        $data->fill($input)->save();
        $request->session()->flash('alert-success', 'Haber başarıyla güncellendi!');
        return redirect('admin/news');
    }

    public function destroy($id, Request $request)
    {
        $data = News::findOrFail($id);
        $data->delete();
        $request->session()->flash('alert-success', 'Haber başarıyla silindi!');
        return redirect('admin/news');
    }
}
