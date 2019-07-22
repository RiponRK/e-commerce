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
                        <p><b>$pro_price</b></p>
                        <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>                        
                        <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a>
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
                        <p><b>$pro_price</b></p>
                        <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
                        <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a>
                    </div>
                ";
            }
}
function showimg(){
    global $conn;
        if(isset($_GET['pro_id'])){
            $product_id = $_GET['pro_id'];

            $get_pro = "select * from men_product where product_id='$product_id'";

            $run_pro = mysqli_query($conn, $get_pro); 

            while($row_pro=mysqli_fetch_array($run_pro)){
                $pro_id = $row_pro['product_id'];
                $pro_image = $row_pro['product_image'];
                echo "
                    <img src='admin_area/product_images/$pro_image' width='400' height='300' />

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
                echo "
                    <h3>$pro_title</h3>
					<p><b> $ $pro_price </b></p>
					
					<p>$pro_desc </p>
					
					<a href='index.php' style='float:left;'>Go Back</a>
					
					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>

                    ";

            }
        }
}













?>