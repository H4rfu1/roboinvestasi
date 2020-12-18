@extends('layouts.temp')

@section('title', 'Diskusi')
@section('breadcrumb', 'Diskusi')
@section('title2', 'Diskusi')

@section('page')
  <div class="page-section mt-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 py-3 container">
        	@if (session('status'))
                <div class="alert alert-success alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                {{ session('status') }}
                </div>
			@endif
			<span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>
			<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModalCenter">
				Buat Bahasan
			</button>
			<div class="clearfix">...</div>
			<p class="text-center">@if($data->isEmpty()){{"Belum ada diskusi"}}@endif</p>
			
		@foreach($data as $p)
			@php
				$komentar = DB::table('komentar')
				->join('users', 'komentar.id_pengomentar', '=', 'users.id')
				->join('diskusi', 'komentar.id_diskusi', '=', 'diskusi.id_diskusi')
				->select('komentar.*', 'users.name','diskusi.*')
				->where('komentar.id_diskusi', $p->id_diskusi)
				->orderBy('tanggal_dibuat', 'asc')
				->get();
				$count = DB::table('komentar')
				->join('users', 'komentar.id_pengomentar', '=', 'users.id')
				->join('diskusi', 'komentar.id_diskusi', '=', 'diskusi.id_diskusi')
				->select('komentar.*', 'users.name','diskusi.*')
				->where('komentar.id_diskusi', $p->id_diskusi)
				->count();

				$date = date_create_from_format("Y-m-d H:i:s", $p->tanggal_dibuat);
			@endphp
       	 <div class="shadow-lg p-3 mb-5 bg-white rounded">
			<article class="blog-entry">
				<div class="entry-header">
				<div class="post-date">
					<h3>{{date_format($date, 'd')}}</h3>
					<span>{{date_format($date, 'M')}}, {{date_format($date, 'Y')}}</span>
				</div>
				</div>
				<div class="post-title"><a href="#">{{$p->judul_diskusi}}</a></div>
				<div class="entry-meta mb-2">
				<div class="meta-item entry-author">
					<div class="icon">
					<span class="mai-person"></span>  
					</div>
					oleh <a href="#">{{$p->name}}</a>
				</div>
				<div class="meta-item">
					<div class="icon">
					<span class="mai-chatbubble-ellipses"></span>
					</div>
					<a  data-toggle="collapse" href="#komentar{{$p->id_diskusi}}" role="button" aria-expanded="false" aria-controls="komentar{{$p->id_diskusi}}">
						{{$count}} Komentar
					</a>
				</div>
				</div>
				<div class="entry-content">
					<!-- <div id="summary">
						<p class="collapse" id="collapseSummary{{$p->id_diskusi}}">{{$p->deskripsi_diskusi}}</p>
						<a class="collapsed" data-toggle="collapse" href="#collapseSummary{{$p->id_diskusi}}" aria-expanded="false" aria-controls="collapseSummary{{$p->id_diskusi}}"></a>
					</div> -->
				<p>{{$p->deskripsi_diskusi}}</p>
				</div>
			</article>

			<!-- Comments -->
			<div class="comment-area collapse" id="komentar{{$p->id_diskusi}}">
				<div class="comment-form-wrap mb-3">
				<div class="writeinfo{{$p->id_diskusi}}"></div>  
					<form>
						<div class="input-group">
							<!-- <div class="input-group-append">
								<span class="input-group-text attach_btn"><i class="fa fa-paperclip" aria-hidden="true"></i></span>
							</div> -->
							<textarea id="isi{{$p->id_diskusi}}" name="komentar" class="form-control type_msg" placeholder="Komen disini..." required oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"></textarea>
							<div class="input-group-append">
							<button type="submit" class="input-group-text send_btn" data-id="{{$p->id_diskusi}}" data-user="{{Auth::user()->id}}"><i class="fa fa-location-arrow" aria-hidden="true"></i></button>
							</div>
						</div>
					</form>
			  	</div>
			<!-- Comment List -->
			<p id="pertama{{$p->id_diskusi}}">@if($komentar->isEmpty()){{"Jadilah pertama yang komen."}} @endif</p>
            <ul class="comment-list" id="comment-list{{$p->id_diskusi}}">
			  @foreach($komentar as $k)
				<li class="comment">
					<div class="vcard bio">
					<img src="{{asset('assets/img/person.png')}}" alt="Image placeholder">
					</div>
					<div class="comment-body">
					<h3>{{$k->name}}</h3>
					<div class="meta">{{date('d M y | H:i A', strtotime($k->tanggal_komen))}}</div>
					<p>{{$k->komentar}}</p>
					</div>
				</li>
			  @endforeach
            </ul> <!-- END .comment-list -->
          </div> <!-- end comment -->
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLongTitle">Buat Bahasan Diskusi</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form action="{{url('buatdiskusi')}}" method="post">
			@csrf
			<input type="hidden" name="id" value="{{Auth::user()->id}}">
			<div class="modal-body">
				<div class="field item form-group">
					<label class="col-form-label col-md-3 col-sm-3  label-align">Judul<span class="required">*</span></label>
					<div class="col-md-12 col-sm-12">
						<input class="form-control" type="text" class='text' name="judul_diskusi" required='required' oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')"/></div>
				</div>
				<div class="field item form-group">
					<label class="col-form-label col-md-3 col-sm-3  label-align">Deskripsi<span class="required">*</span></label>
					<div class="col-md-12 col-sm-12">
						<textarea required="required" name='deskripsi_diskusi' style="min-width: 100%"></textarea></div oninvalid="this.setCustomValidity('Tidak boleh kosong')" oninput="setCustomValidity('')">
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
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $('.send_btn').on('click', function (e) {
					e.preventDefault();
                    // console.log('klik');
					let id = $(this).data('id');
					let user = $(this).data('user');
					let msg = $("#isi"+id).val();
        
                $.ajax({
                type: 'post',
				url: '{{url('komen')}}',
				data: {
						_token: CSRF_TOKEN, 
						komentar:msg,
						id:id,
						user:user
					},
                success: function (response) {
				// console.log(response);
				$('#pertama'+id).empty();
				$("#isi"+id).val('');
                // $('#comment-list'+id).append(response);
                $('#comment-list'+id).fadeOut(800, function(){
                  $('#comment-list'+id).append(response).fadeIn();
                        });
                }
            });
        });
    });
    </script>

@endsection