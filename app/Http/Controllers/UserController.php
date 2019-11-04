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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $redirectTo = '/user';

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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'profile' => 'required|integer',
            //'password' => 'required|string|min:8|confirmed',
        ]);
        User::whereId($id)->update($validatedData);

        return redirect('/user');//->with('success', 'Sucesso na alteração!');

    }
    public function destroy($id)
    {
        $status = 0;
        User::whereId($id)->update($status);

        return redirect('/user');//->with('success', 'Sucesso na alteração!');
    }
    
}