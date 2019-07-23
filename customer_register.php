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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <!-- css -->
    
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/style.css">
    
    <!-- BX slider CSS -->

    
  </head>
  <body>
    <!------------header part---------->
    
    <header>
        <div class="container">
            <div class="row head">
                <div class="col s7 offset-s5">
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
                 <div class="col s12">
                     <!-- START HERE -->
    
                    <form action="customer_register.php" method="post" enctype="multipart/form-data">
                        <div class="input-field">
                            <input id="name" type="text" name="c_name" required>
                            <label for="name">First Name</label>
                        </div>
                         <div class="input-field">
                            <input id="name" type="text" name="c_name_l" required>
                            <label for="name">Last Name</label>
                        </div>
                        <!-- VALIDATION & ERROR -->
                        <div class="input-field">
                            <input placeholder="Email" id="email" type="email" name="c_email" class="validate" required>
                            <label data-error="Invalid" data-success="Valid" for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <input placeholder="Password" id="email" type="password" name="c_pass" class="validate" required>
                            <label data-error="Invalid" data-success="Valid" for="email">Password</label>
                        </div>
                        
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Image</span>
                                <input type="file" name="c_image" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" name="c_image">
                            </div>
                        </div>
                       <!-- ICON PREFIX -->
                      <div class="input-field">
                        <i class="material-icons prefix">phone</i>
                        <input id="phone" type="tel" name="c_contact" required>
                        <label for="phone">Phone Number</label>
                      </div>
                      <!-- SELECT (Must be initialized) -->
                      <div class="input-field">
                        <select name="c_country" required>
                          <option value="" disabled selected>Select Option</option>
                          <option value="Afghanistan">Afghanistan</option>
                          <option value="Australia">Australia</option>
                          <option value="Bangladesh">Bangladesh</option>
                          <option value="Brazil">Brazil</option>
                          <option value="Canada">Canada</option>
                          <option value="India">India</option>
                          <option value="Pakistan">Pakistan</option>
                          <option value="Japan">Japan</option>
                          </select>
                        <label>Select Country</label>
                      </div>
                      <div class="input-field">
                        <select name="c_city" required>
                          <option value="" disabled selected>Select Option</option>
                          <option value="Dhaka">Dhaka</option>
                          <option value="Comilla">Comilla</option>
                          <option value="Chottogram">Chottogram</option>
                          <option value="Borisal">Borisal</option>
                          <option value="Shylet">Shylet</option>
                          <option value="Noakhali">Noakhali</option>
                          <option value="Rajshai">Rajshai</option>
                          <option value="Barisal">Barisal</option>
                          </select>
                        <label>Select City</label>
                      </div>
                      <!-- TEXTAREA -->
                      <div class="input-field">
                        <textarea name="c_address" placeholder="Address" id="message" class="materialize-textarea" required></textarea>
                        <label for="message">Address</label>
                      </div>
                    
                      <br>
                      <br>
                      <div>
                        <input type="submit" name="register" value="Submit" class="btn">
                      </div>
                    </form>
                 </div>
             </div>
        </div>
    </section>
    
</body>
</html>
<?php
    if(isset($_POST['register'])){
        $ip = getIp();
        $c_name = $_POST['c_name'];
        $c_name_l = $_POST['c_name_l'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];
        
        move_uploaded_file($c_image_tmp,"customer/customer_image/$c_image");
        
        
  	    $sql_e = "SELECT customer_email FROM customers WHERE customer_email='$c_email'";
        $check_mail = mysqli_query($conn,$sql_e);
        $no_row = mysqli_num_rows($check_mail);
        if($no_row>0){
            echo "<script>alert('email already exist')</script>";
            echo "<script>window.open('customer_register.php','_self')</script>";
            
        }
        else{
            $insert_c = "insert into customers(customer_ip,customer_name_first,customer_name_last,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address )values('$ip','$c_name','$c_name_l','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_image','$c_address')";
            $run_c = mysqli_query($conn,$insert_c);
            $_SESSION['customer_email']= $c_email;
            echo "<script>alert('Account has been created successfully')</script>";
            echo "<script>window.open('customer/my_account.php','_self')</script>";
            
        }
        
        
    }
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
      // INIT SELECT LIST
      $('select').material_select();
    });
  </script>































