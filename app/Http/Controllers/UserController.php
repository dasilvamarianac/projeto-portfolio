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
        $acesso = $this->acesso;
        if( $acesso['users'] < 1) {
            return abort(401);
        }
        
        $data = DB::table('v_users')->where('status', 1)->get();
        return view('user.index', compact('data','acesso'));
     
    }
    public function create()
    {
        $acesso = $this->acesso;
        if( $acesso['users'] < 2) {
            return abort(401);
        }
        return view('user.create', compact('data','acesso'));
    }

    public function store(Request $request)
    {

        $acesso = $this->acesso;
        if( $acesso['users'] < 2) {
            return abort(401);
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
        return abort(401);
    }

    public function edit($id)
    {
        $acesso = $this->acesso;
        if( $acesso['users'] < 3) {
            return abort(401);
        }
        $data = User::findOrFail($id);
        return view('user.edit', compact('data','acesso'));
    } 

    protected function update(Request $request,  $id)
    {
        $acesso = $this->acesso;
        
        if ($request->status == 0){
            if( $acesso['users'] < 4) {
                return abort(401);
            }
           $validatedData = $request->validate([
                'status' => 'required|integer',
            ]);
            User::whereId($request->id)->update($validatedData);
            return back()->with('success', 'Usuário excluído com sucesso!');   
        }else{
            if( $acesso['users'] < 3 && $id != Auth::user()->id) {
                return abort(401);
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