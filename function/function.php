<?php

$conn = mysqli_connect("localhost","root","","project");
//getting the user ip address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
}
//creating the cart
function cart(){
    global $conn;
    if(isset($_GET['add_cart'])){
        $ip = getIp();
        $pro_id = $_GET['add_cart'];
        $check_pro = "SELECT * FROM cart where ip_address='$ip' and product_id='$pro_id' ";
        $run_check = mysqli_query($conn,$check_pro);
        if(mysqli_num_rows($run_check)>0){
            echo "";
        }
        else{
            $insert_pro = "insert into cart(product_id,ip_address) values ('$pro_id','$ip')";
            $run_pro = mysqli_query($conn, $insert_pro);
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}
//getting the total added items
function total_items(){
    global $conn;
    if(isset($_GET['add_cart'])){
        $ip = getIp();
        $get_items = "SELECT * FROM cart where ip_address='$ip'";
        $run_items = mysqli_query($conn,$get_items);
        $count_items = mysqli_num_rows($run_items);
    }
    else{
        $ip = getIp();
        $get_items = "SELECT * FROM cart where ip_address='$ip'";
        $run_items = mysqli_query($conn,$get_items);
        $count_items = mysqli_num_rows($run_items);
    }
    echo $count_items;
}
//getting the total price
/*function total_price(){
    global $conn;
    $total_price=0;
    $ip = getIp();
    $sel_price = "SELECT * FROM cart where ip_address='$ip'";
    $run_price = mysqli_query($conn,$sel_price);
    while($p_price=mysqli_fetch_array($run_price)){
        $pro_id = $p_price['product_id'];
        $pro_price = "SELECT * FROM `men_product` where product_id='$pro_id'";
        $run_pro_price = mysqli_query($conn,$pro_price);
        while($pp_price=mysqli_fetch_array($run_pro_price)){
            $product_price = array($pp_price['product_price']);
            $values=array_sum($product_price);
            $total_price +=$values;
        }
    }
    echo $total_price;
}*/
function getpro(){
    global $conn;
    $get_pro = "SELECT * FROM product where product_for = 'Men' order by RAND() LIMIT 0,6";
    $run_pro = mysqli_query($conn,$get_pro);
     while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id= $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_image = $row_pro['product_image'];
        $pro_price = $row_pro['product_price'];
        echo "
            <div id='single_product'>
                <img src='admin_area/product_images/$pro_image' width='180' height='180'/>
                <p style='text-align:center'><b>৳$pro_price</b></p>
                <a href='details.php?pro_id=$pro_id' class='details-btn' style='float:left'>Details</a>   
                <a href='index.php?add_cart=$pro_id'><button class='add-btn' style='float:right'>Add to cart</button></a>
            </div>
        ";
    }
}
function getpro1(){
    global $conn;
    $get_pro = "SELECT * FROM product where product_for = 'Women' order by RAND() LIMIT 0,6";
    $run_pro = mysqli_query($conn,$get_pro);
    while($row_pro = mysqli_fetch_array($run_pro)){
        $pro_id= $row_pro['product_id'];
        $pro_title = $row_pro['product_title'];
        $pro_image = $row_pro['product_image'];
        $pro_price = $row_pro['product_price'];
        echo "
            <div id='single_product'>
                <img src='admin_area/product_images/$pro_image' width='180' height='180'/>
                <p style='text-align:center'><b>৳$pro_price</b></p>
                <a href='details.php?pro_id=$pro_id' class='details-btn' style='float:left'>Details</a>
                <a href='index.php?add_cart=$pro_id'><button class='add-btn' style='float:right'>Add to cart</button></a>
            </div>
        ";
    }
}
function showimg(){
    global $conn;
    if(isset($_GET['pro_id'])){
        $product_id = $_GET['pro_id'];
        $get_pro = "select * from product where product_id='$product_id'";
        $run_pro = mysqli_query($conn, $get_pro); 
        while($row_pro=mysqli_fetch_array($run_pro)){
            $pro_id = $row_pro['product_id'];
            $pro_image = $row_pro['product_image'];
            echo "
                <img src='admin_area/product_images/$pro_image' width='250' height='250' />
            ";
        }
    }
}

function show_description(){
    global $conn;
    if(isset($_GET['pro_id'])){
        $product_id = $_GET['pro_id'];
        $get_pro = "select * from product where product_id='$product_id'";
        $run_pro = mysqli_query($conn, $get_pro); 
        while($row_pro=mysqli_fetch_array($run_pro)){
            $pro_id = $row_pro['product_id'];
		    $pro_title = $row_pro['product_title'];
		    $pro_price = $row_pro['product_price'];
		    $pro_desc = $row_pro['product_description'];
            echo"
                <h3>$pro_title</h3>
				<p style='font-size:18px;font-weight:bold;color:#000;'><b>৳ $pro_price </b></p>
				<a href='index.php?add_cart=$pro_id'><button class='buy-btn' style=''>Buy Now</button></a>
            ";
        }
    }
}

function show_description_text(){
    global $conn;
    if(isset($_GET['pro_id'])){
        $product_id = $_GET['pro_id'];
        $get_pro = "select * from product where product_id='$product_id'";
        $run_pro = mysqli_query($conn, $get_pro); 
        while($row_pro=mysqli_fetch_array($run_pro)){
            $pro_id = $row_pro['product_id'];
		    
		    $pro_desc = $row_pro['product_description'];
            echo"
				<p>$pro_desc </p>	
            ";
        }
    }
}
//-----------------getting the categories--------------------//

function getCatsMen(){
	global $conn; 
	$get_cats = "select * from category";
	$run_cats = mysqli_query($conn, $get_cats);
	while ($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['category_id']; 
		$cat_title = $row_cats['category_title'];
	    echo "<li><a href='men.php?cat=$cat_title'>$cat_title</a></li>";
	}
}

function getCatsWomen(){
	global $conn; 
	$get_cats = "select * from category";
	$run_cats = mysqli_query($conn, $get_cats);
	while ($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['category_id']; 
		$cat_title = $row_cats['category_title'];
	    echo "<li><a href='women.php?cat=$cat_title'>$cat_title</a></li>";
	}
}

function getCatsResult(){
	global $conn; 
	$get_cats = "select * from category";
	$run_cats = mysqli_query($conn, $get_cats);
	while ($row_cats=mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['category_id']; 
		$cat_title = $row_cats['category_title'];
	    echo "<li><a href='results.php?cat=$cat_title'>$cat_title</a></li>";
	}
}

//-----------------getting the brands---------------------//

function getBrandsMen(){
	global $conn; 
	$get_brands = "select * from brand";
	$run_brands = mysqli_query($conn, $get_brands);
	while ($row_brands=mysqli_fetch_array($run_brands)){
		$brand_id = $row_brands['brand_id']; 
		$brand_title = $row_brands['brand_title'];
	    echo "<li><a href='men.php?brand=$brand_title'>$brand_title</a></li>";
	}
}

function getBrandsWomen(){
	global $conn; 
	$get_brands = "select * from brand";
	$run_brands = mysqli_query($conn, $get_brands);
	while ($row_brands=mysqli_fetch_array($run_brands)){
		$brand_id = $row_brands['brand_id']; 
		$brand_title = $row_brands['brand_title'];
	    echo "<li><a href='women.php?brand=$brand_title'>$brand_title</a></li>";
	}
}

function getBrandsResult(){
	global $conn; 
	$get_brands = "select * from brand";
	$run_brands = mysqli_query($conn, $get_brands);
	while ($row_brands=mysqli_fetch_array($run_brands)){
		$brand_id = $row_brands['brand_id']; 
		$brand_title = $row_brands['brand_title'];
	    echo "<li><a href='results.php?brand=$brand_title'>$brand_title</a></li>";
	}
}

//-----------getting the product---------//

function getProductMen(){
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){   
            global $conn; 
	        $get_pro = "select * from product where product_for= 'Men' order by RAND()";
            $run_pro = mysqli_query($conn, $get_pro); 
	        while($row_pro=mysqli_fetch_array($run_pro)){  
                $pro_id = $row_pro['product_id'];
                $pro_cat = $row_pro['product_category'];
                $pro_brand = $row_pro['product_brand'];
                $pro_title = $row_pro['product_title'];
                $pro_price = $row_pro['product_price'];
                $pro_image = $row_pro['product_image'];
	            echo"
				    <div id='single_product_men'>
                        <img src='admin_area/product_images/$pro_image' width='180' height='180' />
                        <p><b>৳$pro_price</b></p>	
                        <a href='details.php?pro_id=$pro_id' class='details-btn' style='float:left;'>Details</a>
                        <a href='index.php?add_cart=$pro_id'><button class='add-btn' style='float:right'>Add to Cart</button></a>
				    </div>
		       ";
	        }
	   }
    }
}

function getProductWomen(){
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){   
            global $conn; 
	        $get_pro = "select * from product where product_for= 'Women' order by RAND()";
            $run_pro = mysqli_query($conn, $get_pro); 
	        while($row_pro=mysqli_fetch_array($run_pro)){  
                $pro_id = $row_pro['product_id'];
                $pro_cat = $row_pro['product_category'];
                $pro_brand = $row_pro['product_brand'];
                $pro_title = $row_pro['product_title'];
                $pro_price = $row_pro['product_price'];
                $pro_image = $row_pro['product_image'];
	            echo"
				    <div id='single_product_men'>
                        <img src='admin_area/product_images/$pro_image' width='180' height='180' />
                        <p><b>৳$pro_price</b></p>	
                        <a href='details.php?pro_id=$pro_id' class='details-btn' style='float:left;'>Details</a>
                        <a href='index.php?add_cart=$pro_id'><button class='add-btn' style='float:right'>Add to Cart</button></a>
				    </div>
		       ";
	        }
	   }
    }
}

function getProductResult(){
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
            global $conn; 
            $get_pro = "select * from product order by RAND()";
            $run_pro = mysqli_query($conn, $get_pro); 
            while($row_pro=mysqli_fetch_array($run_pro)){
                $pro_id = $row_pro['product_id'];
                $pro_cat = $row_pro['product_category'];
                $pro_brand = $row_pro['product_brand'];
                $pro_title = $row_pro['product_title'];
                $pro_price = $row_pro['product_price'];
                $pro_image = $row_pro['product_image'];
                echo"
                    <div id='single_product_women'>		
                        <img src='admin_area/product_images/$pro_image' width='180' height='180' />				
                        <p><b>৳$pro_price </b></p>					
                        <a href='details.php?pro_id=$pro_id' class='details-btn' style='float:left;'>Details</a	
                        <a href='index.php?add_cart=$pro_id'><button class='add-btn' style='float:right'>Add to Cart</button></a>
                    </div>		
                ";
	
	       }
	   }
    }
}

//-----------getting the product by categories---------//
function getCatProMen(){
	if(isset($_GET['cat'])){
		$cat_title = $_GET['cat'];
        global $conn; 
        $get_cat_pro = "select * from product where product_category='$cat_title' and product_for= 'Men' order by RAND()";
        $run_cat_pro = mysqli_query($conn, $get_cat_pro); 
        $count_cats = mysqli_num_rows($run_cat_pro);
        if($count_cats==0){
            echo "<h2 style='padding:20px;'>Sorry! the requested category product is not available</h2>";
        }
        while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
            $pro_id = $row_cat_pro['product_id'];
            $pro_cat = $row_cat_pro['product_category'];
            $pro_brand = $row_cat_pro['product_brand'];
            $pro_title = $row_cat_pro['product_title'];
            $pro_price = $row_cat_pro['product_price'];
            $pro_image = $row_cat_pro['product_image'];
            echo "
                    <div id='single_product_men'>
                        <img src='admin_area/product_images/$pro_image' width='180' height='180' />
                        <p><b>৳$pro_price</b></p>
                        <a href='details.php?pro_id=$pro_id' class='details-btn' style='float:left;'>Details</a>
                        <a href='index.php?add_cart=$pro_id'><button class='add-btn' style='float:right'>Add to Cart</button></a>
                    </div>
            ";
        }
    }
}

function getCatProWomen(){
	if(isset($_GET['cat'])){
		$cat_title = $_GET['cat'];
        global $conn; 
        $get_cat_pro = "select * from product where product_category='$cat_title' and product_for= 'Women' order by RAND()";
        $run_cat_pro = mysqli_query($conn, $get_cat_pro); 
        $count_cats = mysqli_num_rows($run_cat_pro);
        if($count_cats==0){
            echo "<h2 style='padding:20px;'>Sorry! the requested category product is not available</h2>";
        }
        while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
            $pro_id = $row_cat_pro['product_id'];
            $pro_cat = $row_cat_pro['product_category'];
            $pro_brand = $row_cat_pro['product_brand'];
            $pro_title = $row_cat_pro['product_title'];
            $pro_price = $row_cat_pro['product_price'];
            $pro_image = $row_cat_pro['product_image'];
            echo"
                <div id='single_product_women'>			
                    <img src='admin_area/product_images/$pro_image' width='180' height='180' />			
                    <p><b>৳$pro_price </b></p>
                    <a href='details.php?pro_id=$pro_id' class='details-btn' style='float:left;'>Details</a>	
                    <a href='index.php?add_cart=$pro_id'><button class='add-btn' style='float:right'>Add to Cart</button></a>
                </div>
            ";
        }
    }
}
function getCatProResult(){
	if(isset($_GET['cat'])){
		$cat_title = $_GET['cat'];
        global $conn; 
        $get_cat_pro = "select * from product where product_category='$cat_title' order by RAND()";
        $run_cat_pro = mysqli_query($conn, $get_cat_pro); 
        $count_cats = mysqli_num_rows($run_cat_pro);
        if($count_cats==0){
            echo "<h2 style='padding:20px;'>Sorry! the requested category product is not available</h2>";
        }
        while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
            $pro_id = $row_cat_pro['product_id'];
            $pro_cat = $row_cat_pro['product_category'];
            $pro_brand = $row_cat_pro['product_brand'];
            $pro_title = $row_cat_pro['product_title'];
            $pro_price = $row_cat_pro['product_price'];
            $pro_image = $row_cat_pro['product_image'];
            echo"
                <div id='single_product_women'>			
                    <img src='admin_area/product_images/$pro_image' width='180' height='180' />			
                    <p><b>৳$pro_price </b></p>
                    <a href='details.php?pro_id=$pro_id' class='details-btn' style='float:left;'>Details</a>	
                    <a href='index.php?add_cart=$pro_id'><button class='add-btn' style='float:right'>Add to Cart</button></a>
                </div>
            ";
        }
    }
}
//-----------getting the product by brand---------//
function getBrandProMen(){
	if(isset($_GET['brand'])){
		$brand_title = $_GET['brand'];
        global $conn; 
        $get_brand_pro = "select * from product where product_brand='$brand_title' and product_for= 'Men' order by RAND()";
        $run_brand_pro = mysqli_query($conn,$get_brand_pro); 
        $count_brands = mysqli_num_rows($run_brand_pro);
        if($count_brands==0){
            echo "<h2 style='padding:20px;'>Sorry! the requested brand product is not available</h2>";
        }
        while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
            $pro_id = $row_brand_pro['product_id'];
            $pro_cat = $row_brand_pro['product_category'];
            $pro_brand = $row_brand_pro['product_brand'];
            $pro_title = $row_brand_pro['product_title'];
            $pro_price = $row_brand_pro['product_price'];
            $pro_image = $row_brand_pro['product_image'];
            echo"
                <div id='single_product_men'>			
                    <img src='admin_area/product_images/$pro_image' width='180' height='180' />		
                    <p><b>৳$pro_price</b></p>	
                    <a href='details.php?pro_id=$pro_id' class='details-btn' style='float:left;'>Details</a>	
                    <a href='index.php?add_cart=$pro_id'><button class='add-btn' style='float:right'>Add to Cart</button></a>
                </div>
            ";
        }
    }
}

function getBrandProWomen(){
	if(isset($_GET['brand'])){
		$brand_title = $_GET['brand'];
        global $conn; 
        $get_brand_pro = "select * from product where product_brand='$brand_title' and product_for= 'Women' order by RAND() ";
        $run_brand_pro = mysqli_query($conn,$get_brand_pro); 
        $count_brands = mysqli_num_rows($run_brand_pro);
        if($count_brands==0){
           echo "<h2 style='padding:20px;'>Sorry! the requested brand product is not available</h2>";
        }
        while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
            $pro_id = $row_brand_pro['product_id'];
            $pro_cat = $row_brand_pro['product_category'];
            $pro_brand = $row_brand_pro['product_brand'];
            $pro_title = $row_brand_pro['product_title'];
            $pro_price = $row_brand_pro['product_price'];
            $pro_image = $row_brand_pro['product_image'];
            echo"
                <div id='single_product_women'>	
                    <img src='admin_area/product_images/$pro_image' width='180' height='180' />	
                    <p><b>৳$pro_price </b></p>
                    <a href='details.php?pro_id=$pro_id' class='details-btn' style='float:left;'>Details</a>
                    <a href='index.php?add_cart=$pro_id'><button class='add-btn' style='float:right'>Add to Cart</button></a>
                </div>
            ";
        }
    }
}

function getBrandProResult(){
	if(isset($_GET['brand'])){
		$brand_title = $_GET['brand'];
        global $conn; 
        $get_brand_pro = "select * from product where product_brand='$brand_title' order by RAND() ";
        $run_brand_pro = mysqli_query($conn,$get_brand_pro); 
        $count_brands = mysqli_num_rows($run_brand_pro);
        if($count_brands==0){
           echo "<h2 style='padding:20px;'>Sorry! the requested brand product is not available</h2>";
        }
        while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
            $pro_id = $row_brand_pro['product_id'];
            $pro_cat = $row_brand_pro['product_category'];
            $pro_brand = $row_brand_pro['product_brand'];
            $pro_title = $row_brand_pro['product_title'];
            $pro_price = $row_brand_pro['product_price'];
            $pro_image = $row_brand_pro['product_image'];
            echo"
                <div id='single_product_women'>	
                    <img src='admin_area/product_images/$pro_image' width='180' height='180' />	
                    <p><b>৳$pro_price </b></p>
                    <a href='details.php?pro_id=$pro_id' class='details-btn' style='float:left;'>Details</a>
                    <a href='index.php?add_cart=$pro_id'><button class='add-btn' style='float:right'>Add to Cart</button></a>
                </div>
            ";
        }
    }
}

?>