<!DOCTYPE html>
<html>
  <head>
    <title>Laravel 8 CRUD Operation Tutorial for Beginners</title>
    <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('asset/js/library/jquery.min.js') }}"></script>
  </head>
  <style>
    .container {
      margin-top:50px;
    }

    .file-input {
      border: 1px solid #ced4da;
      border-radius: 0.25rem;
      padding: 5px;
      margin-top: 20px;
    }

    .msgborder {
      border: none !important;
      font-weight: bold;

    }
  </style>
<body>
  
<div class="container">
  @yield('content')
</div>
  @yield('scripts')
</body>
</html>