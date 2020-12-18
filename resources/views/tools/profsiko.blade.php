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
                        <p class="card-description">Tujuan Investasi?</p>
                        <div> 
                            <input type="radio" name="tujuan_investasi" id="tujuan_investasi1" value="1"/> 
                            <label class="radio" for="tujuan_investasi1">Radio Button 1</label> 
                            <input type="radio" name="tujuan_investasi" id="tujuan_investasi2" value="2"/> 
                            <label for="tujuan_investasi2">Radio Button 2</label> 
                            <input type="radio" name="tujuan_investasi" id="tujuan_investasi3" value="3"/>
                            <label for="tujuan_investasi3">Radio Button 3</label> 
                        </div>
                        <p class="card-description">Besar target persen cuan yang ingin didapat?</p>
                        <div> 
                            <input type="radio" name="besar_return" id="besar_return1" value="1"/> 
                            <label class="radio" for="besar_return1">Radio Button 1</label> 
                            <input type="radio" name="besar_return" id="besar_return2" value="2"/> 
                            <label for="besar_return2">Radio Button 2</label> 
                            <input type="radio" name="besar_return" id="besar_return3" value="3"/>
                            <label for="besar_return3">Radio Button 3</label> 
                        </div>
                        <p class="card-description">Lama atau Jangka Waktu Investasi?</p>
                        <div> 
                            <input type="radio" name="jangka_waktu" id="jangka_waktu1" value="1"/> 
                            <label class="radio" for="jangka_waktu1">Radio Button 1</label>
                            <input type="radio" name="jangka_waktu" id="jangka_waktu2" value="2"/> 
                            <label for="jangka_waktu2">Radio Button 2</label> 
                            <input type="radio" name="jangka_waktu" id="jangka_waktu3" value="3"/>
                            <label for="jangka_waktu3">Radio Button 3</label> 
                        </div>
                        <p class="card-description">Find the custom radio button for your projec</p>
                        <div> 
                            <input type="radio" name="toleransi_resiko" id="toleransi_resiko1" value="1"/> 
                            <label class="radio" for="toleransi_resiko1">Radio Button 1</label> 
                            <input type="radio" name="toleransi_resiko" id="toleransi_resiko2" value="2"/> 
                            <label for="toleransi_resiko2">Radio Button 2</label> 
                            <input type="radio" name="toleransi_resiko" id="toleransi_resiko3" value="3"/>
                            <label for="toleransi_resiko3">Radio Button 3</label> 
                        </div>
                        <p class="card-description">Find the custom radio button for your project</p>
                        <div> 
                            <input type="radio" name="ketergantungan_hasil" id="ketergantungan_hasil1" value="1"/> 
                            <label class="radio" for="ketergantungan_hasil1">Radio Button 1</label> 
                            <input type="radio" name="ketergantungan_hasil" id="ketergantungan_hasil2" value="2"/> 
                            <label for="ketergantungan_hasil2">Radio Button 2</label> 
                            <input type="radio" name="ketergantungan_hasil" id="ketergantungan_hasil3" value="3"/>
                            <label for="ketergantungan_hasil3">Radio Button 3</label> 
                        </div>
                        <input type="submit" class="btn btn-primary mt-3 send_btn">
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
                    let nilai = document.querySelector('input[name="toleransi_resiko"]:checked').value;
                    console.log(nilai);
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