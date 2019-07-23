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
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="cart_info">
                        <?php
                            if(!isset($_SESSION['customer_email'])){
                                include("customer_login.php");
                            }
                            else{
                                include("payment.php");
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
      // INIT SELECT LIST
      $('select').material_select();
    });
  </script>