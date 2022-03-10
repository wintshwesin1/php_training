@extends('layouts.app')
@section('content')
<div class="panel panel-success">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="panel-heading">
              @if (request()->has('id'))
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
    <form>
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ request()->has('name') ? request()->get('name') : '' }}">
          </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
          <label for="major">Major:</label>
          <select class="form-control" name="major" id="major">
              @foreach($majors as $major)
                <option value="{{ $major->id }}" {{ request()->has('major_id') ? ( $major->id == request()->get('major_id') ? 'selected' : '' ) : '' }}>{{ $major->name }}</option>
              @endforeach
          </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="{{ request()->has('phone') ? request()->get('phone') : '' }}">
          </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ request()->has('email') ? request()->get('email') : '' }}">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="Address" value="{{ request()->has('address') && request()->get('address') != 'null' ? request()->get('address') : '' }}">
          </div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        @if (request()->has('id'))
            <button type="submit" class="btn btn-success" id="updateStudent" data-id="{{ request()->get('id') }}">Update</button>
          @else
            <button type="submit" class="btn btn-success" id="createStudent">Submit</button>
        @endif
        
        <a class="btn btn-primary" href="{{ route('ajax.students') }}"> Cancel </a>
      </div>
    </form>
</div>
@endsection
@section('scripts')
  <script src="{{ asset('asset/js/student.js') }}"></script>
@endsection