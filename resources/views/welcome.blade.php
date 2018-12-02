@extends('layouts.app')

@section('links')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection

@section('content')
    <div class="jumbotron well-lg">
        <h2><a href="{{ url('/') }}">Teacher Module Management System</a></h2>
        <div class="more_links">
            <li><a href="{{ url('lecturer_details') }}">View Lecturer's Detail</a></li>
        </div><!--/.more_links-->
    </div><!--/.jumbotron-->
    <div class="col-md-4 col-md-offset-4 add_form">
        <h4>Lecturer Adding Form</h4>
        <div class="container">
            <div class="row">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

        </div>
        <form method="POST" action="{{ url('Lecturer') }}" role="form">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="lecturer">Lecturer's Name :</label>
                <input class="form-control" id="lecturer" placeholder="Enter lecturer's Full name here" name="lecturer_name" type="text" required>
                @if($errors->has('lecturer_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lecturer_name') }}</strong>
                    </span>
                @endif
            </div><!--form-group-->
            <div class="form-group">
                <label for="gender">Gender :</label> <br/>
                <label for="" class="radio-inline"><input type="radio" name="gender" value="male" required> Male</label>
                <label for="" class="radio-inline"><input type="radio" name="gender" value="female"> Female</label></label>
                <label for="" class="radio-inline"><input type="radio" name="gender" value="Other"> Other</label></label>
                @if($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
            </div><!--/.form-group-->
            <div class="form-group">
                <label for="phone">Phone number :</label>
                <input class="form-control" id="phone" placeholder="Enter Phone number" name="phone" type="text" required>
                @if($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div><!--/.form-group-->
            <div class="form-group">
                <label for="email">Email id :</label>
                <input class="form-control" id="email" placeholder="Enter Email id" name="email" type="email" required>
                @if($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div><!--/.form-group-->
            <div class="form-group">
                <label for="address">Address :</label>
                <input class="form-control" id="address" placeholder="Enter Address" name="address" type="text" required>
                @if($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div><!--/.form-group-->
            <div class="form-group">
                <label for="nationality">Nationality :</label>
                <input class="form-control" id="nationality" placeholder="Enter Nationality" name="nationality" type="text" required>
                @if($errors->has('nationality'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nationality') }}</strong>
                    </span>
                @endif
            </div><!--/.form-group-->
            <div class="form-group">
                <label for="dob">Date of Birth :</label><br/>
                <input class="form-control" id="dob" name="dob" type="date" required>
                @if($errors->has('dob'))
                    <span class="help-block">
                        <strong>{{ $errors->first('dob') }}</strong>
                    </span>
                @endif
            </div><!--/.form-group-->
            <div class="form-group">
                <label for="faculty">Faculty :</label>
                <select class="form-control" name="faculty" id="faculty">
                    <option value="" selected>- Select a faculty -</option>
                    @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('faculty'))
                    <span class="help-block">
                        <strong>{{ $errors->first('faculty') }}</strong>
                    </span>
                @endif
            </div><!--/.form-group-->
            <div class="form-group">
                <label for="modules">Modules :</label>
                <select class="form-control" name="modules[]" id="modules" multiple="multiple">

                </select>
                @if($errors->has('modules'))
                    <span class="help-block">
                        <strong>{{ $errors->first('modules') }}</strong>
                    </span>
                @endif
            </div><!--/.form-group-->
            <button type="submit" class="btn btn-primary cus_btn">Submit</button>
        </form>
    </div><!--/.add_form-->
    <script type="text/javascript">
        $("#modules").select2();
    </script>
    
@endsection
