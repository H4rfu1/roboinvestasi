@extends('layouts.temp')

@section('title', 'Blog')

@section('page')

<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <form action="#" class="form-search-blog">
                    <!-- <div class="input-group">
                    <div class="input-group-prepend">
                        <select id="categories" class="custom-select bg-light">
                        <option>All Categories</option>
                        <option value="travel">Travel</option>
                        <option value="lifestyle">LifeStyle</option>
                        <option value="healthy">Healthy</option>
                        <option value="food">Food</option>
                        </select>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter keyword..">
                    </div> -->
                </form>
            </div>
            <div class="col-sm-2 text-sm-right">
                <a class="btn btn-secondary" href="/buat" >Buat artikel</a>
            </div>
        </div>

        <div class="row my-5">
            @foreach($get as $li)
            <form action="/postUpdate" method="post" enctype="multipart/form-data" style="width: 50%; margin: 0 25% 0 25%;">
            @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Judul</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Isi judul" name="judul" value=" {{ $li->judul }} ">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Penulis</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama penulis" name="penulis" value=" {{ $li->penulis }} ">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Isi blog</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi">{{ $li->isi }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Foto</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="Isi judul" name="foto" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="./" class="btn btn-danger">Batal</a>
                </div>
            </form>
            @endforeach

        </div>

    </div>
</div>

@endsection