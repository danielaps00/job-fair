@extends('admin.dashboard')

@section('judul', 'Edit Banner')

@section('isi')
<h1>Edit Banner</h1>
@foreach($bann as $b)
<form action="{{ url('/update/banner/'.$b->idbanners) }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputNama">Banner Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputNama"  value="{{$b->title}}">
    <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('title') }}</div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile">Banner Image</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile" value="{{$b->image}}">
    <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('image') }}</div>
  </div>
  <button type="submit" class="btn btn-primary">Update Banner</button>
</form>
@endforeach
<a class="btn btn-info" href="{{ url('/banner') }}" style="margin-left:140px; margin-top:-65px;">Cancel</a>
@endsection