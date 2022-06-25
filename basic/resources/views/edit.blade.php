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
        <h2 style="float: left;">Edit User</h2>
        <a href="{{url ('/create')}}" class="btn btn-primary" style="float: right;">Add New</a>
    </div>
    <div>
        <div class="form-create">
            <form action="{{url ('/update', $user->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">name</label>
                    <input class="form-control" type="text" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" value="{{$user->email}}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
