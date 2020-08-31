@extends('admin.dashboard')

@section('judul', 'Admin Jobfair')

@section('isi')
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{url('/cari/data')}}" method="get"  style="float:right;">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control bg-light border-1 small" placeholder="Search data by name or title" aria-label="Search" aria-describedby="basic-addon2" name="cari" value="{{old('cari')}}">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
<a href="{{url('/home_admin')}}" class="btn btn-success" style="float:right;">View All Data</a>
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
<hr>
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
<hr>
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
<hr>
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