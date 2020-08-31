@extends('home') 
@section('content')
<div class="container">
  <div class="row" style="margin-top:20px;">
      <div class="col-lg-8 mb-4">
        @foreach($vacan as $v)
          <h3>Description of {{$v->title}}</h3>
          <p>{!! nl2br(e($v->desc)) !!}</p>
        <a href="{{ url('/apply/'.$v->idvacancies) }}" class="btn btn-success">Apply</a>
        @endforeach
        <a href="{{ url('/') }}" class="btn btn-info">Back to home</a>
      </div>
      <div class="col-lg-4 mb-4">
        @foreach($vacan as $v)
          <img src="{{url(env('CDN_URL').'/file_vacancy/'.$v->image)}}" class="img-fluid rounded">
        @endforeach
      </div>
    </div>
</div>
<!-- /.row -->
@endsection