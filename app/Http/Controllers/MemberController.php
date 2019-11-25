<?php

namespace App\Http\Controllers;
use App\Member;
use App\Permission;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class MemberController extends Controller
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
        if( $acesso['members'] < 1) {
            return abort(401);
        }

        $data = Member::latest()->where('status', 1)->get();
        return view('member.index', compact('data','acesso'));
    }

    public function create()
    {
        $acesso = $this->acesso;
        if( $acesso['members'] < 2) {
            return abort(401);
        }
        return view('member.create', compact('data','acesso'));
    }

    public function store(Request $request)
    {
        if($this->acesso['members'] < 2) {
            return abort(401);
        }

        $form_data = array(
            'name'    =>   $request->name,
        );

        Member::create($form_data);

        return redirect('/member')->with('success', 'Membro criado com sucesso!'); 
    }

    public function show($id)
    {
        return view('layouts.noroute');
    }

    public function edit($id)
    {
        $acesso = $this->acesso;
        if( $acesso['members'] < 3) {
            return abort(401);
        }
        $data = Member::findOrFail($id);
        return view('member.edit', compact('data','acesso'));
    }

    protected function update(Request $request, $id)
    {

        if ($request->status == 0){
            if($this->acesso['members'] < 4) {
                return abort(401);
            }
           $validatedData = $request->validate([
                'status' => 'required|integer',
            ]);
            Member::whereId($request->id)->update($validatedData);
            return redirect('/member')->with('success', 'Membro excluído com sucesso!');   
        }else{
            if($this->acesso['members'] < 3) {
                return abort(401);
            }
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);
            Member::whereId($id)->update($validatedData);
            return redirect('/member')->with('success', 'Membro alterado com sucesso!'); 
        }
    }
}