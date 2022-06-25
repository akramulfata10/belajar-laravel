<!DOCTYPE html>
<html lang="en">
<head>
  <title>All Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
  img, svg {
    width: 20px;
  }
</style>
<style>
      .head::after{
          content: "";
          clear:both;
          display: block;
      }
</style>
<body>

<div class="container mt-3">
  <div class="head">
    <h2 style="float: left;">All Users</h2>
    <a href="{{url ('/create')}}" class="btn btn-primary" style="float: right;">Add New</a>
  </div>
  <div class="form-search">
    <form action="{{url ('/search')}}" style="display: flex;" method="GET">
      <input type="text" name="search" class="form-control" placeholder="search here....">
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
  </div>
  @if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
  @endif
  <table class="table">
    <thead>
      <tr>
        <th>No </th>
        <th>Name </th>
        <th>Email </th>
        <th>Action </th>
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
            <a href="{{url('/edit', $user->id)}}" class="btn btn-warning">Edit</a>
            <a href="{{url('/delete', $user->id)}}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
  {{$users->render()}}
</div>

</body>
</html>
