@extends('layouts.temp')

@section('title', 'Tentang Kami')
@section('breadcrumb', 'Tentang')
@section('title2', 'Tentang Kami')

@section('page')
<div class="page-section" id="about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3 wow fadeInUp">
          <span class="subhead">Tentang Kami</span>
          <h2 class="title-section">RoboInvestasi #1 Berkomitmen Memberikan yang Terbaik</h2>
          <div class="divider"></div>

          <p>Kami akan membantu pengguna mengenal lebih jauh tentang investasi. Mulai dari definisi, alasan, tujuan, manfaat dan bagaimana cara berinvestasi yang baik.</p>
          <p>Kami juga berusaha menghadirkan alat - alat untuk mempermudah mengambil keputusan dalam berinvestasi.</p>
          <p>Kami Berusaha mengembangkan website ini (RoboInvestasi) menjadi lebih baik setiap harinya. Hubungi kami di instagram <a href="https://instagram.com/roboinvestasi">RoboInvestasi</a> ataupun kontak pengembang apabila anda memiliki saran dan masukan yang dapat bermanfaat dan berguna apabila ada di dalam website ini.</p>
          <p>Salam hangat, Tim Pengembang.</p>
        </div>
        <div class="col-lg-6 py-3 wow fadeInRight">
          <div class="img-fluid py-3 text-center">
            <img src="{{asset('assets/img/tentang_frame.png')}}" alt="">
          </div>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <div class="page-section">
    <div class="container">
      <div class="text-center">
        <div class="subhead">Tim Pengembang</div>
        <h2 class="title-section">Pengembang RoboInvestasi</h2>
        <div class="divider mx-auto"></div>
      </div>
      <div class="row mt-5">
      <div class="col-lg-2 py-3">
      </div>
        <div class="col-lg-4 py-3">
          <div class="card-pricing">
            <div class="header">
              <div class="pricing-type" style="font-size:20px">Moh. Fahrul Hafidh</div>
            </div>
            <div class="body">
              <img src="{{asset('assets/img/foto-fahrul-removebg.png')}}" alt="foto-fahrul" class="img-fluid">
              <p>Project Owner, Developer and Analys<br>Mahasiswa Universitas Jember</p>
            </div>
            <div class="footer">
              <a href="https://api.whatsapp.com/send?phone=6283111712794" class="btn btn-pricing btn-block">Kontak</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 py-3">
          <div class="card-pricing">
            <div class="header">
              <div class="pricing-type" style="font-size:20px">Muhammad Nurfakhri Zakiy</div>
            </div>
            <div class="body">
              <img src="{{asset('assets/img/foto-fakhri-removebg.png')}}" alt="foto-fakhri" class="img-fluid">
              <p>Designer, Developer and Analys <br>Mahasiswa Universitas Jember</p>
            </div>
            <div class="footer">
              <a href="https://api.whatsapp.com/send?phone=6287791329232" class="btn btn-pricing btn-block">Kontak</a>
            </div>
          </div>
        </div>

      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

@endsection