<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register User</h2>
  <form action="{{url('register')}}" method="post" >
    {{csrf_field()}}
    <div class="form-group">
        <label for="">Name</label>
        <input type="name" name="name" class="form-control" placeholder="Enter name">
      </div>
      <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" name="email" class="form-control" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="number" name="phone" class="form-control"  placeholder="Enter phone number">
        </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control"  placeholder="Password">
      </div>

      <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div>

</body>
</html>
