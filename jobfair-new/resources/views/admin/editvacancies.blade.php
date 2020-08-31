@extends('admin.dashboard')

@section('judul', 'Edit Vacancy')

@section('isi')
<h1>Edit Vacancies</h1>
@foreach($vacan as $v)
<form action="{{ url('/update/vacancies/'.$v->idvacancies) }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <label for="type">Type :</label>
  <label class="radio-inline" style="margin-left:10px;">
      <input type="radio" name="type" value="j">job
  </label>
  <label class="radio-inline" style="margin-left:5px;">
      <input type="radio" name="type" value="i">internship
  </label>
  <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('type') }}</div><br/>
  <div class="form-group">
      <label for="title">Title :</label>
      <input type="text" name="title" class="form-control" id="title" value="{{$v->title}}">
      <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('title') }}</div>
  </div>
  <div class="form-group">
      <label for="desc">Description :</label>
      <textarea class="form-control" name="desc" rows="5" id="desc">{{$v->desc}}</textarea>
      <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('desc') }}</div>
  </div>
  <label for="pict">Vacancies picture</label>
  <div class="form-group">
    <input type="file" name="image" class="form-control-file" id="pict">
    <div class="alert-danger">{{ $errors->first('image') }}</div>
  </div>
  <div class="form-check">
    <input type="checkbox" name="active" checked="" class="form-check-input" id="active">
    <label class="form-check-label" for="active">Active</label>
  </div>
  <button type="submit" class="btn btn-primary">Update Vacancies</button>
</form>
@endforeach
<a class="btn btn-info" href="{{ url('/vacancies') }}" style="margin-left:160px; margin-top:-65px;">Cancel</a>
@endsection