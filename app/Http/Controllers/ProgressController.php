<?php

namespace App\Http\Controllers;
use App\Progress;
use App\Project;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class ProgressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function store(Request $request)
    {

        $request->validate([
            'project' =>   'required',
            'inform'  =>   'required',
        ]);

        $data = Project::findOrFail($request->project);

        $form_data = array(
            'project'   =>   $data->id,
            'inform'    =>   $request->inform,
            'user'      =>   Auth::user()->id,
            'status'    =>   $data->status
        );

        Progress::create($form_data);
        return back();
    }
}
