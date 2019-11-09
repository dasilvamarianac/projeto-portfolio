<?php

namespace App\Http\Controllers;
use App\Member;
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
    }

    public function index()
    {
        $data = Member::latest()->where('status', 1)->get();
        return view('member.index', compact('data'));
    }

    public function create()
    {
        return view('member.create', compact('data'));
    }

    public function store(Request $request)
    {
       

        $form_data = array(
            'name'    =>   $request->name,
        );

        Member::create($form_data);

         return redirect('/member')->with('success', 'Membro criado com sucesso!'); 
    }

    public function show($id)
    {
        $data = Member::findOrFail($id);
        return view('member.edit', compact('data'));
    }

    public function edit($id)
    {
        $data = Member::findOrFail($id);
        return view('member.edit', compact('data'));
    }

    protected function update(Request $request, $id)
    {
        if ($request->status == 0){
           $validatedData = $request->validate([
                'status' => 'required|integer',
            ]);
            Member::whereId($request->id)->update($validatedData);
            return redirect('/member')->with('success', 'Membro excluído com sucesso!');   
        }else{
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);
            Member::whereId($id)->update($validatedData);
            return redirect('/member')->with('success', 'Membro alterado com sucesso!'); 
        }
    }
}