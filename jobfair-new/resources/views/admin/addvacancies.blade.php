@extends('admin.dashboard')

@section('judul', 'Vacancy')

@section('isi')
<h1>Input Vacancies</h1>
<form action="{{ url('/add/vacancies') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputNama">Company :</label>
    <select name="idcompanies" class="form-control">
        @foreach($compa as $c)
            <option value="{{$c->idcompanies}}">{{$c->name}}</option>
        @endforeach
    </select>
  </div>
  <label for="type">Type :</label>
  <label class="radio-inline" style="margin-left:10px;">
      <input type="radio" name="type" value="j">job
  </label>
  <label class="radio-inline" style="margin-left:5px;">
      <input type="radio" name="type" value="i">internship
  </label>
  <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('type') }}</div>
  <br/>
  <div class="form-group">
      <label for="usr">Title :</label>
      <input type="text" name="title" class="form-control" id="usr">
      <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('title') }}</div>
  </div>
  <div class="form-group">
      <label for="comment">Description :</label>
      <textarea class="form-control" name="desc" rows="5" id="comment"></textarea>
      <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('desc') }}</div>
  </div>
  <label for="exampleFormControlFile">Vacancies picture</label>
  <div class="form-group">
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile">
    <div class="alert-danger">{{ $errors->first('image') }}</div>
  </div>
  <div class="form-check">
    <input type="checkbox" name="active" checked="" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Active</label>
  </div>
  <button type="submit" class="btn btn-primary">Add Vacancies</button>
</form>
<hr>
@if(\Session::has('alert'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{Session::get('alert')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif 
<h1>Vacancy List</h1>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($vacan as $v)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $v->title }}</td>
      <td>{{ $v->desc }}</td>
      <td><img width="150px" heigth="100px" src="{{ url(env('CDN_URL').'/file_vacancy/'.$v->image) }}"></td>
      <td>
        <a href="{{ url('/delete/vacancies/'.$v->idvacancies) }}"><i class="fa fa-trash"></i></a>
        <a href="{{ url('/edit/vacancies/'.$v->idvacancies) }}"><i class="fa fa-edit"></i></a> 
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection