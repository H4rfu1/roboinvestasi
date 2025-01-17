@extends('layouts.temp')

@section('title', 'Blog')
@section('breadcrumb', 'Blog')
@section('title2', 'Blog')

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
        @if(Auth::check())
        <div class="col-sm-2 text-sm-right">
          <a class="btn btn-secondary" href="{{url('/blog/buat')}}" >Buat artikel</a>
        </div>
        @endif
      </div>

      
      <div class="row my-5" >
      @foreach($data as $li)
        <div class="col-lg-4 py-3" >
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="{{ url($li->foto) }}" alt="" width="100%">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="{{url('/blog/detail/'.$li->id)}}">{{ $li->judul }}</a></h5>
              <div class="post-date">Posted on <a href="#">{{date('d M y | H:i A', strtotime($li->waktu))}}</a></div>
            </div>
          </div>
        </div>
      @endforeach
        
        <!-- <div class="col-lg-4 py-3" style="display: inline-block;">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="../assets/img/blog/blog-2.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 py-3">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="../assets/img/blog/blog-3.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 py-3">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="../assets/img/blog/blog-4.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 py-3">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="../assets/img/blog/blog-3.jpg" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html">Source of Content Inspiration</a></h5>
              <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
            </div>
          </div>
        </div> -->

      </div>
      
      
      {{ $data->links() }}

      <!--<nav aria-label="Page Navigation">-->
      <!--  <ul class="pagination justify-content-center">-->
      <!--    <li class="page-item disabled">-->
      <!--      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>-->
      <!--    </li>-->
      <!--    <li class="page-item"><a class="page-link" href="#">1</a></li>-->
      <!--    <li class="page-item active" aria-current="page">-->
      <!--      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>-->
      <!--    </li>-->
      <!--    <li class="page-item"><a class="page-link" href="#">3</a></li>-->
      <!--    <li class="page-item">-->
      <!--      <a class="page-link" href="#">Next</a>-->
      <!--    </li>-->
      <!--  </ul>-->
      <!--</nav>-->

    </div>
  </div>

  @endsection