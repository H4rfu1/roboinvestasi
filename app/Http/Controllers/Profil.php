<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;

class Profil extends Controller
{
    public function profil()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }else{
            return view('profil.index');
        }
    }


    public function profiledit()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }else{
            return view('profiledit');
        }
        
    }

    public function profilupdate(Request $request, $id)
    {
        User::where('id', $id)
            ->update([
                'name' => $request->name,
                'email' => $request->email
                // 'foto' => $request->foto
            ]);
            return redirect('profil')->with('status', 'Berhasil diubah');
            // if((int)$request->role == 1){
            //     return redirect('akun/admin')->with('status', 'Data Admin Berhasil diubah');
            // }elseif((int)$request->role == 2){
            //     return redirect('akun/pengawas')->with('status', 'Berhasil mengubah data akun pengawas');
            // }elseif((int)$request->role == 3){
            //     return redirect('akun/pemimpin')->with('status', 'Berhasil mengubah data akun pemimpin');
            // }
    }
}
