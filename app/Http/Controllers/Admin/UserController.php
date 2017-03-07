<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use App\User;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $search = \Request::get('search');

        if ($search!==null) {

            $datas = User::where('name', 'like', '%'.$search.'%')
                          ->orWhere('email', 'like', '%'.$search.'%')
                          ->orWhere('name_surname', 'like', '%'.$search.'%')
                          ->orWhere('url', 'like', '%'.$search.'%')
                          ->orWhere('info', 'like', '%'.$search.'%')
                          ->orWhere('location', 'like', '%'.$search.'%')
                          ->orWhere('twitter', 'like', '%'.$search.'%')
                          ->paginate(10);
        } else {
            $datas = User::paginate(10);
        }
        
        return view('admin.pages.users.list')->with('datas', $datas)->with('search',$search);

    }

    public function create()
    {
        return view('admin.pages.users.new');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        
        $messages = [
            'name.required' => 'Lütfen kullanıcı adını giriniz!',
            'email.required' => 'Lütfen eposta adresini giriniz!',
            'email.email' => 'Lütfen doğru bir eposta adresi giriniz!',
            'email.unique' => 'Bu eposta adresi ile zaten üye olunmuş!',
            'password.required' => 'Lütfen parolayı giriniz!',
            'confirmed' => 'Parolalar eşleşmiyor.',
            'min' =>  'Parola en az 6 karakter olmalı.',
        ];

        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ], $messages);

        $input ['password']= bcrypt($input ['password']);

        if ($request->hasFile('image')) {
            if ($request->image->isValid()) {
                $extension = $request->image->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension;
                $request->image->move(config('settings.site_upload').'/users', $fileName);
                $input ['image']= $fileName;
                File::delete(config('settings.site_upload').'/users/'.$input['oldimage']);
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
        
        User::create($input)->id;
        $request->session()->flash('alert-success', 'Kullanıcı başarıyla eklendi!');
        return redirect('admin/users');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('admin.pages.users.edit')->with('data',$data);
    }

    public function update(Request $request, $id)
    {

        $input = $request->all();

        $messages = [
            'name.required' => 'Lütfen kullanıcı adını giriniz!',
            'email.required' => 'Lütfen eposta adresini giriniz!',
            'email.email' => 'Lütfen doğru bir eposta adresi giriniz!',
            'email.unique' => 'Bu eposta adresi ile zaten üye olunmuş!',
            'password.required' => 'Lütfen parolayı giriniz!',
            'confirmed' => 'Parolalar eşleşmiyor.',
            'min' =>  'Parola en az 6 karakter olmalı.',
        ];

        if ($input['email']!==$input['oldemail'])
        {
            $this->validate($request,[
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
            ], $messages);    
        } else {
            $this->validate($request,[
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
            ], $messages);    
        }        
        
        if ($input['password']!==NULL) {
            
            $this->validate($request,[
                'password' => 'min:6|confirmed',
            ], $messages);    

            $input['password']= bcrypt($input ['password']);
        } else {
            unset($input['password']);
            unset($input['password_confirmation']);
        }

        if ($request->hasFile('image')) {
            if ($request->image->isValid()) {
                $extension = $request->image->getClientOriginalExtension();
                $fileName = rand(11111,99999).'.'.$extension;
                $request->image->move(config('settings.site_upload').'/users', $fileName);
                $input ['image']= $fileName;
                File::delete(config('settings.site_upload').'/users/'.$input['oldimage']);
            }
            else
            {
                $request->session()->flash('alert-danger', 'Dosya yüklemede hata oluştu!');
                return redirect('admin/pages');        
            }
        }
        
        $data = User::findOrFail($id);
        $data->fill($input)->save();
        $request->session()->flash('alert-success', 'Kullanıcı başarıyla güncellendi!');
        return redirect('admin/users');
    }

    public function destroy($id, Request $request)
    {
        $user = User::findOrFail($id);
        
        File::delete(config('settings.site_upload').'/users/'.$user->image);
        $user->delete();
        
        $request->session()->flash('alert-success', 'Kullanıcı başarıyla silindi!');
        return redirect('admin/users');
    }
}