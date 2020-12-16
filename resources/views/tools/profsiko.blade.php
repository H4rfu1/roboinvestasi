@extends('layouts.temp')

@section('title', 'ProfSiko')
@section('breadcrumb', 'ProfSiko')
@section('title2', 'Robo Profil Resiko')

@section('page')
  <div class="page-section">
    <div class="container">
            <div class="d-flex justify-content-center">
              <img class="img-fluid" src="{{asset('assets/img/avatar100.png')}}" alt="">
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-8">
                    <form id="regForm" class="shadow p-3 mb-5 bg-white rounded">
                        <h1 id="register">Form pertanyaan</h1>
                        <div class="all-steps" id="all-steps"> <span class="step"><i class="fa fa-user"></i></span> <span class="step"><i class="fa fa-map-marker"></i></span> <span class="step"><i class="fa fa-shopping-bag"></i></span> <span class="step"><i class="fa fa-car"></i></span> </div>
                        <div class="tab">
                            <h6>Siapa nama kamu?</h6>
                            <p> <input id="input" placeholder="Nama..." oninput="this.className = ''" id="nama" name="nama"></p>
                        </div>
                        <div class="tab">
                            <h6>Tujuan investasi, Pilih yang menunjukan dirikamu?</h6>
                            <p> <input id="input" placeholder="Nama..." oninput="this.className = ''" id="nama" name="nama"></p>
                        </div>
                        <div class="tab">
                            <h6>jangka Waktu, Pilih yang menunjukan dirikamu?</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    First radio
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                <label class="form-check-label" for="gridRadios2">
                                    Second radio
                                </label>
                            </div>
                        </div>
                        <div class="tab">
                            <h6>ketergantungan terhadap hasil, Pilih yang menunjukan dirikamu?</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    First radio
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                <label class="form-check-label" for="gridRadios2">
                                    Second radio
                                </label>
                            </div>
                        </div>
                        <div class="tab">
                            <h6>toleransi resiko, Pilih yang menunjukan dirikamu?</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    First radio
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                <label class="form-check-label" for="gridRadios2">
                                    Second radio
                                </label>
                            </div>
                        </div>
                        <div class="tab">
                            <h6>penurunan investasi, Pilih yang menunjukan dirikamu?</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    First radio
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                <label class="form-check-label" for="gridRadios2">
                                    Second radio
                                </label>
                            </div>
                        </div>
                        <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                            <h6>Pilih yang menunjukan dirikamu?</h6>
                            <button class="btn btn-primary send_btn">Kirim</button>
                        </div>
                        <div style="overflow:auto;" id="nextprevious">
                            <div style="float:right;"> <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-angle-double-left"></i></button> <button type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fa fa-angle-double-right"></i></button> </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->
  <script>
            $(document).ready(function () {
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $('.send_btn').on('click', function (e) {
					e.preventDefault();
                    console.log('klik');
                    let nama = $("#nama").val();
                    console.log(nama);
                $.ajax({
                type: 'post',
				url: '{{url("roboprofsiko")}}',
				data: {
						_token: CSRF_TOKEN, 
						nama:nama
					},
                success: function (response) {
				console.log(response);
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