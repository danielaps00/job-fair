@extends('admin.dashboard')

@section('judul', 'Company')

@section('isi')
<h1>Input Company</h1>
<form action="{{ url('/add/companies') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputNama">Nama Perusahaan</label>
    <input type="text" name="name" class="form-control" id="exampleInputNama"  placeholder="Nama Perusahaan">
    <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('name') }}</div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlFile">Gambar Perusahaan</label>
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile">
    <div class="alert-danger">{{ $errors->first('image') }}</div>
  </div>
  <div class="form-check">
    <input type="checkbox" name="active" checked="" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Active</label>
  </div>
  <button type="submit" class="btn btn-primary">Add Company</button>
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
<h1>Company List</h1>
<table class="table table-bordered"> 
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Perusahaan</th>
      <th scope="col">Gambar</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($compa as $c)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $c->name }}</td>
      <td><img width="150px" heigth="100px" src="{{ url(env('CDN_URL').'/file_company/'.$c->image) }}"></td>
      <td>
        <a href="{{ url('/delete/companies/'.$c->idcompanies) }}"><i class="fa fa-trash"></i></a> 
        <a href="{{ url('/edit/companies/'.$c->idcompanies) }}"><i class="fa fa-edit"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection