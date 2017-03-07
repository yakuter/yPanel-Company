@extends('admin.layouts.master')

@section('content')

<div class="main-content">
	<div class="main-content-inner">
		
		<div class="page-content">
			
			<div class="page-header">
				<h1>
					Kullanıcılar
					<small>
						<i class="ace-icon fa fa-angle-double-right"></i>
						Yeni Kullanıcı
					</small>
				</h1>
			</div><!-- /.page-header -->

			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->

					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif

					{{ Form::open(['url' => '/admin/kullanicilar', 'method' => 'POST', 'class'=>'form-horizontal', 'files'=>true ]) }}

					{{ csrf_field() }}

					<h3 class="header smaller lighter orange">Genel Bilgiler</h3>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ad Soyad </label>

							<div class="col-sm-9">
								<input type="text" name="adsoyad" id="form-field-1" placeholder="Ad Soyad" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Website/Blog </label>

							<div class="col-sm-9">
								<input type="text" name="website" id="form-field-1" placeholder="Website/Blog" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Biyografi </label>

							<div class="col-sm-4">
								<textarea name="biyografi" rows="4" class="form-control" id="form-field-2" placeholder="Biyografi"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Konum </label>

							<div class="col-sm-9">
								<input type="text" name="konum" id="form-field-1" placeholder="Konum" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Twitter (@yakuter vb.) </label>

							<div class="col-sm-9">
								<input type="text" name="twitter" id="form-field-1" placeholder="Twitter" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Facebook </label>

							<div class="col-sm-9">
								<input type="text" name="facebook" id="form-field-1" placeholder="Facebook" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fotoğraf </label>

							<div class="col-sm-9">
								<!--<input type="text" name="foto" id="form-field-1" placeholder="Fotoğraf" class="col-xs-10 col-sm-5" />-->
								<input type="file" name="foto" accept="image/*" />

							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-select-1"> Üyelik Türü</label>

							<div class="col-sm-3">
								<select name="role_id" class="form-control" id="form-field-select-1">
									@if ( !$roles->count() )
								    	<option value="0">Üyelik türü bulunmamaktadır.</option>
								   	@else
								    	@foreach ( $roles as $role )
								    	<option value="{{ $role->id }}" >{{ $role->name }}</option>
								    	@endforeach
								    @endif
								</select>
							</div>
						</div>

					<h3 class="header smaller lighter green">Güvenlik Bilgileri</h3>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kullanıcı Adı *</label>

							<div class="col-sm-9">
								<input type="text" name="name" id="form-field-1" placeholder="Kullanıcı Adı" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> E-posta *</label>

							<div class="col-sm-9">
								<input type="text" name="email" id="form-field-1" placeholder="E-posta" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Parola *</label>

							<div class="col-sm-9">
								<input type="password" name="password" id="form-field-1" placeholder="Parola" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Parola Tekrar *</label>

							<div class="col-sm-9">
								<input type="password" name="password_confirmation" id="form-field-1" placeholder="Parola Tekrar" class="col-xs-10 col-sm-5" />
							</div>
						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Ekle
								</button>

								&nbsp; &nbsp; &nbsp;
								<button class="btn" type="reset">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									Temizle
								</button>
							</div>
						</div>
					</form>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->

@endsection <!-- section "content" stop -->