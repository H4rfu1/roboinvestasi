@extends('layouts.temp')

@section('title', 'Home Page')

@section('page')
  <div class="page-section" id="about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3 wow fadeInUp">
          <span class="subhead">Tentang Kami</span>
          <h2 class="title-section">RoboInvestasi #1 Berkomitmen Memberikan yang Terbaik</h2>
          <div class="divider"></div>

          <p>Kami akan membantu pengguna mengenal lebih jauh mmengenal topik investasi. Mulai dari definisi, alasan, tujuan, manfaat dan bagaimana cara berinvestasi yang baik.</p>
          <p>Kami juga berusaha menghadirkan alat - alat untuk mempermudah mengambil keputusan dalam berinvestasi....</p>
          <a href="{{url('about')}}" class="btn btn-primary mt-3">Selengkapnya</a>
        </div>
        <div class="col-lg-6 py-3 wow fadeInRight">
          <div class="img-fluid py-3 text-center">
            <img src="{{asset('assets/img/tentang_frame.png')}}" alt="">
          </div>
        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->  

  <!-- tools -->
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
  
  <!-- Banner info -->
  <div class="page-section banner-info">
    <div class="wrap bg-image" style="background-image: url({{asset('assets/img/bg_pattern.svg')}});">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 py-3 pr-lg-5 wow fadeInUp">
          <h2 class="title-section"> Keunggulan RoboInvetasi</h2>
            <div class="divider"></div>
            <p>Membantumu memahami seluk beluk investasi dengan menghadirkan beberapa fitur keren.</p>
            
            <ul class="theme-list theme-list-light text-white">
              <li>
                <div class="h5">Bot RoboInvestasi</div>
                <p>Robo akan menjawab pertanyaanmu seputar investasi. Ada di pojok kanan bawah laman.</p>
              </li>
              <li>
                <div class="h5">Alat RoboInvestasi</div>
                <p>Robo akan membantumu mengambil keputusan seputar instrumen investasi.</p>
              </li>
              <li>
                <div class="h5">Newsletter RoboInvestasi</div>
                <p>Robo akan mengirim email update seputar perkembangan website blog dan diskusi.</p>
              </li>
              <li>
                <div class="h5">Blog dan Diskusi RoboInvestasi</div>
                <p>Blog akan membahas update seputar perkembangan berita, materi investasi dan juga event seputar investasi.  Diskusi akan memberikan pengetahuan dari pengalaman sesama pembelajar. </p>
              </li>
            </ul>
          </div>
          <div class="col-lg-6 py-3 wow fadeInRight">
            <div class="img-fluid text-center">
              <img src="{{asset('assets/img/banner_image_2.svg')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .wrap -->
  </div> <!-- .page-section -->
  
  
  <!-- Blog -->
  <div class="page-section">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <div class="subhead">Blog</div>
        <h2 class="title-section">Baca Artikel Terbaru</h2>
        <div class="divider mx-auto"></div>
      </div>
      
      <div class="row mt-5">
        <div class="col-lg-4 py-3 wow fadeInUp">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="{{asset('assets/img/blog/blog-1.jpg')}}" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 py-3 wow fadeInUp">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="{{asset('assets/img/blog/blog-2.jpg')}}" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 py-3 wow fadeInUp">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="{{asset('assets/img/blog/blog-3.jpg')}}" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>
        
        <div class="col-12 mt-4 text-center wow fadeInUp">
          <a href="blog.html" class="btn btn-primary">View More</a>
        </div>
      </div>
    </div>
  </div>
  
  <div class="page-section banner-seo-check">
    <div class="wrap bg-image" style="background-image: url({{asset('assets/img/bg_pattern.svg')}});">
      <div class="container text-center">
        <div class="row justify-content-center wow fadeInUp">
          <div class="col-lg-8">
            <h2 class="mb-4">Subscribe Newsletter</h2>
            <form action="#">
              <input type="text" class="form-control" placeholder="Masukan email..">
              <button type="submit" class="btn btn-success">Subscribe</button>
            </form>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .wrap -->
  </div> <!-- .page-section -->
  
  @endsection

  