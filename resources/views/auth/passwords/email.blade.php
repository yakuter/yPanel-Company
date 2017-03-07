@extends('layouts.auth')

@section('content')

<div id="forgot-box" class="forgot-box widget-box visible no-border">
    <div class="widget-body">
            <div class="widget-main">
                    <h4 class="header red lighter bigger">
                            <i class="ace-icon fa fa-key"></i>
                            Parolayı Sıfırla
                    </h4>

                    <div class="space-6"></div>
                    <p>
                            E-posta adresinizi giriniz
                    </p>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}
                        
                            <fieldset>
                                    <label class="block clearfix">
                                            <span class="block input-icon input-icon-right">
                                                    <input id="email" type="email" class="form-control" placeholder="E-posta" name="email" value="{{ old('email') }}" required autofocus>
                                                    <i class="ace-icon fa fa-envelope"></i>
                                            </span>
                                    </label>

                                    <div class="clearfix">
                                            <button type="submit" class="width-35 pull-right btn btn-sm btn-danger">
                                                    <i class="ace-icon fa fa-lightbulb-o"></i>
                                                    <span class="bigger-110">Gönder!</span>
                                            </button>
                                    </div>
                            </fieldset>
                    </form>
            </div><!-- /.widget-main -->

            <div class="toolbar center">
                    <a href="{{ url('/login') }}" class="back-to-login-link">
                            Kullanıcı Girişi
                            <i class="ace-icon fa fa-arrow-right"></i>
                    </a>
            </div>
    </div><!-- /.widget-body -->
</div><!-- /.forgot-box -->

@endsection