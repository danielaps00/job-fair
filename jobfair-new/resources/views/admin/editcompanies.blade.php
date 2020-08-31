@extends('admin.dashboard')

@section('judul', 'Edit Company')

@section('isi')
<h1>Edit Company</h1>
@foreach($compa as $c)
<form action="{{ url('/update/companies/'.$c->idcompanies) }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }} 
  <div class="form-group">
    <label for="exampleInputNama">Nama Perusahaan</label>
    <input type="text" name="name" class="form-control" id="exampleInputNama"  value="{{$c->name}}">
    <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('name') }}</div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile">Gambar Perusahaan</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile" value="{{$c->image}}">
    <div class="alert-danger">{{ $errors->first('image') }}</div>
  </div>
  <div class="form-check">
    <input type="checkbox" name="active" checked="" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Active</label>
  </div>
  <button type="submit" class="btn btn-primary">Update Company</button>
</form>
@endforeach
<a class="btn btn-info" href="{{ url('/companies') }}" style="margin-left:160px; margin-top:-65px;">Cancel</a>
@endsection