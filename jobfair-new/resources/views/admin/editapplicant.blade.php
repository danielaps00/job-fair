@extends('admin.dashboard')

@section('judul', 'edit applicant')

@section('isi')
    <div class="row"> 
      <div class="col-lg-8 mb-4">
        <h3>Edit Applicant</h3>
        @foreach($app as $a)
        <form action="{{ url('/update/applicant/'.$a->idapplicants) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" value="{{ $a->idapplicants }}">
          <div class="control-group form-group">
            <div class="controls">
              <label>Your Name:</label>
              <input type="text" class="form-control" name="name" value="{{$a->name}}">
              <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('name') }}</div>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>KTP :</label>
              <input type="text" class="form-control" name="ktp" value="{{$a->ktp}}">
              <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('ktp') }}</div>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Birth Place:</label>
              <input type="text" class="form-control" name="birth_place" value="{{$a->birth_place}}">
              <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('birth_place') }}</div>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Birth Date :</label>
              <input type="date" class="form-control" name="birth_date">
              <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('birth_date') }}</div>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" name="email" value="{{$a->email}}">
              <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('email') }}</div>
            </div>
          </div>
          <div class="row">
              <div class="col-lg-6">
                <div class="control-group form-group">
                  <div class="controls">
                    <label>Phone Number 1:</label>
                    <input type="text" class="form-control" name="phone1" value="{{$a->phone1}}">
                    <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('phone1') }}</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="control-group form-group">
                  <div class="controls">
                    <label>Phone Number 2:</label>
                    <input type="text" class="form-control" name="phone2" value="{{$a->phone2}}">
                    <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('phone2') }}</div>
                  </div>
                </div>
              </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Address :</label>
              <textarea class="form-control" name="address" rows="3" id="comment">{{$a->address}}</textarea>
              <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('address') }}</div>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Your Photo :</label>
              <input type="file" name="photo" class="form-control-file">
              <div class="alert-danger">{{ $errors->first('photo') }}</div>
            </div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-success">Update Applicant</button>
        </form>
        @endforeach
        <a class="btn btn-info" href="{{ url('/applicant') }}" style="margin-left:160px; margin-top:-65px;">Cancel</a> 
      </div>
    </div>
@endsection