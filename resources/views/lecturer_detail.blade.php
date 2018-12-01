@extends('layouts.app')

@section('links')
    <link type="text/css" rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('vendor/datatables/Responsive-2.2.2/css/responsive.bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('vendor/datatables/Responsive-2.2.2/css/responsive.dataTables.min.css') }}">
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
@endsection

@section('content')
    <div class="jumbotron well-lg">
        <h2><a href="{{ url('/') }}">Teacher Module Management System</a></h2>

        <div class="more_links">
            <li><a href="{{ url('/') }}">Home</a></li>
        </div><!--/.more_links-->
    </div><!--/.jumbotron-->
    <div class="col-md-10 col-md-offset-1 data_table">
        <h4>List of registered lecturers</h4>

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

        <div class="csv_btn text-right">
            <a href="{{ url('/generate_csv') }}" class="btn btn-default" title="generate all data into csv file">Generate .CSV</a>
        </div><!--/.csv_btn-->
        <br/>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" width="100%" id="myTable">

                <thead>
                <tr>
                    <th>S.N</th>
                    <th>Lecturer's Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Nationality</th>
                    <th>Date of Birth</th>
                    <th>Faculty</th>
                    <th>Module</th>
                    <th>Created at</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($lecturers as $lecturer)
                        <tr>
                            <td>{{ $lecturer->id }}</td>
                            <td>{{ $lecturer->name }}</td>
                            <td>{{ $lecturer->gender }}</td>
                            <td>{{ $lecturer->phone }}</td>
                            <td>{{ $lecturer->email }}</td>
                            <td>{{ $lecturer->address }}</td>
                            <td>{{ $lecturer->nationality }}</td>
                            <td>{{ $lecturer->dob }}</td>
                            <td>{{ $lecturer->faculty }}</td>
                            <td>
                                @foreach(explode('|', $lecturer->module) as $module)
                                    <span class="label label-primary">{{ $module }}</span>
                                @endforeach
                            </td>
                            <td>{{ $lecturer->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div><!--/.table-responsive-->
    </div><!--/.data_table-->
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection
