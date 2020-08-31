@extends('home')
@section('content')
 <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        @foreach( $bann as $b )
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
      </ol>
      
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        @foreach( $bann as $b )
        <div class="carousel-item {{ $loop->first ? ' active' : '' }}" style="background-image: url({{env('CDN_URL').'/file_banner/'.$b->image}});">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>
        @endforeach
      </div>
      
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>
<br/>
<div class="container">
    @if(\Session::has('alert'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{Session::get('alert')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   @endif
    <div id="judul">
        <h1>JOB FAIR</h1>
    </div>
    <!-- vacancy Section -->
    @foreach( $vacan as $v ) 
    <div class="row">
        <div class="col-lg-6">
            <img class="img-fluid rounded" src="{{url(env('CDN_URL').'/file_vacancy/'.$v->image)}}" alt="">
        </div>
        <div class="col-lg-6">
            <h2>{{$v->title}}</h2>
            <p>{{substr($v->desc, 0, 500)}}..<a href="{{url('/detail/'.$v->idvacancies)}}">see details</a></p>
            <a class="btn btn-lg btn-success btn-block" href="{{ url('/apply/'.$v->idvacancies) }}">Apply</a>
        </div>
    </div>
    @endforeach
    <!-- end of vacancy section -->
</div>
@endsection