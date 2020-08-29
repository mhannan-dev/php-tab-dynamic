<?php
$connect = mysqli_connect("localhost", "root", "", "bs_tabs_isotop");
$tab_query = "SELECT * FROM category ORDER BY category_id ASC";
$tab_result = mysqli_query($connect, $tab_query);
$tab_menu = '';
$tab_content = '';
$i = 0;
while($row = mysqli_fetch_array($tab_result))
{
 if($i == 0)
 {
  $tab_menu .= '
   <li class="active"><a href="#'.$row["category_id"].'" data-toggle="tab">'.$row["category_name"].'</a></li>
  ';
  $tab_content .= '
   <div id="'.$row["category_id"].'" class="tab-pane fade in active">
  ';
 }
 else
 {
  $tab_menu .= '
   <li><a href="#'.$row["category_id"].'" data-toggle="tab">'.$row["category_name"].'</a></li>
  ';
  $tab_content .= '
   <div id="'.$row["category_id"].'" class="tab-pane fade">
  ';
 }
 $product_query = "SELECT * FROM product WHERE category_id = '".$row["category_id"]."'";
 $product_result = mysqli_query($connect, $product_query);
 while($sub_row = mysqli_fetch_array($product_result))
 {
  $tab_content .= '
  <div class="col-md-3" style="margin-bottom:36px;">
   <img src="assets/img/portfolio/'.$sub_row["product_image"].'" class="img-responsive img-thumbnail" />
   <h4>'.$sub_row["product_name"].'</h4>
  </div>
  ';
 }
 $tab_content .= '<div style="clear:both"></div></div>';
 $i++;
}
?>

<!DOCTYPE html>
<html>
 <head>
  <title>Create Dynamic Tab by using Bootstrap in PHP Mysql</title>
  <script src="./dist/js/jquer310.js"></script>
  <link rel="stylesheet" href="./dist/css/bootstrap.min.css" />
  <script src="./dist/js//bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">
   <h2 align="center">Create Dynamic Tab by using Bootstrap in PHP Mysql</a></h2>
   <br />
   <ul class="nav nav-tabs">
   <?php
   echo $tab_menu;
   ?>
   </ul>
   <div class="tab-content">
   <br />
   <?php
   echo $tab_content;
   ?>
   </div>
  </div>
 </body>
</html>
