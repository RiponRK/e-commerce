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
                                                
                                            </div> 
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
                        echo "<img class='customerimg' src='customer_image/$c_img' width='200px' height='200px'/>";
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
                    
                    <div class="change_image">
                        <a href="change_picture.php" style="text-decoration:none;text-transform: capitalize;
    font-size: 12px;
    font-weight: 700;margin-left:50px;"><img src="image/pencil.png" alt="">Change Picture</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="c_pass">
                        <form action="change_password.php" method="post" enctype="multipart/form-data">
                           <div class="pass_table">
                               <table>
                                   <tr>
                                       <td>Current </td>
                                       <td><input type="password" class="txt" name="c_pass" required></td>
                                   </tr>
                                   
                                   <tr>
                                       <td>New</td>
                                       <td><input type="password" class="txt" name="cnew_pass" required></td>
                                   </tr>
                               </table>
                               
                           </div>
                           <div>
                             <input type="submit" class="custom-button-pass" name="insert_post" value="save change">
                           </div>
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
    if(isset($_POST['insert_post'])){
         if(isset($_SESSION['customer_email'])){
             $user = $_SESSION['customer_email'];
             $get_name = "select * from customers where customer_email = '$user'";
             $run_name = mysqli_query($conn,$get_name);
             $row_name = mysqli_fetch_array($run_name);
             $c_pass= $row_name['customer_pass'];
             $customer_pass = $_POST['c_pass'];
             
             if($c_pass == $customer_pass){
                 $customer_new_pass = $_POST['cnew_pass'];
                 $update= "UPDATE customers SET customer_pass='$customer_new_pass' where customer_pass = '$customer_pass'";
                 $insert_pass = mysqli_query($conn,$update);
                 if($insert_pass){
                     echo "<script>alert('password change successfully!')</script>";
                     session_destroy();
                     echo "<script>window.open('../customer_login.php','_self')</script>";
                 }
             }
             else{
                 echo "<script>alert('Password is incorrect')</script>";
                echo "<script>window.open('change_password.php','_self')</script>";
             }
         }
    }
?>
