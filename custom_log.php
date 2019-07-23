<!DOCTYPE html>
<?php 
session_start();
include("function/function.php");

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
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/account.css">
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
                       <ul>
                        <li><a href="">home</a></li>
                        <li><a href="">home</a></li>
                        <li><a href="">home</a></li>
                        <li><a href="">home</a></li>
                        <li><a href="">home</a></li>
                        <li><a href="">home</a></li>
                    </ul>
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
                         <a href="index.php"><img src="image/Levi's_logo.png" alt=""></a>
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

                                            echo "
                                                <a href='checkout.php' style='color:#fff;' class='home_log'>Login</a>
                                                <div class='new_log'>
                                                    <h5>New customer?</h5><a href='customer_register.php' style='text-decoration:underline;'>Sign up</a>
                                                </div>
                                            
                                            ";

                                            }
                                            else{
                                                echo "
                                                    <a href='logout.php' style='color:#fff;' class='home_log'>Logout</a>
                                                    <div class='new_log'>
                                                        <a href='my_account.php' style='text-decoration:underline;'>My account</a>
                                                    </div>
                                                ";
                                           
                                            }
                                        ?>
                                     </li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="cart.php" class="cartimg"><img class="climg" src="image/shopping-cart4.png" alt=""><span>Cart(<?php total_items(); ?>)</span></a></li>
                        </ul>
                   </div>
                    <?php
                        cart();
                    ?>
                </div>
            </div>
        </div>
    </header>
    <section id="pro_show">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div>
                        <form action="" method="post">
                            <table width="500" align="center" bgcolor="skyblue">
                                <tr align="center">
                                    <td><h2>Please login</h2></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><input type="email" name="email" placeholder="enter your email" required></td>
                                </tr>
                                <tr>
                                    <td>Password:</td>
                                    <td><input type="password" name="pass" placeholder="enter password" required></td>
                                </tr>
                                <tr>
                                    <td><a href="checkout.php?forgot_pass">Forgot Password</a></td>
                                </tr>
                                <tr>
                                    
                                    <td><input type="submit" name="login" value="Login"></td>
                                </tr>
                            </table>
                            <h2><a href="customer_register.php">New? Register here</a></h2>
                        </form>
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
    if(isset($_POST['login'])){
        $c_email = $_POST['email'];
        $c_pass = $_POST['pass'];
        $sel_c = "select * from customers where customer_pass ='$c_pass' AND customer_email='$c_email'";
        $run_c = mysqli_query($conn,$sel_c);
        $check_customer = mysqli_num_rows($run_c);
        if($check_customer==0){
            echo "<script>alert('Email or Password is incorrect')</script>";
            exit();
        }
        else{
            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('you logged in successfully, Thanks')</script>";
            echo "<script>window.open('customer/my_account.php','self')</script>";
        }
        
        
    }
?>
















