<?php

namespace App\Http\Controllers;
use App\User;
use App\Permission;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next){
            $this->acesso = Permission::where('profile',Auth::user()->profile)->first();
            return $next($request);
        });
    }

    public function index()
    {
        if($this->acesso['indicators'] < 1) {
            return view('layouts.nopermission');
        }
        
        $data = DB::table('v_users')->where('status', 1)->get();
        return view('user.index', compact('data'));
     
    }
    public function create()
    {
        if($this->acesso['users'] < 2) {
            return view('layouts.nopermission');
        }
        return view('user.create', compact('data'));
    }

    public function store(Request $request)
    {

        if($this->acesso['users'] < 2) {
            return view('layouts.nopermission');
        }    

        $form_data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'profile' => ['required', 'integer'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $form_data['password'] = Hash::make($form_data['password']);
        User::create($form_data);

        return redirect('/user')->with('success', 'Usuário criado com sucesso!'); 
    }

    public function show($id)
    {
        return view('layouts.noroute');
    }

    public function edit($id)
    {
        if($this->acesso['users'] < 3) {
            return view('layouts.nopermission');
        }
        $data = User::findOrFail($id);
        return view('user.edit', compact('data'));
    } 

    protected function update(Request $request,  $id)
    {
        if ($request->status == 0){
            if($this->acesso['users'] < 4) {
                return view('layouts.nopermission');
            }
           $validatedData = $request->validate([
                'status' => 'required|integer',
            ]);
            User::whereId($request->id)->update($validatedData);
            return redirect('/user')->with('success', 'Usuário excluído com sucesso!');   
        }else{
            if($this->acesso['users'] < 3) {
                return view('layouts.nopermission');
            }

            $data = User::findOrFail($id);
            
            $form_data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'profile' => ['required', 'integer']
            ]);


            if($request->password != '12345678'){
                $validatedPass = $request->validate([
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                ]);
                $form_data['password'] = Hash::make($validatedPass['password']);
            }

            if($request->email != $data->email){
                $validatedEmail = $request->validate([
                    'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
                ]);
                $form_data['email'] = $validatedEmail['email'];
            }           

            
            User::whereId($id)->update($form_data);
            return redirect('/user')->with('success', 'Usuário alterado com sucesso!'); 
        }
    }
    public function destroy($id)
    {
        return view('layouts.noroute');
    }
}