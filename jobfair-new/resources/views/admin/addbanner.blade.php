@extends('admin.dashboard')

@section('judul', 'Banner')

@section('isi')
<h1>Input Banner</h1>
<form action="{{ url('/add/banner') }}" method="post" enctype="multipart/form-data"> 
  {{ csrf_field() }}
  <div class="form-group">
    <label>Banner Title</label>
    <input type="text" name="title" class="form-control" placeholder="Banner Title">
    <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('title') }}</div>
  </div>
  <div class="form-group">
    <label>Banner Image</label>
    <input type="file" name="image" class="form-control-file">
    <div class="alert-danger">{{ $errors->first('image') }}</div>
  </div>
  <button type="submit" class="btn btn-primary">Add Banner</button>
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
<h1>Banner List</h1>
<table class="table table-bordered"> 
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">Gambar</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($bann as $b)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $b->title }}</td>
      <td><img width="150px" heigth="100px" src="{{ url(env('CDN_URL').'/file_banner/'.$b->image) }}"></td>
      <td>
        <a href="{{ url('/delete/banner/'.$b->idbanners) }}"><i class="fa fa-trash"></i></a>
        <a href="{{ url('/edit/banner/'.$b->idbanners) }}"><i class="fa fa-edit"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection