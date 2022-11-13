<?php 
 
require_once 'database/functions.php'; 
 

include_once 'cart.class.php'; 
$cart = new Cart; 
 
// Fetch products from the database 
$sqlQ = "SELECT * FROM gallery"; 
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
    
    <!-- Cart basket -->
    <div class="cart-view">
        <a href="viewCart.php" title="View Cart"><i class="icart"></i> (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':0; ?>)</a>
    </div>
    
    <!-- Product list -->
    <div class="row col-lg-12">
    <?php 
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){ 
            $proImg = !empty($row["image"])?'img/product'.$row["image"]:'images/demo-img.png'; 
    ?>
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $proImg; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Price: <?php echo $row["price"]; ?></h6>
                <a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
    <?php } }else{ ?>
        <p>Product(s) not found.....</p>
    <?php } ?>
    </div>
</div>
</body>
</html>