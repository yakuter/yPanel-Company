@extends('layouts.auth')

@section('content')

<div id="signup-box" class="signup-box widget-box no-border visible">
    <div class="widget-body">
            <div class="widget-main">
                    <h4 class="header green lighter bigger">
                            <i class="ace-icon fa fa-users blue"></i>
                            Yeni Kullanıcı Kaydı
                    </h4>

                    <div class="space-6"></div>
                    <p> Bilgilerinizi giriniz: </p>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    
                            <fieldset>
                                    <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                    <input id="email" type="email" class="form-control" placeholder="E-posta" name="email" value="{{ old('email') }}" required>
                                                    <i class="ace-icon fa fa-envelope"></i>
                                            </span>
                                    </label>

                                    <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                    <input id="name" type="text" class="form-control" placeholder="Kullanıcı Adı" name="name" value="{{ old('name') }}" required autofocus>
                                                    <i class="ace-icon fa fa-user"></i>
                                            </span>
                                    </label>

                                    <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                    <input id="password" type="password" class="form-control" placeholder="Parola" name="password" required>
                                                    <i class="ace-icon fa fa-lock"></i>
                                            </span>
                                    </label>

                                    <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                    <input id="password-confirm" type="password" class="form-control" placeholder="Parola Tekrarı" name="password_confirmation" required>
                                                    <i class="ace-icon fa fa-retweet"></i>
                                            </span>
                                    </label>

                                    <div class="space-24"></div>

                                    <div class="clearfix">
                                            <button type="reset" class="width-30 pull-left btn btn-sm">
                                                    <i class="ace-icon fa fa-refresh"></i>
                                                    <span class="bigger-110">Sıfırla</span>
                                            </button>

                                            <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                                                    <span class="bigger-110">Kayıt Ol</span>

                                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                            </button>
                                    </div>
                            </fieldset>
                    </form>
            </div>

            <div class="toolbar center">
                    <a href="{{ url('/login') }}" class="back-to-login-link">
                            <i class="ace-icon fa fa-arrow-left"></i>
                            Kullanıcı Girişi
                    </a>
            </div>
    </div><!-- /.widget-body -->
</div><!-- /.signup-box -->

@endsection

<!--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->