<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\m_Diskusi;
use App\m_Komentar;
use Auth;
class diskusi extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexDiskusi()
    {
        $data = m_Diskusi::orderBy('tanggal_dibuat', 'DESC')
        ->join('users', 'diskusi.id_pembuat', '=', 'users.id')
        ->get();

        // dd($data->isEmpty());

        if (Auth::check()) {
            return view('diskusi.index', compact('data'));
        }else{
            return redirect('login')->with('status', 'Login terlebih dahulu sebelum Mengakses fitur Diskusi');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function actionBuat(Request $request)
    {
        //metode sistem pakar
        m_Diskusi::create([
            'id_pembuat' => $request->id,
            'judul_diskusi' => $request->judul_diskusi,
            'deskripsi_diskusi' => $request->deskripsi_diskusi,
            'tanggal_dibuat' => date("Y-m-d H:i:s")
        ]);
        return redirect('diskusi')->with('status', 'Berhasil Dibuat');
    }
    
    public function actionKirim(Request $request)
    {
        //metode sistem pakar
        // dd($request);
            // $response = array(
            //     'status' => 'success',
            //     'msg' => $request->message,
            // );
            // dd(response()->json($response));
        $user = $request->input('user');
        $id = $request->input('id');
        $komentar = $request->input('komentar');
        $temp = m_Komentar::create([
            'id_pengomentar' => $user,
            'id_diskusi' => $id,
            'komentar' => $komentar,
            'tanggal_komen' => date("Y-m-d H:i:s")
        ]);
        $data = m_Komentar::join('users', 'komentar.id_pengomentar', '=', 'users.id')
        ->where('id_komentar', $temp->id_komentar)
        ->first();  
        $msg = '<li class="comment">
                    <div class="vcard bio">
                        <img src="'.asset('assets/img/person.png').'" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                        <h3>'.$data->name.'</h3>
                        <div class="meta">'.$data->tanggal_komen.'</div>
                        <p>'.$data->komentar.'</p>
                    </div>
                </li>';
        echo "$msg";
        // return redirect('diskusi')->with('status', 'Komen Berhasil Dibuat');
        
    }

}