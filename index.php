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
    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
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
    <!------------slider part---------->
    <section id="menuandslider">
        <div class="container cole">
            <div class="row">
                <div class="col-md-2 menuobr">
                    <div class="menu">
                        <ul class="submenu">
                            <li><!--*************male part*********-->
                                <a href="men.php" target="none">
                                    <span class="male"><i class="fa fa-male"></i></span>
                                    men's fashion
                                    <span class="right-arrow"><i class="fa fa-angle-right"></i></span>
                                </a>
                                
                                <div class="submenu-container">
                                    <div class="inner-submenu">
                                        <ul>
                                            <li class="category"><a href="#">western clothing</a></li>
                                            <li class="subcategory"><a  href="#">tshirts</a></li>
                                            <li class="subcategory"><a  href="#">polos</a></li>
                                            <li class="subcategory"><a  href="#">shirts</a></li>
                                            <li class="subcategory"><a  href="#">pants</a></li>
                                            <li class="subcategory"><a  href="#">jeans</a></li>
                                            <li class="subcategory"><a  href="#">shorts</a></li>
                                        </ul>
                                        
                                    </div>
                                    <div class="inner-submenu">
                                        <ul>
                                            <li class="category"><a href="">men's accessories</a></li>
                                            <li class="subcategory"><a  href="#">ties</a></li>
                                            <li class="subcategory"><a  href="#">wallet</a></li>
                                            <li class="subcategory"><a  href="#">eyewear</a></li>
                                            <li class="subcategory"><a  href="#">belt</a></li>
                                            <li class="subcategory"><a  href="#">bag</a></li>
                                            <li class="subcategory"><a  href="#">watch</a></li>
                                        </ul>
                                    </div>
                                    <div class="inner-submenu">
                                       <ul>
                                            <li class="category"><a href="#">men's shoes</a></li>
                                            <li class="subcategory"><a  href="|#">sandales &amp; slippers</a></li>
                                            <li class="subcategory"><a  href="|#">formal shoes</a></li>
                                            <li class="subcategory"><a  href="|#">casual shoes</a></li>
                                            <li class="subcategory"><a  href="|#">boots</a></li>
                                            <li class="subcategory"><a  href="|#">sneakers</a></li>
                                            <li class="subcategory"><a  href="|#">sports shoes</a></li>
                                        </ul>
                                    </div>
                                    <div class="inner-submenu">
                                        <ul>
                                           <li class="category"><a href="#">traditional clothing</a></li>
                                            <li class="subcategory"><a  href="#">panjabis</a></li>
                                            <li class="subcategory"><a  href="#">fautuas</a></li>
                                            <li class="subcategory"><a  href="#">kurtas</a></li>
                                            <li class="subcategory"><a  href="#">sherwanis</a></li>
                                            <li class="subcategory"><a  href="#">waitscoat</a></li>
                                            <li class="subcategory"><a  href="#">shorts</a></li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </li>
                            <li>
                                <a href="women.php" target="none">
                                    <span class="female"><i class="fa fa-female"></i></span>
                                    women's fashion
                                    <span class="right-arrow-female"><i class="fa fa-angle-right"></i></span>
                                </a>
                                <div class="submenu-container-female">
                                    <div class="inner-submenu">
                                        <ul>
                                            <li class="category"><a href="#">TRADITIONAL WEAR</a></li>
                                            <li class="subcategory"><a  href="#">Saree</a></li>
                                            <li class="subcategory"><a  href="#">Salwar Kameez</a></li>
                                            <li class="subcategory"><a  href="#">Lawn</a></li>
                                            <li class="subcategory"><a  href="#">Anarkali &amp; Gowns</a></li>
                                            <li class="subcategory"><a  href="#">Lehengas</a></li>
                                            <li class="category"><a href="#">WOMEN'S SHOES</a></li>
                                            <li class="subcategory"><a  href="#">Flats &amp; Sandals</a></li>
                                            <li class="subcategory"><a  href="#">Heels</a></li>
                                            <li class="subcategory"><a  href="#">Wedges</a></li>
                                            
                                            <li class="category"><a href="#">WOMEN'S JEWELLERY</a></li>
                                            <li class="subcategory"><a  href="|#">Earrings</a></li>
                                            <li class="subcategory"><a  href="|#">Rings</a></li>
                                            <li class="subcategory"><a  href="|#">Jewellery sets</a></li>
                                            <li class="subcategory"><a  href="|#">Necklaces</a></li>
                                            
                                        </ul>
                                        
                                    </div>
                                     
                                    <div class="inner-submenu">
                                        <ul>
                                            <li class="category"><a href="#">WESTERN CLOTHING</a></li>
                                            <li class="subcategory"><a  href="#">Tops</a></li>
                                            <li class="subcategory"><a  href="#">Shirts</a></li>
                                            <li class="subcategory"><a  href="#">T-Shirts</a></li>
                                            <li class="subcategory"><a  href="#">Pants</a></li>
                                        </ul>
                                    </div>
                                    <div class="inner-submenu">
                                       <ul>
                                            <li class="category"><a href="#">WOMEN'S WATCHES</a></li>
                                            <li class="subcategory"><a  href="#">Analog</a></li>
                                            <li class="subcategory"><a  href="#">Choronograph</a></li>
                                        </ul>
                                        
                                    </div>
                                    <div class="inner-submenu">
                                       <ul>
                                            <li class="category"><a href="#">WOMEN'S ACCESSORIES</a></li>
                                            <li class="subcategory"><a  href="#">Bags &amp; Clutches</a></li>
                                            <li class="subcategory"><a  href="#">Sunglasses &amp; Eyewear</a></li>
                                            <li class="subcategory"><a  href="#">Other Accessories</a></li>
                                        </ul>
                                        
                                    </div>
                                    
                                </div>
                            </li>
                            <li>
                                <a href="">
                                    <span class="phone"><i class="fa fa-tablet"></i></span>
                                    phones &amp; tablets
                                    <span class="right-arrow-phone"><i class="fa fa-angle-right"></i></span>
                                </a>
                                <div class="submenu-container-phone">
                                    <div class="inner-submenu">
                                        <ul>
                                            <li class="category"><a href="##">SMARTPHONES</a></li>
                                            <li class="subcategory"><a  href="#">Samsung</a></li>
                                            <li class="subcategory"><a  href="#">Symphony</a></li>
                                            <li class="subcategory"><a  href="#">Huawei</a></li>
                                            <li class="subcategory"><a  href="#">LG</a></li>
                                            <li class="subcategory"><a  href="#">Asus</a></li>   
                                            <li class="subcategory"><a  href="#">Infinix</a></li>
                                            <li class="subcategory"><a  href="#">Xiaomi</a></li>
                                            <li class="subcategory"><a  href="#">OPPO</a></li>
                                            <li class="subcategory"><a  href="#">Apple</a></li>
                                            <li class="subcategory"><a  href="#">Nokia</a></li>
                                            <li class="subcategory"><a  href="#">One Plus</a></li>
                                            <li class="subcategory"><a  href="#">Micromax</a></li> 
                                        </ul>
                                        
                                    </div>
                                     
                                    <div class="inner-submenu">
                                        <ul>
                                            <li class="category"><a href="">MOBILE &amp; TABLET ACCESSORIES</a></li>
                                            <li class="subcategory"><a  href="#">Power Banks</a></li>
                                            <li class="subcategory"><a  href="#">Cases, Covers and Protections</a></li>
                                            <li class="subcategory"><a  href="#">Memory Cards</a></li>
                                            <li class="subcategory"><a  href="#">Earphones &amp; Headsets</a></li>
                                            <li class="subcategory"><a  href="#">Phone Chargers</a></li>
                                            <li class="subcategory"><a  href="#">Selfie-sticks</a></li>
                                            <li class="subcategory"><a  href="#">Bluetooth Accessories</a></li>
                                            <li class="subcategory"><a  href="#">VR Headsets</a></li>
                                            <li class="subcategory"><a  href="#">Cables &amp; Adaptors</a></li>
                                            <li class="subcategory"><a  href="#">Chargers</a></li>
                                            <li class="subcategory"><a  href="#">Batteries</a></li>
                                            <li class="subcategory"><a  href="#">Tablet Accessories</a></li>
                                        </ul>
                                        
                                    </div>
                                    
                                </div>
                            </li>
                            <li>
                                <a href="">
                                    <span class="tv"><i class="fa fa-tv"></i></span>
                                    tvs &amp; cameras
                                    <span class="right-arrow-tv"><i class="fa fa-angle-right"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="com"><i class="fa fa-desktop"></i></span>
                                    computing &amp; gaming
                                    <span class="right-arrow-com"><i class="fa fa-angle-right"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="app"><i class="fa fa-hourglass-half"></i></span>
                                    appliance
                                    <span class="right-arrow-app"><i class="fa fa-angle-right"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="home"><i class="fa fa-home"></i></span>
                                    home &amp; living
                                    <span class="right-arrow-home"><i class="fa fa-angle-right"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="ball"><i class="fa fa-soccer-ball-o"></i></span>
                                    sports &amp; travel
                                    <span class="right-arrow-ball"><i class="fa fa-angle-right"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="beauty"><i class="fa fa-paint-brush"></i></span>
                                    beauty &amp; health
                                    <span class="right-arrow-beauty"><i class="fa fa-angle-right"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="baby"><i class="fa fa-child"></i></span>
                                    baby,kids &amp; toy
                                    <span class="right-arrow-baby"><i class="fa fa-angle-right"></i></span>
                                </a>
                            </li>
                            
                        </ul>
                        
                    </div>
                </div>
                <div class="col-md-8">
                   
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <img src="image/slider1.jpg" alt="...">
                         
                        </div>
                        <div class="item">
                          <img src="image/slider.jpg" alt="...">
                        
                        </div>
                        <div class="item">
                          <img src="image/slider3.jpg" alt="...">
                         
                        </div>
                        <div class="item">
                          <img src="image/slider4.jpg" alt="...">
                        
                        </div>
                        
                      </div>

                    </div>
                </div>
                 <div class="col-md-2">
                    <div id="carousel-example-generic" class="carousel2 slide" data-ride="carousel">
                      
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active text-center">
                            <ul>
                                <li>
                                    <img src="image/apple.jpg" alt="">
                                </li>
                                <li>
                                    <img src="image/nokia.jpg" alt="">
                                </li>
                                <li>
                                    <img src="image/samsung.jpg" alt="">
                                </li>
                                <li>
                                    <img src="image/sony.jpg" alt="">
                                </li>
                            </ul>
                         
                        </div>
                        <div class="item text-center">
                            <ul>
                                <li>
                                    <img src="image/ecstasy.jpg" alt="">
                               </li>
                                <li>
                                    <img src="image/yellow.jpg" alt="">
                                </li>
                                <li>
                                    <img src="image/lereve.jpg" alt="">
                                </li>
                                <li>
                                    <img src="image/grameen.jpg" alt="">
                                </li>
                            </ul>
                        
                        </div>
                        <div class="item text-center">
                            <ul>
                                <li>
                                    <img src="image/fossil.jpg" alt="">
                                </li>
                                <li>
                                    <img src="image/fastrack.jpg" alt="">
                                </li>
                                <li>
                                    <img src="image/bata.jpg" alt="">
                                </li>
                                <li>
                                    <img src="image/zaara.jpg" alt="">
                                </li>
                            </ul>
                        
                        </div>
                        <div class="item text-center">
                            <ul>
                                <li>
                                    <img src="image/philips.jpg" alt="">
                                </li>
                                <li>
                                    <img src="image/eco.jpg" alt="">
                                </li>
                                <li>
                                    <img src="image/canon.png" alt="">
                                </li>
                                <li>
                                    <img src="image/fujifilm.jpg" alt="">
                                </li>
                            </ul>
                        
                        </div>
                        
                      </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------service part---------->
    <section class="services">
        <div class="container">
            <div class="row wow slideInLeft">
                <div class="col-md-4">
                    <div class="icons">
                        <i class="fa fa-truck"></i>
                    </div>
                    <div class="icons_text">
                        <h4>Free shipping worldwide</h4>
                        <p>Lorem Ipsum is simply dummy text <br>Lorem Ipsum.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icons">
                        <i class="fa fa-microphone"></i>
                    </div>
                    <div class="icons_text">
                        <h4>24/7 customer service</h4>
                        <p>Lorem Ipsum is simply dummy text <br>Lorem Ipsum.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="icons">
                        <i class="fa fa-handshake-o"></i>
                    </div>
                    <div class="icons_text">
                        <h4>money back guarantee</h4>
                        <p>Lorem Ipsum is simply dummy text <br>Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------service part---------->
    <section class="product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pro_text">
                        <h1>our products</h1>
                        
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>
    <!------------
                    Women's  part
                                    ---------->
    <section class="womens">
        <div class="container">
            <div class="row">
            <div class="col-md-4">
                <div class="women_img">
                    <a href="women.php" target="none">
                        <img src="image/women.png" class="wow fadeInLeft" alt="">
                        <h1 class="wow fadeInUpBig">#Women</h1>
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                <div id="men_product">
                <?php
                    getpro1();
                ?>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="vc_row wow slideInLeft">
                        <a href="">
                            <img src="image/ads1.jpg" alt="">
                            <div class="content_text" style="color: #ffffff;">
                                <p>
                                    <span class="discount">10%</span> off your <br>next purchase
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="vc_row wow slideInRight">
                        <a href="">
                            <img src="image/ads2.jpg" alt="">
                            <div class="content_text">
                                <div class="title">
                                    free shipping
                                </div>
                                <div class="title_free">free shipping on domestic orders only</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------
                    men's  part
                                    ---------->
    <section class="mens">
        <div class="container">
            <div class="row">
            <div class="col-md-8">
                <div id="men_product">
                    <?php
                        getpro();
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="men_img">
                    <a href="men.php" target="none">
                        <img src="image/men.png" class="wow fadeInRight" alt="">
                        <h1 class="wow fadeInUp">#Men</h1>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Available On -->
        <section class="available-on">
        
            <div class="container wow bounceInRight" data-wow-duration="1s">
            
                <div class="row">
                
                    <div class="col-md-6">
                    
                        <div class="available-title">
                            <h2>Available On </h2>
                        
                            <p>Our app available on android, ios, and windows mobile device. Please download and enjoy smart shopping. </p>    
                        
                        </div>
                    
                    </div>
                    <div class="col-md-6">
                    
                        <div class="row">
                        
                            <a href="#">
                            
                                <div class="col-md-4 no-padding">
                                    <div class="available-on-item">
                                    
                                        <i class="fa fa-apple"></i>
                                        <div class="available-on-inner">
                                        
                                            <h2> iOS</h2>
                                        
                                        </div>
                                    
                                    </div>
                                
                                </div> 
                                
                            
                            </a>
                            
                            
                            
                             <a href="#">
                            
                                <div class="col-md-4 no-padding">
                                    <div class="available-on-item">
                                    
                                        <i class="fa fa-android"></i>
                                        <div class="available-on-inner">
                                        
                                            <h2> ANDROID</h2>
                                        
                                        </div>
                                    
                                    </div>
                                
                                </div> 
                                
                            
                            </a>
                            
                             <a href="#">
                            
                                <div class="col-md-4 no-padding">
                                    <div class="available-on-item">
                                    
                                        <i class="fa fa-windows"></i>
                                        <div class="available-on-inner">
                                        
                                            <h2> WINDOWS</h2>
                                        
                                        </div>
                                    
                                    </div>
                                
                                </div> 
                                
                            
                            </a>
                        
                        
                        
                        </div>
                        
                    
                    </div>
                    
                
                
                </div>
            </div>
        
        </section>
    <!-- Contact Us -->
    <section class="contact-us" id="CONTACT">
        <div class="container wow bounceIn">    
            <div class="row">
                <div class="col-md-10 col-md-offset-1">    
                     <div class="section-title">
                         <h2>Contact Us</h2>
                     </div>    
                </div>
            </div>
        </div>
            <div class="contact-us-form wow bounceIn">
                <div class="container">
                    <form action="index.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject">
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" rows="25" cols="10" name="message" placeholder="Message Text...."></textarea>
                                <button type="submit" class="btn btn-default submit-btn form_submit" name="send">SEND</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            
            <div class="container">
                <div class="row">
                
                    <div class="col-md-12 wow bounceInLeft">
                    
                        <div class="social-icons">
                            <ul>
                                <li><a href="https://www.facebook.com/" target="none"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.twitter.com/" target="none"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.youtube.com/" target="none"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8"> 
                        <div id="copyright">
                            <p>Copyright &copy; 2018 <a href="#"> - Md. All Mamun &amp; Arafat Bin Kashem</a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="scroll-top">
                            <a href="#HOME" id="scroll-to-top"><i class="fa fa-angle-up"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <!-- js -->
    <script src="js/jquery.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
    <!-- Bx Slider JS -->
    <!-- Add wow js lib -->
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>