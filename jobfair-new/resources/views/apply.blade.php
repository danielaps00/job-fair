@extends('home') 
@section('content')
<div class="container">
  <div class="row" style="margin-top:20px;">
      <div class="col-lg-8 mb-4">
        @foreach($vacan as $v)
          <h3>Apply for {{$v->title}}</h3>
        @endforeach
        <form action="{{url('/add/applicant')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          @foreach($vacan as $v)
            <input type="hidden" name="idvacancies" value="{{$v->idvacancies}}">
          @endforeach 
          <div class="control-group form-group">
            <div class="controls">
              <label>Your Name:</label>
              <input type="text" class="form-control" name="name" placeholder="Please enter your name.">
              <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('name') }}</div>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>KTP :</label>
              <input type="text" class="form-control" name="ktp" placeholder="Please enter your ktp number.">
              <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('text') }}</div>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Birth Place:</label>
              <input type="text" class="form-control" name="birth_place" placeholder="Please enter your birth place.">
              <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('birth_place') }}</div>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Birth Date :</label>
              <input type="date" class="form-control" name="birth_date" placeholder="Please enter your bitrh date.">
              <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('birth_date') }}</div>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" name="email" placeholder="Please enter your email address.">
              <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('email') }}</div>
            </div>
          </div>
          <div class="row">
              <div class="col-lg-6">
                <div class="control-group form-group">
                  <div class="controls">
                    <label>Phone Number 1:</label>
                    <input type="text" class="form-control" name="phone1" placeholder="Please enter your first phone number.">
                    <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('phone1') }}</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="control-group form-group">
                  <div class="controls">
                    <label>Phone Number 2:</label>
                    <input type="text" class="form-control" name="phone2" placeholder="Please enter your second phone number.">
                    <div class="alert-danger" style="margin-top:4px;">{{ $errors->first('phone2') }}</div>
                  </div>
                </div>
              </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Address :</label>
              <textarea class="form-control" name="address" rows="3" id="comment"></textarea>
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
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
          <a href="{{ url('/') }}" class="btn btn-info" style="margin-left:80px; margin-top:-65px;">Cancel</a>
      </div>
      <div class="col-lg-4 mb-4">
        @foreach($vacan as $v)
          <img src="{{url(env('CDN_URL').'/file_vacancy/'.$v->image)}}" class="img-fluid rounded">
        @endforeach
      </div>
    </div>
</div>
<!-- /.row -->
@endsection