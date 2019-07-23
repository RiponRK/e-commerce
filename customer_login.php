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
    <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Bootstrap 101 Template</title>
    
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto|Work+Sans" rel="stylesheet">  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--Import Google Icon Font-->
   
    <!-- css -->
    
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                <div class="col-md-7 col-md-offset-5">
                    <div class="logo">
                         <!-- logo -->
                        <a href="index.php"><img src="image/logo.gif" alt=""></a>
                     </div>
                </div>  
            </div>
        </div>
    </header>
    
    <section id="details_part">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-md-offset-3">
                    <form class="form-horizontal" method="post">
                      <div class="form-group">
                       
                        <div class="col-sm-8 ">
                          <input type="email" class="form-control control" id="inputEmail3" placeholder="Email" name="email" required>
                        </div>
                      </div>
                      <div class="form-group">
                       
                        <div class="col-sm-8">
                          <input type="password" class="form-control control" id="inputPassword3" placeholder="Password" name="pass" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class=" col-sm-8">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Remember me
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                           <input type="submit" name="login" value="Login" class="btn btn-primary custom-btn">
                        </div>
                      </div>
                       <br>
                      <div>
                        <div class="col-sm-12">
                          <a href="customer_register.php">New? Register here</a>
                        </div>
                          
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
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
            echo "<script>window.open('customer/my_account.php','_self')</script>";
        }
        
        
    }
?>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>






























