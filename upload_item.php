<!DOCTYPE html>
<html>
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

<div class="container">
  <h2>Share your item</h2>
  <form role="form" action="/radiant/action.php?func_name=upload_item" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="item name">Item name:</label>
      <input type="name" class="form-control" name="item_name" placeholder="Enter your item name">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <input type="description" class="form-control" name="description" placeholder="Description">
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="price" class="form-control" name="price" placeholder="Price">
    </div>
    <div class="form-group">
      <label for="price">Preferred payment method:</label><br>
      <input type="radio" name="payment" value="Cash" checked> Cash<br>
      <input type="radio" name="payment" value="Credit card"> Credit card<br>
      <input type="radio" name="payment" value="Other"> Other<br>
    </div>
    <div class="form-group">
      <label for="day">Available from:</label>
      <input type="date" class="form-control" name="start">
    </div>
    <div class="form-group">
      <label for="day">Available till:</label>
      <input type="date" class="form-control" name="end">
    </div>
    <div class="form-group">
      <label for="tag">Tag:</label>
      <input type="tag" class="form-control" name="tag" placeholder="Tags">
    </div>
    <div class="form-group">
      <input type="file" name="image" id="image">
    </div>
    <input type="submit" value="Upload Image" name="submit">
  </form>
</div>

</body>
</html>