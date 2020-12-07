<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class page extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }
    public function tools()
    {
        return view('tools');
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
                for($a = 0; $a < count($uname); $a++){
                    if(!empty($uname[$a])){
                        $C1[$a] = $C1[$a]/max($C1) ;
                        $C2[$a] = $C2[$a]/max($C2) ;
                        $C3[$a] = $C3[$a]/max($C3) ;
                        $C4[$a] = min($C4)/$C4[$a] ;
                        $C5[$a] = min($C5)/$C5[$a] ;
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

    //tools pil reksa
    public function contact()
    {
        return view('contact');
    }
    public function blog()
    {
        return view('blog');
    }

    public function blogDetail()
    {
        return view('blog-details');
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
        //
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
}
