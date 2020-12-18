@extends('layouts.temp')

@section('title', 'Alat')
@section('breadcrumb', 'Alat')
@section('title2', 'Alat Robo')

@section('page')
  <div class="page-section">
    <div class="container">
    @if (session('status'))
                <div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                {{ session('status') }}
                </div>
			@endif
      <div class="row">
        <div class="col-lg-4">
          <div class="card-service">
            <div class="header">
              <img src="{{asset('assets/img/services/service-1.svg')}}" alt="">
            </div>
            <div class="body">
              <h5 class="text-secondary">Robo Pilih Reksadana <br> (Robo PilReksa)</h5>
              <p>Robo akan membantu merangkingkan pemilihan reksadana berdasakan kriteria yang ada menggunakan metode SAW(Simple Additive Weighting)</p>
              <a href="{{url('alat/pilreksa')}}" class="btn btn-primary">Gunakan</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card-service">
            <div class="header">
              <img src="{{asset('assets/img/services/service-3.svg')}}" alt="">
            </div>
            <div class="body">
              <h5 class="text-secondary">Robo Profil Resiko <br> (Robo ProfSiko)</h5>
              <p>Robo akan membantumu menentukan profil dari resiko diri kamu lewat beberapa pertanyaan dan memberikan saran jenis investasi yang dapat dipilih.</p>
              <a href="{{url('alat/profsiko')}}" class="btn btn-primary">Gunakan </a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card-service">
            <div class="header">
              <img src="{{asset('assets/img/services/service-2.svg')}}" alt="">
            </div>
            <div class="body">
              <h5 class="text-secondary">Robo Pilih Saham <br> (Robo PilHam)</h5>
              <p>Robo akan membantu merangkingkan pemilihan saham berdasakan kriteria yang ada menggunakan metode SAW (Simple Additive Weighting)</p>
              <a href="{{url('alat/pilham')}}" class="btn btn-primary">Gunakan</a>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  

  <div class="page-section bg-light">
    <div class="container">
      <div class="text-center">
    <div class="subhead">Saran Alat </div>
        <h2 class="title-section">Sarankan Alat untuk Dibuat</h2>
        <button type="button" id="tambahsaran" class="btn btn-primary saran_alat mb-3" data-toggle="modal" data-target="#exampleModalCenter">
          Post Saran
        </button>
        <div id="myCarousel" class="carousel slide m-0 p-0" data-interval="false">
        <p class="mt-3">Saran Alat Terpopuler</p>
        <div class="divider mx-auto m-0 p-0"></div>
            <ol class="carousel-indicators">
              @php 
              $jumlah = count($data) / 4;
              @endphp
            @for($i = 0; $i < $jumlah; $i++)
              <li data-target="#myCarousel" data-slide-to="$i" class="@if($i == 0){{'active'}}@endif"></li>
            @endfor
            </ol>
            <div class="carousel-inner m-0 p-0">
            @foreach($data as $d)
                @php
                $allcount = DB::table('upvotesaranalat')
                  ->join('saranalat', 'upvotesaranalat.id_saranalat', '=', 'saranalat.id_saranalat')
                  ->select('upvotesaranalat.*', 'users.name','saranalat.*')
                  ->where('upvotesaranalat.id_saranalat', $d->id_saranalat)
                  ->count();
                  if(Auth::check()){
                    $count = DB::table('upvotesaranalat')
                    ->join('users', 'upvotesaranalat.id_pengupvote', '=', 'users.id')
                    ->join('saranalat', 'upvotesaranalat.id_saranalat', '=', 'saranalat.id_saranalat')
                    ->select('upvotesaranalat.*', 'users.name','saranalat.*')
                    ->where('upvotesaranalat.id_saranalat', $d->id_saranalat)
                    ->where('users.id', Auth::user()->id)
                    ->count();

                    if($d->id_pengguna == Auth::user()->id){
                      $milik = true;
                    }
                  }else{
                    $count = false;
                    $milik = false;
                  }
                @endphp

                @if($loop->last && ($loop->iteration -1) % 4 == 0)
                <div class="carousel-item py-5 @if($loop->iteration == 1){{'active'}}@endif">
                  <div class="row">
                  <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
                    <div class="features">
                      <div class="header mb-3">
                        <div style="position: absolute; top: 0px; right: 20px; font-size: 18px;"> 
                        <a href="" class="send_upvote" id="upvote{{$d->id_saranalat}}" data-id="{{$d->id_saranalat}}" >
                          @if($count)
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                          @else
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-up" aria-hidden="true"></i>
                          @endif
                        </a></div> 
                        @if($milik)
                        <div style="position: absolute; top: 0px; left: 20px; font-size: 18px;"> 
                        <a href="{{url('deletesaran/'.$d->id_saranalat)}}" class="sampah">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <a href="" class="pensil" data-toggle="modal" data-id="{{$d->id_saranalat}}" data-target="#exampleModalCenter">
                          <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                      </div>
                      @endif
                        <span class="mai-business"></span>
                      </div>
                      <h5>{{$d->nama_alat}}</h5>
                      <p>{{$d->deskripsi_alat}}</p>
                    </div>
                  </div>
                  </div>
                </div>
                @elseif(($loop->iteration -1) % 4 == 0)
                <div class="carousel-item py-5 @if($loop->iteration == 1){{'active'}}@endif">
                  <div class="row">
                  <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
                    <div class="features">
                      <div class="header mb-3">
                      <div style="position: absolute; top: 0px; right: 20px; font-size: 18px;"> 
                      <a href="" class="send_upvote" id="upvote{{$d->id_saranalat}}" data-id="{{$d->id_saranalat}}" >
                          @if($count)
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                          @else
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-up" aria-hidden="true"></i>
                          @endif
                        </a></div> 
                        @if($milik)
                        <div style="position: absolute; top: 0px; left: 20px; font-size: 18px;"> 
                        <a href="{{url('deletesaran/'.$d->id_saranalat)}}" class="sampah">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <a href="" class="pensil" data-toggle="modal" data-id="{{$d->id_saranalat}}"  data-target="#exampleModalCenter">
                          <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                      </div>
                      @endif
                        <span class="mai-business"></span>
                      </div>
                      <h5>{{$d->nama_alat}}</h5>
                      <p>{{$d->deskripsi_alat}}</p>
                    </div>
                  </div>
                @elseif($loop->iteration % 4 == 0 || $loop->last)
                <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
                    <div class="features">
                      <div class="header mb-3">
                        <div style="position: absolute; top: 0px; right: 20px; font-size: 18px;"> 
                        <a href="" class="send_upvote" id="upvote{{$d->id_saranalat}}" data-id="{{$d->id_saranalat}}" >
                          @if($count)
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                          @else
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-up" aria-hidden="true"></i>
                          @endif
                        </a></div> 
                        @if($milik)
                        <div style="position: absolute; top: 0px; left: 20px; font-size: 18px;"> 
                        <a href="{{url('deletesaran/'.$d->id_saranalat)}}" class="sampah">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <a href="" class="pensil" data-toggle="modal" data-id="{{$d->id_saranalat}}"  data-target="#exampleModalCenter">
                          <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                      </div>
                      @endif
                        <span class="mai-business"></span>
                      </div>
                      <h5>{{$d->nama_alat}}</h5>
                      <p>{{$d->deskripsi_alat}}</p>
                    </div>
                  </div>
                  </div>
                </div>
                @else
                <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
                    <div class="features">
                      <div class="header mb-3">
                        <div style="position: absolute; top: 0px; right: 20px; font-size: 18px;"> 
                        <a href="" class="send_upvote" id="upvote{{$d->id_saranalat}}" data-id="{{$d->id_saranalat}}" >
                          @if($count)
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                          @else
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-up" aria-hidden="true"></i>
                          @endif
                        </a></div> 
                        @if($milik)
                        <div style="position: absolute; top: 0px; left: 20px; font-size: 18px;"> 
                        <a href="{{url('deletesaran/'.$d->id_saranalat)}}" class="sampah">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <a href="" class="pensil" data-toggle="modal" data-id="{{$d->id_saranalat}}" data-target="#exampleModalCenter">
                          <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                      </div>
                      @endif
                        <span class="mai-business"></span>
                      </div>
                      <h5>{{$d->nama_alat}}</h5>
                      <p>{{$d->deskripsi_alat}}</p>
                    </div>
                  </div>
                @endif
              @endforeach
          </div>
        </div>

        <div id="myCarousel2" class="carousel slide m-0 p-0" data-interval="false">
        <p class="mt-3">Saran Alat Terbaru</p>
        <div class="divider mx-auto m-0 p-0"></div>
            <ol class="carousel-indicators">
              @php 
              $jumlah = count($databaru) / 4;
              @endphp
            @for($i = 0; $i < $jumlah; $i++)
              <li data-target="#myCarousel2" data-slide-to="$i" class="@if($i == 0){{'active'}}@endif"></li>
            @endfor
            </ol>
            <div class="carousel-inner">
            @foreach($databaru as $d)
                @php
                $allcount = DB::table('upvotesaranalat')
                  ->join('saranalat', 'upvotesaranalat.id_saranalat', '=', 'saranalat.id_saranalat')
                  ->select('upvotesaranalat.*', 'users.name','saranalat.*')
                  ->where('upvotesaranalat.id_saranalat', $d->id_saranalat)
                  ->count();
                  if(Auth::check()){
                    $count = DB::table('upvotesaranalat')
                    ->join('users', 'upvotesaranalat.id_pengupvote', '=', 'users.id')
                    ->join('saranalat', 'upvotesaranalat.id_saranalat', '=', 'saranalat.id_saranalat')
                    ->select('upvotesaranalat.*', 'users.name','saranalat.*')
                    ->where('upvotesaranalat.id_saranalat', $d->id_saranalat)
                    ->where('users.id', Auth::user()->id)
                    ->count();
                  }else{
                    $count = false;
                  }
                @endphp

                @if($loop->last && ($loop->iteration -1) % 4 == 0)
                <div class="carousel-item py-5 @if($loop->iteration == 1){{'active'}}@endif">
                  <div class="row">
                  <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
                    <div class="features">
                      <div class="header mb-3">
                        <div style="position: absolute; top: 0px; right: 20px; font-size: 18px;"> <a href="" class="send_upvote" id="upvote{{$d->id_saranalat}}" data-id="{{$d->id_saranalat}}" >
                          @if($count)
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                          @else
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-up" aria-hidden="true"></i>
                          @endif
                        </a></div> 
                        <span class="mai-business"></span>
                      </div>
                      <h5>{{$d->nama_alat}}</h5>
                      <p>{{$d->deskripsi_alat}}</p>
                    </div>
                  </div>
                  </div>
                </div>
                @elseif(($loop->iteration -1) % 4 == 0)
                <div class="carousel-item py-5 @if($loop->iteration == 1){{'active'}}@endif">
                  <div class="row">
                  <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
                    <div class="features">
                      <div class="header mb-3">
                        <div style="position: absolute; top: 0px; right: 20px; font-size: 18px;"> <a href="" class="send_upvote" id="upvote{{$d->id_saranalat}}" data-id="{{$d->id_saranalat}}" >
                          @if($count)
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                          @else
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-up" aria-hidden="true"></i>
                          @endif
                        </a></div> 
                        <span class="mai-business"></span>
                      </div>
                      <h5>{{$d->nama_alat}}</h5>
                      <p>{{$d->deskripsi_alat}}</p>
                    </div>
                  </div>
                @elseif($loop->iteration % 4 == 0 || $loop->last)
                <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
                    <div class="features">
                      <div class="header mb-3">
                        <div style="position: absolute; top: 0px; right: 20px; font-size: 18px;"> <a href="" class="send_upvote" id="upvote{{$d->id_saranalat}}" data-id="{{$d->id_saranalat}}" >
                          @if($count)
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                          @else
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-up" aria-hidden="true"></i>
                          @endif
                        </a></div> 
                        <span class="mai-business"></span>
                      </div>
                      <h5>{{$d->nama_alat}}</h5>
                      <p>{{$d->deskripsi_alat}}</p>
                    </div>
                  </div>
                  </div>
                </div>
                @else
                <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
                    <div class="features">
                      <div class="header mb-3">
                        <div style="position: absolute; top: 0px; right: 20px; font-size: 18px;"> <a href="" class="send_upvote" id="upvote{{$d->id_saranalat}}" data-id="{{$d->id_saranalat}}" >
                          @if($count)
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                          @else
                          <span>{{$allcount}}</span> <i class="fa fa-arrow-up" aria-hidden="true"></i>
                          @endif
                        </a></div> 
                        <span class="mai-business"></span>
                      </div>
                      <h5>{{$d->nama_alat}}</h5>
                      <p>{{$d->deskripsi_alat}}</p>
                    </div>
                  </div>
                @endif
              @endforeach
          </div>
        </div>

      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  
  <!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Post Saran Alat</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form id="modalform"action="{{url('buatalat')}}" method="post">
			@csrf
      @if(Auth::check())
			<input type="hidden" name="id" value="{{Auth::user()->id}}">
      @endif
			<div class="modal-body">
				<div class="field item form-group">
					<label class="col-form-label col-md-3 col-sm-3  label-align">Nama Alat<span class="required">*</span></label>
					<div class="col-md-12 col-sm-12">
            <div id="charNum1" class="badge badge-info float-right mb-1"></div>
						<input class="form-control" type="text" class='text' onkeyup="countChar1(this)" maxlength="50" id="nama_alat"name="nama_alat" required='required' autofocus oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"/></div>
				</div>
				<div class="field item form-group">
					<label class="col-form-label col-md-3 col-sm-3  label-align">Deskripsi<span class="required">*</span></label>
					<div class="col-md-12 col-sm-12">
            <div id="charNum2" class="badge badge-info float-right mb-1"></div>
						<textarea required="required" maxlength="250" id='deskripsi_alat' name='deskripsi_alat' style="min-width: 100%" onkeyup="countChar2(this)" oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"></textarea></div >
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
				<button type="submit" id="submitmodal" class="btn btn-primary">Buat</button>
			</div>
		</form>
		</div>
	</div>
	</div>

  <script>
    $(document).ready(function () {
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $('.send_upvote').on('click', function (e) {
        e.preventDefault();
        console.log({{$login ? 'true' : 'false'}} );
        if ('{{$login ? "true" : "false"}}' == 'false') {
          window.location.href = '{{url("upvoteredirect")}}'; //using a named route
        }
          // console.log('klik');
					let id = $(this).data('id');
          @if(Auth::check())
					let user = "{{Auth::user()->id}}";
          @endif
        
        $.ajax({
          type: 'post',
          url: '{{url("upvote")}}',
          data: {
              _token: CSRF_TOKEN,
              id:id,
              user:user
            },
            success: function (response) {
                console.log(response);
                $("#upvote"+id).html(response);
              }
            });
        });

        $('.saran_alat').on('click', function (e) {
          e.preventDefault();
          console.log({{$login ? 'true' : 'false'}} );
          if ('{{$login ? "true" : "false"}}' == 'false') {
          window.location.href = '{{url("saranalatredirect")}}'; //using a named route
        }
        });

        $('#tambahsaran').on('click', function (e) {
          e.preventDefault();
          $("#nama_alat").val('');
          $("#deskripsi_alat").text('');
          $("#submitmodal").text("Tambah");
          $("#submitmodal").attr('action', "{{url('buatalat')}}");
        });

        $('.pensil').on('click', function (e) {
          e.preventDefault();
          let id = $(this).data('id');
          console.log(id);

          $.ajax({
          type: 'get',
          url: '{{url("getdatasaran")}}',
          data: {
              _token: CSRF_TOKEN,
              id:id
            },
            success: function (response) {
              var response = JSON.parse(response);
                $("#modalform").attr('action', "{{url('ubahsaranalat')}}/"+response['id_saranalat']);
                $("#nama_alat").val(response['nama_alat']);
                $("#deskripsi_alat").text(response['deskripsi_alat']);
                $("#submitmodal").text("Ubah");
                console.log(response);
              }
            });
        });
        
    });
  </script>
  
@endsection