<!DOCTYPE html>
<html lang="en">
<?php
     session_start();
    include("include/db.php");
?>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
  <link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <section class="back">
        <div class="counter-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-2">
                        <div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#insert" aria-controls="home" role="tab" data-toggle="tab">Insert Product</a></li>
                                <li role="presentation"><a href="#update" aria-controls="profile" role="tab" data-toggle="tab">Update Product</a></li>
                                <li role="presentation"><a href="#delete" aria-controls="messages" role="tab" data-toggle="tab">Delete Product</a></li>
                            </ul>
                            <!-- Tab panes -->
                              <div class="tab-content">
                                <!------insert part tab ------->
                                <div role="tabpanel" class="tab-pane fade in active" id="insert">
                                    <div class="admin">
                                        <form action="insert_product.php" method="post" enctype="multipart/form-data">
                                            <table align="center" width="750" border="2">
                                                <tr>
                                                    <td colspan="8" align="center"><h2>Admin Panel</h2></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><b class="text_color">product title:</b></td>
                                                    <td><input type="text" class="form-control" name="product_title" required></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><b class="text_color">product for:</b></td>
                                                    <td>
                                                        <select name="product_for" id="" class="form-control">
                                                            <?php
                                                                    $get_cat = "SELECT * FROM productfor";
                                                                    $run_cat = mysqli_query($conn,$get_cat);
                                                                    while($row_cat=mysqli_fetch_array($run_cat)){
                                                                        $cat_id = $row_cat['category_id'];
                                                                        $cat_title = $row_cat['category_title'];
                                                                        echo "<option>$cat_title</option>";
                                                                    }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><b class="text_color">product category:</b></td>
                                                    <td>
                                                        <select name="product_cat" id="" class="form-control">
                                                            <?php
                                                                    $get_cat = "SELECT * FROM category";
                                                                    $run_cat = mysqli_query($conn,$get_cat);
                                                                    while($row_cat=mysqli_fetch_array($run_cat)){
                                                                        $cat_id = $row_cat['category_id'];
                                                                        $cat_title = $row_cat['category_title'];
                                                                        echo "<option>$cat_title</option>";
                                                                    }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><b class="text_color">product brand:</b></td>
                                                    <td>
                                                        <select name="product_brand" id="" value="" class="form-control">
                                                            <?php
                                                                    $get_brand = "SELECT * FROM brand";
                                                                    $run_brand = mysqli_query($conn,$get_brand);
                                                                    while($row_brand = mysqli_fetch_array($run_brand)){
                                                                        $brand_id = $row_brand['brand_id'];
                                                                        $brand_title = $row_brand['brand_title'];
                                                                        echo "<option>$brand_title</option>";
                                                                    }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><b class="text_color">product image:</b></td>
                                                    <td><input type="file" name="product_image" class="text_color"></td>
                                                </tr>

                                                <tr>
                                                   <td align="right"><b class="text_color">product price:</b></td>
                                                    <td><input type="text" name="product_price" class="form-control"></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><b class="text_color">product description:</b></td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea name="product_desc" class="form-control"  id="" cols="50" rows="10"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td align="right"><b class="text_color">product keyword:</b></td>
                                                    <td><input type="text" name="product_keyword" class="form-control"></td>
                                                </tr>
                                                <tr align="center">
                                                    <td colspan="8"><input type="submit" class="btn-primary btn-lg btn-block " name="insert_post" value="Submit"></td>
                                                </tr>
                                            </table>
                                        </form>
                                        <?php
                                            if(isset($_POST['insert_post'])){
                                                $product_title = $_POST['product_title'];
                                                $product_for = $_POST['product_for'];
                                                $product_cat = $_POST['product_cat'];
                                                $product_brand = $_POST['product_brand'];
                                                $product_price = $_POST['product_price'];
                                                $product_desc = $_POST['product_desc'];
                                                $product_keyword = $_POST['product_keyword'];

                                                $product_image = $_FILES['product_image']['name'];
                                                $product_image_tmp = $_FILES['product_image']['tmp_name'];

                                                move_uploaded_file($product_image_tmp,"product_images/$product_image");



                                                $insert_product = "insert into product(product_for,product_title,product_category,product_brand,product_price,product_description,product_keyword,product_image) values('$product_for','$product_title','$product_cat','$product_brand','$product_price','$product_desc','$product_keyword','$product_image')"; 

                                                $insert_pro = mysqli_query($conn,$insert_product);
                                                if($insert_pro){
                                                    echo "<script>alert('product has been inserted!')</script>";
                                                    echo "<script>window.open('insert_product.php')</script>";
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                                <!------update part tab ------->
                                <div role="tabpanel" class="tab-pane fade" id="update">
                                    <div class="admin">
                                        <form action="insert_product.php" method="post" enctype="multipart/form-data">
                                            <table align="center" width="750" border="2">
                                                <tr>
                                                    <td colspan="8" align="center"><h2>Admin Panel</h2></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><b class="text_color">product id:</b></td>
                                                    <td><input type="text" class="form-control" name="product_id" required></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><b class="text_color">product title:</b></td>
                                                    <td><input type="text" class="form-control" name="product_title" ></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><b class="text_color">product for:</b></td>
                                                    <td>
                                                        <select name="product_for" id="" class="form-control">
                                                            <?php
                                                                    $get_cat = "SELECT * FROM productfor";
                                                                    $run_cat = mysqli_query($conn,$get_cat);
                                                                    while($row_cat=mysqli_fetch_array($run_cat)){
                                                                        $cat_id = $row_cat['category_id'];
                                                                        $cat_title = $row_cat['category_title'];
                                                                        echo "<option>$cat_title</option>";
                                                                    }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><b class="text_color">product category:</b></td>
                                                    <td>
                                                        <select name="product_cat" id="" class="form-control">
                                                            <?php
                                                                    $get_cat = "SELECT * FROM category";
                                                                    $run_cat = mysqli_query($conn,$get_cat);
                                                                    while($row_cat=mysqli_fetch_array($run_cat)){
                                                                        $cat_id = $row_cat['category_id'];
                                                                        $cat_title = $row_cat['category_title'];
                                                                        echo "<option>$cat_title</option>";
                                                                    }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><b class="text_color">product brand:</b></td>
                                                    <td>
                                                        <select name="product_brand" id="" value="" class="form-control">
                                                            <?php
                                                                    $get_brand = "SELECT * FROM brand";
                                                                    $run_brand = mysqli_query($conn,$get_brand);
                                                                    while($row_brand = mysqli_fetch_array($run_brand)){
                                                                        $brand_id = $row_brand['brand_id'];
                                                                        $brand_title = $row_brand['brand_title'];
                                                                        echo "<option>$brand_title</option>";
                                                                    }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><b class="text_color">product image:</b></td>
                                                    <td><input type="file" name="product_image" class="text_color"></td>
                                                </tr>

                                                <tr>
                                                   <td align="right"><b class="text_color">product price:</b></td>
                                                    <td><input type="text" name="product_price" class="form-control"></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><b class="text_color">product description:</b></td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <textarea name="product_desc" class="form-control"  id="" cols="50" rows="10"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td align="right"><b class="text_color">product keyword:</b></td>
                                                    <td><input type="text" name="product_keyword" class="form-control"></td>
                                                </tr>
                                                <tr align="center">
                                                    <td colspan="8"><input type="submit" class="btn-primary btn-lg btn-block " name="update_post" value="Update"></td>
                                                </tr>
                                            </table>
                                        </form>
                                        <?php
                                        if(isset($_POST['update_post'])){
                                            $product_id = $_POST['product_id'];
                                            $product_title = $_POST['product_title'];
                                            $product_for = $_POST['product_for'];
                                            $product_cat = $_POST['product_cat'];
                                            $product_brand = $_POST['product_brand'];
                                            $product_price = $_POST['product_price'];
                                            $product_desc = $_POST['product_desc'];
                                            $product_keyword = $_POST['product_keyword'];

                                            $product_image = $_FILES['product_image']['name'];
                                            $product_image_tmp = $_FILES['product_image']['tmp_name'];

                                            move_uploaded_file($product_image_tmp,"product_images/$product_image");

                                            $update_product = "UPDATE product SET product_title='$product_title', product_for='$product_for',product_category='$product_cat',product_brand='$product_brand',product_price='$product_price', product_description='$product_desc',product_keyword='$product_keyword',product_image= '$product_image' where product_id='$product_id'";

                                            $update_pro = mysqli_query($conn,$update_product);
                                            if($update_pro){
                                                echo "<script>alert('Product has been updated successfully!')</script>";
                                                echo "<script>window.open('insert_product.php')</script>";
                                            }
                                        }
?>
                                    </div>
                                </div>
                                <!------Delete part tab ------->
                                <div role="tabpanel" class="tab-pane fade" id="delete">
                                    <div class="admin delete">
                                        <form action="insert_product.php" method="post" enctype="multipart/form-data">
                                            <table align="center" width="750" border="2">
                                                <tr>
                                                    <td colspan="8" align="center"><h2>Admin Panel</h2></td>
                                                </tr>
                                                <tr>
                                                    <td align="right" style=""><b class="text_color">product id:</b></td>
                                                    <td style="padding-top:50px;
                                                    padding-bottom:50px;"><input type="text" class="form-control" name="product_id" required></td>
                                                </tr>
                                                   
                                                <tr align="center" >
                                                    <td colspan="8"><input type="submit" class="btn-primary btn-lg btn-block " name="delete_post" value="Delete"></td>
                                                </tr>
                                            </table>
                                        </form>
                                        <?php
                                        if(isset($_POST['delete_post'])){
                                            $product_id = $_POST['product_id'];
                                            $delete_product= "DELETE FROM product where product_id='$product_id'";

                                            $delete_pro = mysqli_query($conn,$delete_product);
                                            if($delete_pro){
                                                echo "<script>alert('Product has been deleted successfully!')</script>";
                                                echo "<script>window.open('insert_product.php')</script>";
                                            }
                                        }
                                    ?>
                                    </div>
                                </div>
                              </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>


