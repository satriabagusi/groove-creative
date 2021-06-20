<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['employees'])->paginate(10);
        return view('dashboard.employee-list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'email' => 'required|max:100|email',
            'no_hp' => 'required|numeric',
            'username' => 'required|unique:users|max:18',
            'password' => 'required',
        ],
        [
            'required' => ':attribute tidak boleh kosong.',
            'email' => ':attribute format email tidak sesuai.',
            'numeric' => ':attribute format harus berisi angka.',
            'unique' => ':attribute sudah terpakai.',
        ]);

        $pegawai = Employee::create([
            'name' => $request->nama,
            'email' => $request->email,
            'phone_number' => $request->no_hp,
            "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
            "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
        ]);


        $user = User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'employee_id' => $pegawai->id,
            'user_role_id' => 2,
        ]);

        return redirect('/login')->with('success', 'Berhasil mendaftar');
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
        //
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
        //
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

    public function __login(Request $request){
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect('/dashboard')->with('success', 'Berhasil login');
        }else{
            return redirect()->back()->with('error', 'Username atau password salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login')->with('logout');
    }
}
