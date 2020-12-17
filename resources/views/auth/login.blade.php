@extends('layouts.auth')

@section('judul', 'login')

@section('content')
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-160 p-t-50">
	@if (session('status'))
                <div class="alert alert-danger alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                {{ session('status') }}
                </div>
			@endif
			
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
					<div class="login100-form-avatar">
						<a href="{{url('/')}}"><img src="{{asset('assets/img/avatar100.png')}}" alt="AVATAR"></a>
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
					</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "email is required">
						<input class="input100 @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="current-password" class="form-control" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					@error('password')
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

					<!-- <div class="text-center checkbox w-full p-t-10 text-white">
						<label style="font-size: 1em">
						<input type="checkbox" value="" name="remember"  {{ old('remember') ? 'checked' : '' }}>
						<span class="cr"><i class="cr-icon fa fa-check"></i></span>
						{{ __('Remember Me') }}
						</label>
					</div> -->

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit">
                            {{ __('Masuk') }}
						</button>
					</div>
					<div class="text-center w-full p-t-23">
						<a href="{{url('/')}}" class="txt1 float-left" style="color:white" onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#fff'">
                        {{ __('Kembali ke Home') }}
						</a>

						<a href="{{url('/register')}}" class="txt1 float-right txt-white" style="color:white" onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#fff'">
							{{ __('Belum punya akun? Daftar') }}
						</a>
					</div>
					<!-- <div class="w-full">
						<a href="{{ route('login.provider', 'google') }}" class="btn btn-danger">{{ __('Google Sign in') }}</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
@endsection
