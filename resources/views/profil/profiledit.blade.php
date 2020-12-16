@extends('layouts.temp')

@section('title', 'Edit Profil')
@section('breadcrumb', 'Edit Profil')
@section('title2', 'Edit Profil Pengguna')


@section('page')
<div class="page-section mt-0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 my-3 wow fadeInUp">
        <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Edi Profil</h3>
              <form action="{{url('profil/'.Auth::user()->id)}}" method="post">
              @csrf 
                <!-- <div class="form-row form-group">
                  <div class="col-md-6">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                  </div>
                  <div class="col-md-6">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group float-right">
                    <a href="{{url('profil')}}" class="btn btn-danger">Batal</a>
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
              </form>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection