@extends('layouts.auth')

@section('judul', 'Daftar')

@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-160 p-t-50">
				<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
					@csrf
					<div class="login100-form-avatar">
						<a href="{{url('/')}}"><img src="{{asset('assets/img/avatar100.png')}}" alt="AVATAR"></a>
					</div>
					<span class="login100-form-title p-t-20 p-b-45">
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Name is required">
						<input id="name" class="input100 @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="name" placeholder="Nama Lengkap" >
						<span class="focus-input100">asd</span>
						<span class="symbol-input100">
							<i class="fa fa-user-circle"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Email is required">
						<input id="email"  class="input100 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input id="password" class="input100 @error('password') is-invalid @enderror" name="password" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="new-password" type="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password_confirmation" placeholder="Konfirmasi Password" id="password-confirm" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" autocomplete="new-password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					@error('name')
					<div class="alert alert-danger alert-dismissible fade show m-auto" role="alert">
						{{ $message }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@enderror
					@error('email')
					<div class="alert alert-danger alert-dismissible fade show m-auto" role="alert">
						{{ $message }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@enderror
					@error('password')
					<div class="alert alert-danger alert-dismissible fade show m-auto" role="alert">
						{{ $message }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@enderror

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit">
							{{ __('Daftar') }}
						</button>
					</div>
					<div class="text-center w-full p-t-23">
						
					<a href="{{url('/')}}" class="txt1 float-left" style="color:white" onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#fff'">
                        {{ __('Kembali ke Home') }}
						</a>
						<a href="{{url('/login')}}" class="txt1 float-right"  style="color:white" onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#fff'">
									{{ __('Masuk') }}
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection