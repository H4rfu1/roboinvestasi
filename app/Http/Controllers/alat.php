<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\m_saranalat;
use App\m_upvotesaranalat;
use Auth;

class alat extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tools()
    {
        $data = m_saranalat::orderBy('tanggal_saranalat', 'DESC')
        ->join('users', 'saranalat.id_pengguna', '=', 'users.id')
        ->get();

        // dd($data->isEmpty());
        $login = Auth::check();
        return view('tools', compact('login', 'data'));
    }

    //tools pil reksa
    public function indexPilReksa()
    {
        return view('tools.pilreksa', ['mode'=>'input']);
    }

    public function robopilreksa(Request $request)
    {
        $post = $request->all();
        // dd($post);
        if(isset($post['submit'])){
            $uname = $post['name'];
            $C1 = $post['return'];
            $C2 = $post['aum'];
            $C3 = $post['usia'];
            $C4 = $post['ekspen'];
            $C5 = $post['harga'];
            if(!empty($uname)){
                //metode SAW

                // 1. Tahap Analisis
                for($a = 0; $a < count($uname); $a++){
                    if(!empty($uname[$a])){
                        if($C1[$a]<=4){
                            $C1[$a] = 20;
                        }elseif($C1[$a]<=7){
                            $C1[$a] = 40;
                        }elseif($C1[$a]<=10){
                            $C1[$a] = 60;
                        }elseif($C1[$a]<=15){
                            $C1[$a] = 80;
                        }else{
                            $C1[$a] = 100;
                        }

                        if($C2[$a]<=25){
                            $C2[$a] = 20;
                        }elseif($C2[$a]<=100){
                            $C2[$a] = 40;
                        }elseif($C2[$a]<=500){
                            $C2[$a] = 60;
                        }elseif($C2[$a]<=1000){
                            $C2[$a] = 80;
                        }else{
                            $C2[$a] = 100;
                        }

                        if($C3[$a]<=1){
                            $C3[$a] = 20;
                        }elseif($C3[$a]<=3){
                            $C3[$a] = 40;
                        }elseif($C3[$a]<=6){
                            $C3[$a] = 60;
                        }elseif($C3[$a]<=10){
                            $C3[$a] = 80;
                        }else{
                            $C3[$a] = 100;
                        }

                        if($C4[$a]<=1){
                            $C4[$a] = 20;
                        }elseif($C4[$a]<=2){
                            $C4[$a] = 40;
                        }elseif($C4[$a]<=4){
                            $C4[$a] = 60;
                        }elseif($C4[$a]<=6){
                            $C4[$a] = 80;
                        }else{
                            $C4[$a] = 100;
                        }

                        if($C5[$a]== "20"){
                            $C5[$a] = 20;
                        }elseif($C5[$a]== "40"){
                            $C5[$a] = 40;
                        }elseif($C5[$a]== "60"){
                            $C5[$a] = 60;
                        }elseif($C5[$a]== "80"){
                            $C5[$a] = 80;
                        }else{
                            $C5[$a] = 100;
                        }
                    }
                }

                // 2. Tahap Normalisasi
                $maxC1 = max($C1);
                $maxC2 = max($C2);
                $maxC3 = max($C3);
                $minC4 = min($C4);
                $minC5 = min($C5);
                for($a = 0; $a < count($uname); $a++){
                    if(!empty($uname[$a])){
                        $C1[$a] = $C1[$a]/$maxC1 ;
                        $C2[$a] = $C2[$a]/$maxC2 ;
                        $C3[$a] = $C3[$a]/$maxC3 ;
                        $C4[$a] = $minC4/$C4[$a] ;
                        $C5[$a] = $minC5/$C5[$a] ;
                    }
                }

                // 3. Tahap Perangkingan
                for($a = 0; $a < count($uname); $a++){
                    if(!empty($uname[$a])){
                        $C1[$a] *= 30;
                        $C2[$a] *= 20;
                        $C3[$a] *= 20;
                        $C4[$a] *= 20;
                        $C5[$a] *= 10;
                        $total[$a] = array_sum(array($C1[$a], $C2[$a], $C3[$a], $C4[$a], $C5[$a]));
                    }
                }

                for ($i = 0; $i < count($uname); $i++) {
                    for ($j = $i + 1; $j < count($uname); $j++) {
                        if ($total[$i] < $total[$j]) {
                            $temp = $total[$i];
                            $total[$i] = $total[$j];
                            $total[$j] = $temp;

                            $temp = $uname[$i];
                            $uname[$i] = $uname[$j];
                            $uname[$j] = $temp;
                        }
                    }
                }

                return view('tools.pilreksa', ['mode'=>'hasil','nama'=> $uname, 'total'=> $total]);

            }
        }
    }

    //tools pil saham
    public function indexPilHam()
    {
        return view('tools.pilham', ['mode'=>'input']);
    }
    
    public function robopilham(Request $request)
    {
        $post = $request->all();
        // dd($post);
        if(isset($post['submit'])){
            $uname = $post['name'];
            $C1 = $post['npm'];
            $C2 = $post['roa'];
            $C3 = $post['roe'];
            $C4 = $post['eps'];
            $C5 = $post['per'];
            $C6 = $post['pbvr'];
            if(!empty($uname)){
                //metode SAW

                // 1. Tahap Analisis
                for($a = 0; $a < count($uname); $a++){
                    if(!empty($uname[$a])){
                        if($C1[$a]<=5){
                            $C1[$a] = 20;
                        }elseif($C1[$a]<=10){
                            $C1[$a] = 40;
                        }elseif($C1[$a]<=20){
                            $C1[$a] = 60;
                        }elseif($C1[$a]<=30){
                            $C1[$a] = 80;
                        }else{
                            $C1[$a] = 100;
                        }

                        if($C2[$a]<=0.5){
                            $C2[$a] = 20;
                        }elseif($C2[$a]<=1){
                            $C2[$a] = 40;
                        }elseif($C2[$a]<=1.5){
                            $C2[$a] = 60;
                        }elseif($C2[$a]<=2){
                            $C2[$a] = 80;
                        }else{
                            $C2[$a] = 100;
                        }

                        if($C3[$a]<=5){
                            $C3[$a] = 20;
                        }elseif($C3[$a]<=10){
                            $C3[$a] = 40;
                        }elseif($C3[$a]<=15){
                            $C3[$a] = 60;
                        }elseif($C3[$a]<=20){
                            $C3[$a] = 80;
                        }else{
                            $C3[$a] = 100;
                        }

                        if($C4[$a]<=50){
                            $C4[$a] = 20;
                        }elseif($C4[$a]<=100){
                            $C4[$a] = 40;
                        }elseif($C4[$a]<=250){
                            $C4[$a] = 60;
                        }elseif($C4[$a]<=500){
                            $C4[$a] = 80;
                        }else{
                            $C4[$a] = 100;
                        }

                        if($C5[$a]<=10){
                            $C5[$a] = 20;
                        }elseif($C5[$a]<=20){
                            $C5[$a] = 40;
                        }elseif($C5[$a]<=35){
                            $C5[$a] = 60;
                        }elseif($C5[$a]<=50){
                            $C5[$a] = 80;
                        }else{
                            $C5[$a] = 100;
                        }

                        if($C6[$a]<=1){
                            $C6[$a] = 20;
                        }elseif($C6[$a]<=2){
                            $C6[$a] = 40;
                        }elseif($C6[$a]<=4){
                            $C6[$a] = 60;
                        }elseif($C6[$a]<=6){
                            $C6[$a] = 80;
                        }else{
                            $C6[$a] = 100;
                        }
                    }
                }
                // dd($C3);

                // 2. Tahap Normalisasi
                $maxC1 = max($C1);
                $maxC2 = max($C2);
                $maxC3 = max($C3);
                $maxC4 = max($C4);
                $minC5 = min($C5);
                $minC6 = min($C6);
                for($a = 0; $a < count($uname); $a++){
                    if(!empty($uname[$a])){
                        $C1[$a] = $C1[$a]/ $maxC1;
                        $C2[$a] = $C2[$a]/$maxC2 ;
                        $C3[$a] = $C3[$a]/$maxC3 ;
                        $C4[$a] = $C4[$a]/$maxC4 ;
                        $C5[$a] = $minC5/$C5[$a] ;
                        $C6[$a] = $minC6/$C6[$a] ;
                    }
                }
                // dd($C3);
                
                


                // 3. Tahap Perangkingan
                for($a = 0; $a < count($uname); $a++){
                    if(!empty($uname[$a])){
                        $C1[$a] *= 20;
                        $C2[$a] *= 15;
                        $C3[$a] *= 15;
                        $C4[$a] *= 15;
                        $C5[$a] *= 20;
                        $C6[$a] *= 15;
                        $total[$a] = array_sum(array($C1[$a], $C2[$a], $C3[$a], $C4[$a], $C5[$a], $C6[$a]));
                    }
                }

                for ($i = 0; $i < count($uname); $i++) {
                    for ($j = $i + 1; $j < count($uname); $j++) {
                        if ($total[$i] < $total[$j]) {
                            $temp = $total[$i];
                            $total[$i] = $total[$j];
                            $total[$j] = $temp;

                            $temp = $uname[$i];
                            $uname[$i] = $uname[$j];
                            $uname[$j] = $temp;
                        }
                    }
                }

                return view('tools.pilham', ['mode'=>'hasil','nama'=> $uname, 'total'=> $total]);

            }
        }
    }

    //tools prof siko
    public function indexProfSiko()
    {
        return view('tools.profsiko');
    }

    public function roboprofsiko(Request $request)
    {
        echo "Halo $request->nama, profsiko menjawab";
    }
    public function saranalatredirect(Request $request)
    {
        if (Auth::check()) {
            return view('tools');
        }else{
            return redirect('login')->with('status', 'Robo mengingatkan, kamu harus Login sebelum Mengakses fitur Tambah Saran Alat');
        }
    }
    public function upvoteredirect(Request $request)
    {
        if (Auth::check()) {
            return view('tools');
        }else{
            return redirect('login')->with('status', 'Robo mengingatkan, kamu harus Login sebelum Mengakses fitur Upvote');
        }
    }

    public function actionUpvote(Request $request)
    {
        $allcount = m_upvotesaranalat::join('saranalat', 'upvotesaranalat.id_saranalat', '=', 'saranalat.id_saranalat')
        ->where('upvotesaranalat.id_saranalat', $request->id)
        ->count();
        $count = m_upvotesaranalat::join('saranalat', 'upvotesaranalat.id_saranalat', '=', 'saranalat.id_saranalat')
        ->join('users', 'upvotesaranalat.id_pengupvote', '=', 'users.id')
        ->where('upvotesaranalat.id_saranalat', $request->id)
        ->where('users.id', $request->user)
        ->count();
        $data = m_upvotesaranalat::join('saranalat', 'upvotesaranalat.id_saranalat', '=', 'saranalat.id_saranalat')
        ->join('users', 'upvotesaranalat.id_pengupvote', '=', 'users.id')
        ->where('upvotesaranalat.id_saranalat', $request->id)
        ->where('users.id', $request->user)
        ->first();
        // dd($data);
        
        if ($count > 0){
                m_upvotesaranalat::where('id_upvote', $data->id_upvote )->delete();
                echo '<span>'.($allcount-1).'</span> <i class="fa fa-arrow-up" aria-hidden="true"></i>';

        }else{          
            m_upvotesaranalat::create([
                'id_saranalat' => $request->id,
                'tanggal_supvote' => date("Y-m-d H:i:s"),
                'id_pengupvote' => $request->user
            ]);
            echo '<span>'.($allcount+1).'</span> <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>';
        }
        
    }
    public function actionBuat(Request $request)
    {
        //metode sistem pakar
        m_saranalat::create([
            'nama_alat' => $request->nama_alat,
            'deskripsi_alat' => $request->deskripsi_alat,
            'tanggal_saranalat' => date("Y-m-d H:i:s"),
            'id_pengguna' => $request->id
        ]);
        return redirect('alat')->with('status', 'Saran Alat Kamu Berhasil Robo Simpan');
    }

}
