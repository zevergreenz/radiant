<!DOCTYPE html>
<html>
<?php
    session_start();
    if (isset($_GET['Message'])) {
        echo "<script type='text/javascript'>alert(".$_GET['Message'].");</script>";
    }
?>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ustora Demo</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/radiant/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/radiant/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/radiant/css/owl.carousel.css">
    <link rel="stylesheet" href="/radiant/style.css">
    <link rel="stylesheet" href="/radiant/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<h3><h3>
<div class="container">
  <div class="panel panel-primary">
      <div class="panel-heading">
        <h1>Sign up</h1>
      </div>
  </div>
  <form role="form" action="/radiant/action.php?func_name=sign_up" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" placeholder="Enter password">
    </div>
    <div class="form-group">
      <label for="email">Name:</label>
      <input type="name" class="form-control" name="name" placeholder="Enter your name">
    </div>
    <div class="form-group">
      <label for="email">Phone number:</label>
      <input type="phone" class="form-control" name="phone" placeholder="Enter your phone number">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>