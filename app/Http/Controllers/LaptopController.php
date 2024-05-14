<?php

namespace App\Http\Controllers;

use Illuminate\Support\facadesRoute;
use App\Models\Laptop;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login()
    {
        return view('dashboard.login');
    }

    public function register() 
    {
        return view('dashboard.register');
    }
    public function registerAccount(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required|min:4|max:50',
            'username' => 'required|min:4|max:8',
            'password' => 'required',
        ]);

        //tambah data ke data base
        User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password'=>$request->password,]);

        return redirect('/')->with('Add', 'Berhasil membuat akun! Silahkan Login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username', 
            'password' => 'required',
        ], 
        [
            'username.exists' => "This username doesn't exists" //username ini tidak tersedia){kustom/bebas}
        ]);

        $user = $request->only('username', 'password');
        if (Auth::attempt($user)) {
            return redirect()->route('dashboard.index')->with('yes', "Anda Berhasil Login!");
        } else {
            return redirect('/home')->with('fail', "Gagal login, periksa dan coba lagi!");
        }
    }

    public function logout()
    {
        //menghapus history login 
        Auth::logout();
        //mengarahkan ke halaman login lagi 
        return redirect('/')->with('log', "Berhasil Logout!");
    }


    public function index()
    {
        $laptops = Laptop::all();
       return view('dashboard.index', compact('laptops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'guru' => 'required',
            'keterangan' => 'required',
            'rayon' => 'required',
            'tanggal_pinjam' => 'required',
            'deskripsi' => 'required',
        ]);
        Laptop::create([
            'nama' => $request->nama,
            'guru' => $request->guru,
            'nis' => $request->nis, 
            'keterangan' =>$request->keterangan,
            'rayon' => $request->rayon,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'deskripsi' => $request->deskripsi,
            'status' => 0, 
            'done_time' => NULL,

        ]);
        return redirect()->route('home')->with('successAdd', 'Anda Berhasil Menambahkan Data Baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function show(Laptop $laptop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function edit(Laptop $laptop)
    {
        // return view('laptop.edit', compact('laptop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request,id  $id)
    // {
    //     $request->validate([
    //         'nama' => 'required',
    //         'guru' => 'required',
    //         'nis' => 'required',
    //         'keterangan' => 'required',
    //         'rayon' => 'required',
    //         'tanggal_pinjam' => 'required',
    //         'deskripsi' => 'required',
    //     ]);
    //     $laptop->update($request->all());
    //     Laptop::create([
    //         'nama' => $request->nama,
    //         'guru' => $request->guru,
    //         'nis' => $request->nis, 
    //         'keterangan' =>$request->keterangan,
    //         'rayon' => $request->rayon,
    //         'tanggal_pinjam' => $request->tanggal_pinjam,
    //         'deskripsi' => $request->deskripsi,
    //         'status' => 0, 
    //         'done_time' => NULL,
    //     ]);
    //     return redirect ()->route('dashboard.index')->with('successAdd', 'Berhasail Menyimpan Data!');
    // }

    public function updateComplated($id)
    {
        Laptop::where('id', $id)->update([
            'status' => 1,
            'done_time' => Carbon::now(),
        ]);
        return redirect ()->route('home')->with('done', 'Berhasail Mengembalikan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Laptop::where('id', '=', $id)->delete();
        return redirect()->route('home')->with('successDelete', 'Berhasil Menghapus!');
    }
}
