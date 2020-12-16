@extends('layouts.temp')

@section('title', 'Alat')
@section('breadcrumb', 'Alat')
@section('title2', 'Alat Robo')

@section('page')
  <div class="page-section">
    <div class="container">
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
              <a href="{{url('alat/profsiko')}}" class="btn btn-primary">Gunakan</a>
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
@endsection