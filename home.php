<!DOCTYPE html>
<html lang="en">
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
    <title>Lend me!</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>





  <body>

    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                        <?php
                        if (isset($_SESSION['email'])) {
                        echo'
                        <li>Hello,'.$_SESSION["email"].'
                        <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                        <li><a href="/radiant/upload_item.php"><i class="fa fa-heart"></i> Lend your items</a></li>';
                        }
                        else 
                        {echo'<li><a href="/radiant/sign_in.php"><i class="fa fa-user"></i> Login</a></li>';}
                        ?>
                            
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">SGD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">USD</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
  
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        
                            <div class="form-group">
                              <label for="search">Search:</label>
                              <input type="search" class="form-control" name="search" placeholder="Looking for something?">
                            </div>
                            <input type="submit" name="submit" value="search" href="/radiant/home.php">
                        <h2 class="section-title">Suggested Item</h2>
                        <div class="product-carousel">
                            <?php
                                $user_name = "root";
                                $pass_word = "";
                                $database = "lendme";
                                $server = "127.0.0.1";
                                $tbl_name = "items";
                                $conn = mysqli_connect($server, $user_name, $pass_word);
                                if (!$conn) {
                                    die("Connection failed: ".mysqli_connect_error());
                                } 

                                $db_select = mysqli_select_db($conn, $database);
                                if (!$db_select) {
                                    die("Database selection failed: ".mysqli_error());
                                }

                                $sql = "SELECT * FROM $tbl_name WHERE 1";
                                $result = mysqli_query($conn, $sql);
                    
                                while($row = mysqli_fetch_array($result)) {
                                    $price=$row["price"];
                                    $start=$row["start"];
                                    $end=$row["end"];
                                    $description=$row["description"];
                                    $user=$row["user"];
                                    $image=$row["image"];
                                echo '
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="/radiant/uploads/'.$image.'" alt="">
                                        <div class="product-hover">
                                            <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>S$'.$price.' </a>
                                            <a href="#" class="view-details-link"><i class="fa fa-link"></i>'.$start.'  '.$end.'</a>
                                        </div>
                                    </div>
                                    
                                    <h2><a href="single-product.html">'.$description.'</a></h2>
                                    
                                    <div class="product-carousel-price">
                                        <a>'.$user,'</a>
                                    </div> 
                                </div>';
                                }
                            ?>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->


<div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>Collaboration</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-clock-o"></i>
                        <p>Fast service</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-heart"></i>
                        <p>Satisfaction</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->

    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>Lend<span>ME</span></h2>
                        <p>Lend.ME is a free platform for students to trade and lend anything they can think of, from books and notes to musical instruments...  </p>
                        <p>Our mission is to create a friendly environment where students can help each other by sharing your not-in-used items </p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">User Navigation </h2>
                        <ul>
                            <li><a href="#">My account</a></li>
                            <li><a href="#">History</a></li>
                            <li><a href="#">Friendlist</a></li>
                            <li><a href="#">Ratings</a></li>
                            <li><a href="#">Front page</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Categories</h2>
                        <ul>
                            <li><a href="#">Books</a></li>
                            <li><a href="#">Stationaries</a></li>
                            <li><a href="#">Instrument</a></li>
                            <li><a href="#">Cookware</a></li>
                            <li><a href="#">DIY</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Newsletter</h2>
                        <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Type your email">
                                <input type="submit" value="Subscribe">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
    <script type="text/javascript" src="js/script.slider.js"></script>
    
  </body>
</html>