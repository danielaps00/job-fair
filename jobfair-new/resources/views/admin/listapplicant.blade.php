@extends('admin.dashboard')

@section('judul', 'Daftar Applicant')

@section('isi')
@if(\Session::has('alert'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{Session::get('alert')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<h1>Applicant List</h1>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Vacancies</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Photo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($app as $a)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $a->title }}</td>
      <td>{{ $a->name }}</td>
      <td>{{$a->email}}</td>
      <td><img width="100px" heigth="180px" src="{{ url(env('CDN_URL').'/file_applicant/'.$a->photo) }}"></td>
      <td>
        <a href="{{ url('/delete/applicant/'.$a->idapplicants) }}"><i class="fa fa-trash"></i></a> 
        <a href="{{ url('/edit/applicant/'.$a->idapplicants) }}"><i class="fa fa-edit"></i></a> 
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection