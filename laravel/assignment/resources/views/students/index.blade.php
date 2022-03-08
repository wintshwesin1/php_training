@extends('layouts.app')
@section('content')
  <div class="row">
    
    <div class="col-xs-8 col-sm-8 col-md-8">
      <div class="form-group">
        <a class="btn btn-success" href="{{ route('student.create') }}"> Create Student</a>
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

  
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <span>{{ $message }}</span>
    </div>
    @endif
    <table class="table table-bordered">
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
        @if(count ( $students ) > 0)
          @foreach ($students as $student)
          <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $student->name }}</td>
              <td>{{ $student->majorname }}</td>
              <td>{{ $student->email }}</td>
              <td>{{ $student->phone }}</td>
              <td>{{ $student->address }}</td>
              <td>
                <form action="{{ route('student.destroy',$student->id) }}" method="POST">
                
                  <a class="btn btn-primary" href="{{ route('student.edit',$student->id) }}">Edit</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Do you really want to delete student!')" class="btn btn-danger">Delete</button>
                </form>
              </td>
          </tr>
          @endforeach
        @else
          <tr> 
            <td class="msgborder">No Data found!</td>
          </tr>
			  @endif
      </tbody>
    </table>
    @if(isset($students))
      {!! $students->links() !!}
    @endif
@endsection