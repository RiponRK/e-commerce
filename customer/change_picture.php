<!DOCTYPE html>
<?php 
session_start();
include("../function/function.php");

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto:400,700" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/account.css">
    <!-- BX slider CSS -->

    
  </head>
  <body>
    <!------------header part---------->
    <header id="HOME">
        <div class="topbar">
        <div class="container">
           <div class="row">
               <div class="col-md-9 col-md-offset-3">
                   <div class="top text-center">
                       <h3>get up to <span>20%</span> additional cashback with</h3>
                       <img src="image/Logo.png" alt="">
                   </div>
               </div>
           </div>
        </div>
        </div>
        <div class="container">
            <div class="row head">
                <div class="col-md-1 col-md-offset-1">
                    <div class="logo">
                         <!-- logo -->
                         <a href="../index.php"><img src="image/logo.gif" alt=""></a>
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
                                                
                                                ";
                                            }
                                            ?>
                                    </li>
                                </ul>
                                </div>
                            </li>
                            <li><a href="../cart.php" class="cartimg"><img class="climg" src="image/shopping-cart3.png" alt=""> Cart<span class="cart_item"><?php total_items(); ?></span></a></li>
                        </ul>
                   </div>
                    <?php
                        cart();
                    ?>
                </div>
                
                
            </div>
        </div>
    </header>
    <section id="my_account">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <div class="my">
                        <h2>Account control panel</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-md-offset-1">
                    <div class="my_image fall-item fall-effect">
                        <?php
                            $user = $_SESSION['customer_email'];
                        $get_img = "select * from customers where customer_email = '$user'";
                        $run_img = mysqli_query($conn,$get_img);
                        $row_img = mysqli_fetch_array($run_img);
                        $c_img = $row_img['customer_image'];
                        echo "<img class='customerimg' src='customer_image/$c_img' width='200px' height='250px'/>";
                        ?>
                        <div class="mask">
                            <a href="#" class="craig" name="cr_image"><h4 class="">
                                <?php
                                    $user = $_SESSION['customer_email'];
                                    $get_name = "select * from customers where customer_email = '$user'";
                                    $run_name = mysqli_query($conn,$get_name);
                                    $row_name = mysqli_fetch_array($run_name);
                                    $c_name_f = $row_name['customer_name_first'];
                                    $c_name_l = $row_name['customer_name_last'];
                                    echo "$c_name_f $c_name_l";
                                ?>
                            </h4></a>
                            
                        </div>
                    </div>
                    
                    <div class="c_image">
                        <form action="change_picture.php" method="post" enctype="multipart/form-data">
                      
                            <input type="file" name="c_image" required>
                            <input type="submit" class="custom-button" name="insert" value="save change">
                        
                        </form>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="show_name">
                        <?php
                            $user = $_SESSION['customer_email'];
                            $get_name = "select * from customers where customer_email = '$user'";
                            $run_name = mysqli_query($conn,$get_name);
                            $row_name = mysqli_fetch_array($run_name);
                            $c_name_f = $row_name['customer_name_first'];
                            $c_name_l = $row_name['customer_name_last'];
                            if(isset($user)){
                                echo "<b>Hello</b><p> $c_name_f $c_name_l</p>";
                            }
                                else{
                                    echo "Your Account";
                                }
                        ?>
                    </div>
                    <div class="welcome_text">
                        <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
                    </div>
                    <div class="contact_info">
                        <h4>contact information</h4>
                        <?php
                            $user = $_SESSION['customer_email'];
                            $get_name = "select * from customers where customer_email = '$user'";
                            $run_name = mysqli_query($conn,$get_name);
                            $row_name = mysqli_fetch_array($run_name);
                            $c_name_f = $row_name['customer_name_first'];
                            $c_name_l = $row_name['customer_name_last'];
                            $c_email = $row_name['customer_email'];
                            echo "<div class='get_name'><p>$c_name_f $c_name_l</p><p>$c_email</p></div>";
                        ?>
                        <a href="change_password.php"><img src="image/pencil.png" alt=""> change password</a>
                       
                    </div>
                    <div class="address">
                        <div class="delivery_add">
                            <h4>Default delivery address</h4>
                             <?php
                                $user = $_SESSION['customer_email'];
                                $get_name = "select * from customers where customer_email = '$user'";
                                $run_name = mysqli_query($conn,$get_name);
                                $row_name = mysqli_fetch_array($run_name);
                                $id = $row_name['customer_id'];
                                $c_name_f = $row_name['customer_name_first'];
                                $c_name_l = $row_name['customer_name_last'];
                                $c_phone = $row_name['customer_contact'];
                                $c_add = $row_name['customer_address'];
                                echo "
                                    <div class='get_name'>
                                        <p>$c_name_f $c_name_l</p>
                                        <p>$c_phone</p>
                                        <p>$c_add</p>
                                    </div>
                                ";
                            ?>
                            <a href="edit_account.php?customer_id=<?php echo $id?>"><img src="image/pencil.png" alt=""> edit address</a>
                        </div>
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
<?php 
				
				$user = $_SESSION['customer_email'];
				
				$get_customer = "select * from customers where customer_email='$user'";
				
				$run_customer = mysqli_query($conn, $get_customer); 
				
				$row_customer = mysqli_fetch_array($run_customer); 
				
				$c_id = $row_customer['customer_id'];
				$image = $row_customer['customer_image'];
				
				
		?>
<?php
if(isset($_POST['insert'])){
	
		
		$ip = getIp();
		
		$customer_id = $c_id;
		
		$c_image = $_FILES['c_image']['name'];
		$c_image_tmp = $_FILES['c_image']['tmp_name'];
		move_uploaded_file($c_image_tmp,"customer_image/$c_image");
		
		 $update_c = "update customers set customer_image='$c_image' where customer_id='$customer_id'";
	
		$run_update = mysqli_query($conn, $update_c); 
		
		if($run_update){
		
		echo "<script>alert('Your account successfully Updated')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
		
		}
	}
?>