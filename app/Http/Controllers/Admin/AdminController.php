<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Only Authenticated users for "admin" guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::where('id', '!=', Auth::user()->id)->get();

        return view('dashboard', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminCreateForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:admins|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $admin = new Admin;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        if ($admin->save())
        {
            return redirect(route('admin.dashboard'));
        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::where('id', $id)->first();

        return view('adminEdit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:admins|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return redirect(route('admin.edit',$id))
                ->withErrors($validator)
                ->withInput();
        }

        Admin::where('id',$id)->update([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect(route('admin.dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Admin::where('id', $id)->delete())
        {
            return redirect(route('admin.dashboard'));
        }
    }
}
