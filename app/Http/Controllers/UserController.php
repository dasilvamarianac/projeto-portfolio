<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = DB::table('usersprof')->where('status', 1)->get();
        return view('user.index', compact('data'));
    }

    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('user.edit', compact('data'));
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('user.edit', compact('data'));
    }

    protected function update(Request $request,  $id)
    {
        if ($request->status == 0){
           $validatedData = $request->validate([
                'status' => 'required|integer',
            ]);
            User::whereId($id)->update($validatedData);
            return redirect('/user')->with('success', 'Usuário excluído com sucesso!');   
        }else{
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'profile' => 'required|integer',
                //'password' => 'required|string|min:8|confirmed',
            ]);
            User::whereId($id)->update($validatedData);
            return redirect('/user')->with('success', 'Usuário alterado com sucesso!'); 
        }
    }
}