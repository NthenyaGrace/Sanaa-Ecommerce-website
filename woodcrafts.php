<?php
include 'database/functions.php';
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sanaa Art Shop |Wood Crafts</title>
    <link rel="icon" href="img/favicon.jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php"> <img src="img/S.logo.png" style="height: 70px" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"  id="navbarDropdown_1"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Product
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="paintings.php"> Paintings</a>
                                    <a class="dropdown-item" href="ceramics.php"> Ceramics</a>
                                    <a class="dropdown-item" href="sculptures.php"> Sculptures</a>
                                    <a class="dropdown-item" href="woodcrafts.php"> Wood Crafts</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex align-items-center">
                        <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                        <a href="cart.php">
                            <i class="flaticon-shopping-cart-black-shape"></i>
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- Header part end-->
<!-- breadcrumb part start-->
<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Wood Crafts</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb part end-->

<?php 
 
require_once 'database/functions.php'; 
 

include_once 'cart.class.php'; 
$cart = new Cart; 
 
// Fetch products from the database 
$sqlQ = "SELECT * FROM gallery where Cat_ID=(4)"; 
$con = new mysqli("localhost", "root", "", "sanaa");
$stmt = $con-> prepare ($sqlQ); 
$stmt->execute(); 
$result = $stmt->get_result(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Product List</title>
<meta charset="utf-8">

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom style -->
<link href="css/style.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <h1>PRODUCTS</h1>
    
    
    <!-- Product list -->
 <?php 
 $connect=mysqli_connect("localhost","root", "","sanaa");
 
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){ 

            ?>
    <div class="col-md-4">
        <form method="post" action="product_list.php?action=add&Item_ID= <?php echo $row["Item_ID"];?>">
            <div style="border:1px solid:#333; background-color: #f1f1f1; border-radius: 5px; padding-top: 16px" align="center">
                <h4 class="text-info"><?php echo $row["name"];?></h4>
                <h4 class="text-danger"> $ <?php echo $row["price"];?></h4>
                <input type="text" name="quantity" class= "form-control" value="1"><?php echo $row["name"];?></h4>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']);?>"/
                <input type="hidden" name="hidden_name" value="<?php echo $row["name"];?>"/>
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>"/>
            </div>
        </form>

        </div>
     
    
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Price: <?php echo $row["price"]; ?></h6>
                <a href="cart.php?action=addToCart&Item_ID=<?php echo $row["Item_ID"]; ?>" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
    <?php } }else{ ?>
        <p>Product(s) not found.....</p>
    <?php } ?>
    </div>
</div>
</body>
</html> 



<!--::footer_part start::-->
<footer class="footer_part">
    <div class="footer_iner">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-8">
                    <div class="footer_menu">
                        <div class="footer_logo">
                            <a href="index.php"><img src="img/S.logo.png" style="height: 70px" alt="#"></a>
                        </div>
                        <div class="footer_menu_item">
                            <a href="index.php">Home</a>
                            <a href="about.php">About</a>
                            <a href="product_list.php">Products</a>
                            <a href="contact.php">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="social_icon">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--::footer_part end::-->
<!-- jquery plugins here-->
<script src="js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- easing js -->
<script src="js/jquery.magnific-popup.js"></script>
<!-- swiper js -->
<script src="js/swiper.min.js"></script>
<!-- swiper js -->
<script src="js/mixitup.min.js"></script>
<!-- particles js -->
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<!-- slick js -->
<script src="js/slick.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/contact.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
</body>

</html>