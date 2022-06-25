<!DOCTYPE html>
<html lang="en">
<head>
  <title>All Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
      .head::after{
          content: "";
          clear:both;
          display: block;
      }
  </style>
</head>
<body>

<div class="container mt-3">
    <div class="head">
        <h2 style="float: left;">Create User</h2>
        <a href="{{url ('/create')}}" class="btn btn-primary" style="float: right;">Add New</a>
    </div>
    <div>
        <div class="form-create">
        <!-- @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
            <form action="{{url('/store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">name</label>
                    <input class="form-control" type="text" name="name" value="{{old('name')}}">
                    @error('name')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="{{old('email')}}">
                    @error('email')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input class="form-control" type="password" name="password" value="{{old('password')}}">
                    @error('password')
                        <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
