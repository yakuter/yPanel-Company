@extends('layouts.auth')

@section('content')

<div id="login-box" class="login-box visible widget-box no-border">
	<div class="widget-body">
		<div class="widget-main">
			<h4 class="header blue lighter bigger">
				<i class="ace-icon fa fa-coffee green"></i>
				Lütfen bilgilerinizi giriniz
			</h4>

			<div class="space-6"></div>

			<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        
				<fieldset>
					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
                                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
							<i class="ace-icon fa fa-user"></i>
						</span>
					</label>

					<label class="block clearfix">
						<span class="block input-icon input-icon-right">
							<input id="password" type="password" class="form-control" name="password" required>                                                        
							<i class="ace-icon fa fa-lock"></i>
						</span>
					</label>

					<div class="space"></div>

					<div class="clearfix">
						<label class="inline">
                                                        <input type="checkbox" name="remember">
							<span class="lbl"> Beni Hatırla</span>
						</label>

						<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
							<i class="ace-icon fa fa-key"></i>
							<span class="bigger-110">Giriş yap</span>
						</button>
					</div>

					<div class="space-4"></div>
				</fieldset>
			</form>

		</div><!-- /.widget-main -->

		<div class="toolbar clearfix">
			<div>
				<a href="{{ url('/password/reset') }}" class="forgot-password-link">
					<i class="ace-icon fa fa-arrow-left"></i>
					Şifremi unuttum
				</a>
			</div>

			<div>
				<a href="{{ url('/register') }}" class="user-signup-link">
					Kayıt ol
					<i class="ace-icon fa fa-arrow-right"></i>
				</a>
			</div>
		</div>
	</div><!-- /.widget-body -->
</div><!-- /.login-box -->

@endsection

<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->