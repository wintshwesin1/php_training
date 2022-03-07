@extends('layouts.app')
@section('content')
<div class="panel panel-success">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="panel-heading">
              @if (isset($student))
                <h2>Update Student</h2>
                @else
                <h2>Create Student</h2>
              @endif
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif
    <form action="{{ isset($student) ? route('student.update',$student->id) : route('student.store') }}" method="POST">
    @csrf
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name', isset($student) ? $student->name : '') }}">
          </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
          <label for="major">Major:</label>
          <select class="form-control" id="type" name="major">
              @foreach($majors as $major)
                <option value="{{ $major->id }}" {{ isset($student) ? ( $major->id == $student->major_id ? 'selected' : '' ) : '' }}>{{ $major->name }}</option>
              @endforeach
          </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone', isset($student) ? $student->phone : '') }}">
          </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('name', isset($student) ? $student->email : '') }}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" class="form-control" placeholder="Address" value="{{ old('address', isset($student) ? $student->address : '') }}">
          </div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-success">Submit</button>
        <a class="btn btn-primary" href="{{ route('students') }}"> Cancel </a>
      </div>
    </form>
</div>
@endsection