@extends('frontend.layouts.master')

@section('content')

<div class="row">
  <div class="col-md-9">
    <h2>{{ $data->name }}</h2>
    <p>{{ $data->info }}</p>
  </div>
  <div class="col-md-3">
    <img src="{{ url(session('site_upload').'/pages/'.$data->image) }}" alt="Generic placeholder image" width="200" height=200">
  </div>
</div>

@endsection