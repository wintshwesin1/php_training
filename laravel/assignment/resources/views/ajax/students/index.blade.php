@extends('layouts.app')
@section('content')
  <div class="row">
    
    <div class="col-xs-8 col-sm-8 col-md-8">
      <div class="form-group">
        <a class="btn btn-success" href="{{ route('ajax.student.create') }}"> Create Student</a>
        <a class="btn btn-success" href="{{ route('file-export') }}"> Export Data</a>
        <a class="btn btn-success" href="{{ route('file-import-export') }}"> Import</a>
      </div>
    </div>
        
    <div class="col-xs-4 col-sm-4 col-md-4">
        <form action="{{ route('search') }}" method="post">	
        @csrf
          <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8">
              <div class="form-group">
                <input type="text" name="search" class="form-control" >
              </div>
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
              <div class="form-group">
                <button type="submit" class="btn btn-success">Search</button>
              </div>
            </div>
          </div>
        </form>
    </div>
  </div>

    <table class="table table-bordered" id="studentsData">
      <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Major</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
@endsection
@section('scripts')
  <script src="{{ asset('asset/js/student.js') }}"></script>
@stop