<?php

namespace App\Http\Controllers;

use App\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    //tools pil reksa
    public function contact()
    {
        return view('contact');
    }
    public function blog()
    {
        $data = blog::all();
        return view('blog',['get'=>$data]);
    }

    public function blogDetail($id)
    {
        $data = blog::where('id',$id)->get();
        return view('blog-details',['get'=>$data]);
    }
    
    public function form()
    {
        return view('formBlog');
    }

    public function formUpdate($id)
    {   
        $data = blog::where('id',$id)->get();
        return view('formBlogUpdate',['get'=>$data]);
    }

    public function createBlog(Request $request){
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'isi' => 'required',
            'foto' => 'required',
        ],[
            'judul.required' => 'Data harus diisi',
            'penulis.required' => 'Data harus diisi',
            'isi.required' => 'Data harus diisi',
            'foto.required' => 'Data harus diisi',
        ]);

        $file = $request->file('foto');
        $name = time();
        $extension = $file->getClientOriginalExtension();
        $newName = $name . '.' .$extension;
        // dd($newName);
        Storage::putFileAs('public/img', $request->file('foto'), $newName);

        blog::create([
            'judul'  => $request['judul'],
            'penulis'  => $request['penulis'],
            'isi' => $request['isi'],
            'foto' => 'storage/img/' . $newName,
            'waktu' => date("Y-m-d H:i:s"),
        ]);

        return redirect('/blog')->with('sukses' , 'Data berhasil disimpan');
    }

    public function updateBlog(Request $request){
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'isi' => 'required',
        ],[
            'judul.required' => 'Data harus diisi',
            'penulis.required' => 'Data harus diisi',
            'isi.required' => 'Data harus diisi',
        ]);

        $file = $request->file('foto');

        if($file != null){
            $name = time();
            $extension = $file->getClientOriginalExtension();
            $newName = $name . '.' .$extension;
            // dd($newName);
            Storage::putFileAs('public/img', $request->file('foto'), $newName);

            blog::create([
                'judul'  => $request['judul'],
                'penulis'  => $request['penulis'],
                'isi' => $request['isi'],
                'foto' => 'storage/img/' . $newName,
                'waktu' => date("Y-m-d H:i:s"),
            ]);
        }
        else{
            blog::create([
                'judul'  => $request['judul'],
                'penulis'  => $request['penulis'],
                'isi' => $request['isi'],
                'waktu' => date("Y-m-d H:i:s"),
            ]);
        }

        return redirect('/blog')->with('sukses' , 'Data berhasil disimpan');
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
