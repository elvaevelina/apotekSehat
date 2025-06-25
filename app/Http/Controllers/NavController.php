<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function home()
    {
        return view('home', ['key' => 'home']);
    }

    public function obat()
    {
        // $obat = \App\obat::all(); // Ambil semua data obat

        $obat = \App\obat::orderBy('id', 'desc')->get(); // Ambil semua data obat scr descending
        return view('obat', [
            'obat' => $obat,
            'key' => 'obat'
        ]);
    }
    public function addObat()
    {
        return view('addObat', ['key' => 'addObat']);
    }
    public function saveObat(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|numeric',
            'nama' => 'required',
            'bentuk' => 'required',
            'harga_obat' => 'required|numeric',
            'stok_obat' => 'required|numeric',
            'produsen' => 'required',
            'tgl_kadaluarsa' => 'required|date'
        ]);

        \App\obat::create([
            'id' => $request->id,
            'nama' => $request->nama,
            'bentuk' => $request->bentuk,
            'harga_obat' => $request->harga_obat,
            'stok_obat' => $request->stok_obat,
            'produsen' => $request->produsen,
            'tgl_kadaluarsa' => $request->tgl_kadaluarsa,
        ]);

        return redirect('/obat')->with('alert', 'Obat berhasil ditambahkan');
    }
    public function editObat($id)
    {
        $obat = \App\obat::find($id);
        return view('editObat', [
            'obat' => $obat,
            'key' => 'editObat'
        ]);
    }
    public function updateObat(Request $request, $id)
    {
        $obat = \App\obat::find($id);
        $obat->update([
            'nama' => $request->nama,
            'bentuk' => $request->bentuk,
            'harga_obat' => $request->harga_obat,
            'stok_obat' => $request->stok_obat,
            'produsen' => $request->produsen,
            'tgl_kadaluarsa' => $request->tgl_kadaluarsa,
        ]);
        $obat->save();
        return redirect('/obat')->with('alert', 'Obat berhasil diupdate');
    }
    public function deleteObat($id)
    {
        $obat = \App\obat::find($id);
        $obat->delete();
        return redirect('/obat')->with('alert', 'Obat berhasil dihapus');
    }
    public function login()
    {
        return view('login', ['key' => 'login']);
    }
    public function ceklogin(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            // Login berhasil
            return redirect('/obat')->with('alert', 'Login berhasil!');
        } else {
            // Login gagal
            return redirect('/')->with('alert', 'Username atau password salah!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('alert', 'You have been logged out successfully!');
    }

    public function edituser()
    {
        return view('edituser', ['key' => '']);
    }
    public function updateuser(Request $request)
    {
        if($request->password_baru == $request->konfirmasi_password)
        {
            $user = Auth::user();
            $user->password = bcrypt($request->password_baru);
            $user->save();
            return redirect('/edituser')->with('info', 'User updated successfully!');
        }
        else
        {
            return redirect('/edituser')->with('info', 'Password confirmation does not match!');
        }
    }

    public function searchobat(Request $request)
    {
        $search = $request->input('search');
        $obat = \App\obat::where('nama', 'LIKE', '%' . $search . '%')->get();
        return view('searchobat', ['key' => 'searchobat', 'obat' => $obat, 'search' => $search]);
    }
    public function actsearchobat(Request $request)
    {
        $search = $request->input('q');
        $obat = \App\obat::where('nama', 'LIKE', '%' . $search . '%')->get();
        return view('actsearchobat', ['data'=>$obat]);
    }



}
