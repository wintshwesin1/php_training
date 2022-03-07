@extends('layouts.app')
@section('content')
    <h2 class="mb-12">
      Import CSV Students Data
    </h2>
    <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group file-input">
            <input type="file" name="file">
          </div>
        </div>
      </div>
      
      <button class="btn btn-success">Import data</button>
      <a class="btn btn-primary" href="{{ route('students') }}"> Cancel </a>
    </form>
@endsection