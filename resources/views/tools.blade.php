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
        <button type="button" class="btn btn-primary saran_alat" data-toggle="modal" data-target="#exampleModalCenter">
          Buat saran
        </button>

        <p class="mt-3">Saran Alat Terpopuler</p>
        <div class="divider mx-auto"></div>
        <div class="row">
          <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
            <div class="features">
              <div class="header mb-3">
                <span class="mai-business"></span>
              </div>
              <h5>OnSite SEO</h5>
              <p>We analyse your website's structure, internal architecture & other key</p>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
            <div class="features">
              <div class="header mb-3">
                <span class="mai-business"></span>
              </div>
              <h5>OnSite SEO</h5>
              <p>We analyse your website's structure, internal architecture & other key</p>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
            <div class="features">
              <div class="header mb-3">
                <span class="mai-business"></span>
              </div>
              <h5>OnSite SEO</h5>
              <p>We analyse your website's structure, internal architecture & other key</p>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
            <div class="features">
              <div class="header mb-3">
                <span class="mai-business"></span>
              </div>
              <h5>OnSite SEO</h5>
              <p>We analyse your website's structure, internal architecture & other key</p>
            </div>
          </div>
        </div>

        <p>Saran Alat Terbaru</p>
        <div class="divider mx-auto"></div>
        <div class="row">
          <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
            <div class="features">
              <div class="header mb-3">
                <span class="mai-business"></span>
              </div>
              <h5>OnSite SEO</h5>
              <p>We analyse your website's structure, internal architecture & other key</p>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
            <div class="features">
              <div class="header mb-3">
                <span class="mai-business"></span>
              </div>
              <h5>OnSite SEO</h5>
              <p>We analyse your website's structure, internal architecture & other key</p>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
            <div class="features">
              <div class="header mb-3">
                <span class="mai-business"></span>
              </div>
              <h5>OnSite SEO</h5>
              <p>We analyse your website's structure, internal architecture & other key</p>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4 col-xl-3 py-3">
            <div class="features">
              <div class="header mb-3">
                <span class="mai-business"></span>
              </div>
              <h5>OnSite SEO</h5>
              <p>We analyse your website's structure, internal architecture & other key</p>
            </div>
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
			<h5 class="modal-title" id="exampleModalLongTitle">Buat Saran</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="{{url('buatalat')}}" method="post">
			@csrf
      @if(Auth::check())
			<input type="hidden" name="id" value="{{Auth::user()->id}}">
      @endif
			<div class="modal-body">
				<div class="field item form-group">
					<label class="col-form-label col-md-3 col-sm-3  label-align">Nama Alat<span class="required">*</span></label>
					<div class="col-md-12 col-sm-12">
						<input class="form-control" type="text" class='text' name="nama_alat" required='required' autofocus oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"/></div>
				</div>
				<div class="field item form-group">
					<label class="col-form-label col-md-3 col-sm-3  label-align">Deskripsi<span class="required">*</span></label>
					<div class="col-md-12 col-sm-12">
						<textarea required="required" name='deskripsi_alat' style="min-width: 100%" oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"></textarea></div >
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Buat</button>
			</div>
		</form>
		</div>
	</div>
	</div>

  <script>
    $(document).ready(function () {
        $('.saran_alat').on('click', function (e) {
          e.preventDefault();
          console.log({{$login ? 'true' : 'false'}} );
          if ('{{$login ? "true" : "false"}}' == 'false') {
          window.location.href = '{{url("saranalatredirect")}}'; //using a named route
        }
        });
        
    });
  </script>
  
@endsection