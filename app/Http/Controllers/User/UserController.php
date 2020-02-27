<?php

namespace App\Http\Controllers\User;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Only Authenticated users guard
     * are allowed.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web')->except('create','store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id',Auth::user()->id)->first();

        return view('userProfile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.users.register');
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
            'tckn' => 'required|min:11|max:11',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birth_year' => 'required|min:4|max:4',
            'phone_number' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return redirect(route('user.register'))
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User;
        $user->tckn = $request->tckn;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->birth_year = $request->birth_year;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);

        if ($user->save())
        {
            return redirect(route('user.login'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('userEdit', compact('user'));
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
            'tckn' => 'required|min:11|max:11',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birth_year' => 'required|min:4|max:4',
            'phone_number' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return redirect(route('user.edit',$id))
                ->withErrors($validator)
                ->withInput();
        }

        User::where('id', $id)->update([
            'tckn' => $request->tckn,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birth_year' => $request->birth_year,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password)
        ]);

        return redirect(route('user.profile'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
