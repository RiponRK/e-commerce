
<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include("function/function.php");
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto|Work+Sans" rel="stylesheet">  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- BX slider CSS -->

    
  </head>
  <body>
    <!------------header part---------->
    
    <header>
        <div class="topbar">
        <div class="container">
           <div class="row">
               <div class="col-md-9 col-md-offset-3">
                  <div class="top text-center">
                      <h3>get up to <span>20%</span> additional cashback with</h3>
                      <img src="image/logo.png" alt="">
                   </div>
               </div>
           </div>
        </div>
        </div>
        <div class="container">
            <div class="row head">
                <div class="col-md-2">
                    <div class="logo">
                         <!-- logo -->
                         <a href="index.php"><img src="image/logo.gif" alt=""></a>
                     </div>
                </div>
                <div class="col-md-6 col-md-offset-1 ">
                    <form action="results.php" method="get" enctype="multipart/form-data">
                        <div class="form">
                            <input type="text" name="user_search" class="input" placeholder="Search any products, brands and categories">
                            <button type="submit" name="search" class="search">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                   <div class="info">
                       <ul>
                            <li><a href="">
                            <?php
                                if(isset($_SESSION['customer_email'])){
                                    $user = $_SESSION['customer_email'];
                                    $get_name = "select * from customers where customer_email = '$user'";
                                    $run_name = mysqli_query($conn,$get_name);
                                    $row_name = mysqli_fetch_array($run_name);
                                    $c_name_f = $row_name['customer_name_first'];
                                    if(isset($user)){
                                        echo "<b>Hello,</b></br><p>$c_name_f <i class='fa fa-angle-down'></i></p>";
                                    }
                                }
                                else{
                                    echo "Your<br>Account <i class='fa fa-angle-down'></i>";
                                }
                            ?>
                            </a>
                                <div class="logmenu">
                                    <ul >
                                    <li>
                                        <?php 
                                            if(!isset($_SESSION['customer_email'])){

                                            echo "<a href='customer_login.php' style='color:#fff;' class='home_log'>Login</a>
                                            <div class='new_log'>
                                                <h5>New customer?</h5><a href='customer_register.php' style='text-decoration:underline;'>Sign up</a>
                                            </div>
                                            
                                            ";

                                            }
                                            else {
                                                echo "
                                                <a href='logout.php' style='color:#fff;' class='home_log'>Logout</a>
                                                <div class='new_log'>
                                                <a href='customer/my_account.php' style='text-decoration:underline;'>My account</a>
                                            </div>
                 
                                                
                                                ";
                                           
                                            }



                                            ?>
                                    </li>
                                </ul>
                                </div>
                            </li>
                            <li><a href="cart.php" class="cartimg"><img class="climg" src="image/shopping-cart3.png" alt=""> Cart<span class="cart_item"><?php total_items(); ?></span></a></li>
                        </ul>
                   </div>
                    <?php
                        cart();
                    ?>
                </div>
                
                
            </div>
        </div>
    </header>
    <section id="details_part">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="cart_info">
                        <form action="" method="post" enctype="multipart/form-data">
                            
                            <table class="table">
                              <thead class="thead-dark">
                                <tr class="dark">
                                  <th scope="col">Remove</th>
                                  <th scope="col">Product</th>
                                  <th scope="col">Quantity</th>
                                  <th scope="col">Total price</th>
                                </tr>
                                <?php
                                    global $conn;
                                    $total_price=0;
                                    $ip = getIp();
                                    $sel_price = "SELECT * FROM cart where ip_address='$ip'";
                                    $run_price = mysqli_query($conn,$sel_price);
                                    while($p_price=mysqli_fetch_array($run_price)){
                                        $pro_id = $p_price['product_id'];
                                        $pro_price = "SELECT * FROM product where product_id='$pro_id'";
                                        $run_pro_price = mysqli_query($conn,$pro_price);
                                        while($pp_price=mysqli_fetch_array($run_pro_price)){
                                            $product_price = array($pp_price['product_price']);
                                            $product_title = $pp_price['product_title'];
                                            $product_image = $pp_price['product_image'];
                                            $single_price = $pp_price['product_price'];
                                            $values=array_sum($product_price);
                                            $total_price +=$values;
                                            
                                ?>
                              </thead>
                              <tbody>
                                <tr>
                                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"></td>
                                    <td><?php echo $product_title;?><br>
                                    <img src="admin_area/product_images/<?php echo $product_image;?>" alt="" width="60" height="60"></td>
                                   
                                    <td><input type="text" size="4" name="qty" value=""/></td>
                                    
                                    <td><?php echo $single_price;?>TK</td>
                                </tr>
                                <?php }}?>
                                <tr>
                                    <td><input class="update-btn" type="submit" name="update_cart" value="Update Cart"></td>
                                    <td></td>
                                    <td><b>Sub Total</b></td>
                                    <td><?php echo $total_price;?>TK</td>
                                </tr>
                                <tr align="center">
                                   <td></td>
                                    <td><input type="submit" name="continue" value="Continue Shopping" class="btn btn-primary"></td>
                                    <td></td>
                                    <td></td>
                                </tr>  
                              </tbody>
                            </table>   
                        </form>
                        
                        <?php
                        function updatecart(){
                        global $conn;
                        $ip = getIp();
                            if(isset($_POST['update_cart'])){
                                foreach($_POST['remove'] as $remove_id){
                                    $delete_product = "DELETE FROM cart where product_id='$remove_id' AND ip_address = '$ip'";
                                    $run_delete=mysqli_query($conn,$delete_product);
                                    if($run_delete){
                                        echo "<script>window.open('cart.php','_self')</script>";
                                    }
                                }
                            }
                        if(isset($_POST['continue'])){
		
		                  echo "<script>window.open('index.php','_self')</script>";
		
		                  }
                        }
                        echo @$up_cart = updatecart();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- js -->
    <script src="js/jquery.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    <!-- Bx Slider JS -->
    
    <script src="js/custom.js"></script>
  </body>
</html>