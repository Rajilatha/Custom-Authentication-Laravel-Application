<!DOCTYPE html>
<html>
<head>
<title>Profile </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--Bootsrap 4 CDN-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('style.css')}}">
</head>
<body>
<div class="container">
<div class="row" style="margin-top:45px">
<div class="col-md-8 col-lg-6">
<h4>Profile</h4>
<br>
<table class="table table border">
<thead>
<th>Name</th>
<th>Email</th>
<th></th>
</thead>
<tbody>

<tr>
<td>{{ $LoggedUserInfo->name }}</td>
<td>{{ $LoggedUserInfo->email }}</td>
<th><a href="logout">Logout</a></th>
</tr>

</tbody>
</table>
</div>
</div>
</div>
</body>
</html>