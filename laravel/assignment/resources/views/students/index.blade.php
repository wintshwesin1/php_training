@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-lg-12 margin-tb">
      <div class="pull-right">
        <a class="btn btn-success" href="{{ route('student.create') }}"> Create Student</a>
        <a class="btn btn-success" href="{{ route('file-export') }}"> Export Data</a>
        <a class="btn btn-success" href="{{ route('file-import-export') }}"> Import</a>
      </div><br>
    </div>
  </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <span>{{ $message }}</span>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Major</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->major->name }}</td>
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
    </table>
{!! $students->links() !!}
@endsection