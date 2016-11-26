<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="css/slideshow.css">

 <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <link rel="stylesheet" href="css/material.indigo.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <link rel="stylesheet" href="css/style.css">
  <script src="js/index.js"></script>
</head>
<body>
<?php
$url_types_subtypes = 'https://vanisha-honda.herokuapp.com/get_vehicle_types_subtypes/?access_token=YbZtBg6XuWWbZ39R3BIn9Mb1XOn7uy';
$options_types_subtypes = array(
  'http' => array(
    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
    'method'  => 'GET',
  ),
);
$context_types_subtypes = stream_context_create($options_types_subtypes);
$output_types_subtypes = file_get_contents($url_types_subtypes, false,$context_types_subtypes);
/*var_dump($output_types_subtypes);*/
$arr_types_subtypes = json_decode($output_types_subtypes,true);
?>

<?php

if($_POST['mobile'] != ''){
  $url_web_enquiry = 'https://vanisha-honda.herokuapp.com/web_app_enquiry/?access_token=YbZtBg6XuWWbZ39R3BIn9Mb1XOn7uy';
  $options_web_enquiry = array(
    'http' => array(
      'header'  => array(
                          'NAME: '.$_POST['name'],
                          'EMAIL: '.$_POST['email'],
                          'MOBILE: '.$_POST['mobile'],
                          'ADDRESS: '.$_POST['address'],
                          'V-ID: '.$_POST['v_id']
                          ),
      'method'  => 'GET',
    ),
  );
  $context_web_enquiry = stream_context_create($options_web_enquiry);
  $output_web_enquiry = file_get_contents($url_web_enquiry, false,$context_web_enquiry);
  /*var_dump($output_types_subtypes);*/
  $arr_web_enquiry = json_decode($output_web_enquiry,true);
  if($arr_web_enquiry['status'] == 200){
    echo "<script>alert('New Enquiry Created')</script>";
  }
}
?>

<!-- datepicker -->
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-ui.js"></script>
  <script>
  $(function() {
    $( ".date" ).datepicker({ dateFormat: 'dd/mm/yy' });
  });
  </script>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <img style="width:8%;height:8%" src="images/sample_logo.jpg"></img>
      <a class="" href="#">Vanisha Honda</a>
    </div>

<ul style="margin-top:-5%;margin-left:50%" class="nav navbar-nav">
 <li class="active"><a href="index.php">Home</a></li>

<li>
<div class="dropdown" style="margin-left:10%">
  <a href="#" class="btn dropdown-toggle" data-toggle="dropdown">Products<span class="caret"></span></a>
  <ul class="dropdown-menu">
     <li>
      <!-- <a class="trigger right-caret" href="product_types.php">All Products</a> -->
      <?php for($x=0;$x<count($arr_types_subtypes);$x++){?>
          <a class="trigger right-caret"><?php echo $arr_types_subtypes[$x]['vehicle_type'] ?></a>
              <ul class="dropdown-menu sub-menu">
                <?php for($y=0;$y<count($arr_types_subtypes[$x]['subtype']);$y++){?>
                  <li><a href="product_detail.php?v_id=<?php echo $arr_types_subtypes[$x]['subtype'][$y]['v_id'] ?>"><?php echo $arr_types_subtypes[$x]['subtype'][$y]['vehicle'] ?></a></li>
                <?php } ?>
              </ul>
      <?php } ?>
    </li>
  </ul>
</div>
</li>

<li>
<div class="dropdown" style="margin-left:20%">
  <a href="#" class="btn dropdown-toggle" data-toggle="dropdown">Customer<span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li>
      <a class="trigger right-caret" href="book_service.php">Book Servicing</a>
      <a class="trigger right-caret" href="insurance.php">Renew Insurance</a>
      <a class="trigger right-caret" href="finance.php">Get Finance</a>
     <!--  <ul class="dropdown-menu sub-menu">
        <li><a href="#">Level 2</a></li>
        <li>
          <a class="trigger right-caret">Level 2</a>
          <ul class="dropdown-menu sub-menu">
            <li><a href="#">Level 3</a></li>
            <li><a href="#">Level 3</a></li>
            <li>
              <a class="trigger right-caret">Level 3</a>
              <ul class="dropdown-menu sub-menu">
                <li><a href="#">Level 4</a></li>
                <li><a href="#">Level 4</a></li>
                <li><a href="#">Level 4</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="#">Level 2</a></li>
      </ul>
    </li>
    <li><a href="#">Level 1</a></li>
    <li><a href="#">Level 1</a></li> -->
  </ul>
</div>
</li>
      <li><a style="margin-left:14%" href="customer_services.php">Services</a></li>
      <li><a style="margin-left:14%" href="enquiry.php">Contact</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
<h5 style="margin-top:-1%;color:red;text-align:center">Customer Services</h5>

<div class="row">
  <div class="col-sm-6">
    Materialize is a modern responsive CSS framework based on Material Design by Google. ... 

  </div>

  <div class="col-sm-6">
    Enquiry Form
      <form action="#" method="post">
      
          

          <div style="align:left;margin-top:-2%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="name" name="name">
            <label class="mdl-textfield__label" for="name">Name</label>
          </div>

          <div style="align:left;margin-top:-2%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="email" name="email">
            <label class="mdl-textfield__label" for="email">Email</label>
          </div>

          <div style="align:left;margin-top:-2%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="mobile" name="mobile" required>
            <label class="mdl-textfield__label" for="mobile">Phone</label>
          </div>

          <div class="demo">
            <!-- Standard Select -->
            <div class="mdl-selectfield">
              <label>Select Vehicle Model</label>
              <select class="browser-default" name="v_id" id="v_id" required>
                  <?php for($x=0;$x<count($arr_types_subtypes);$x++){?>
                    <option value="" disabled selected><?php echo $arr_types_subtypes[$x]['vehicle_type'] ?></option>
                      <?php for($y=0;$y<count($arr_types_subtypes[$x]['subtype']);$y++){?>
                        <option value="<?php echo $arr_types_subtypes[$x]['subtype'][$y]['v_id'] ?>"><?php echo $arr_types_subtypes[$x]['subtype'][$y]['vehicle'] ?></option>
                      <?php } ?>
                  <?php } ?>
              </select>
            </div>
          </div>
<br>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <textarea class="mdl-textfield__input" type="text" rows= "3" id="address" name="address"></textarea>
            <label class="mdl-textfield__label" for="address">Address</label>
          </div>

<br>
        <input class="mdl-textfield__input" type="hidden" id="enquiry_type" name="enquiry_type">
        <input class="mdl-textfield__input" type="hidden" id="finance" name="finance">
        <input class="mdl-textfield__input" type="hidden" id="exchange" name="exchange">
        <input class="mdl-textfield__input" type="hidden" id="message" name="message">
        <input class="mdl-textfield__input" type="hidden" id="pincode" name="pincode">
        <input class="mdl-textfield__input" type="hidden" id="duration" name="duration">

          <button type="submit" style="background-color:red;color:white" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Submit
          </button>
      </form>
  </div>
</div>

<div style="height:100px" class="row">
</div>

<div style="background-color:red" class="row">
  <div class="col-sm-6" style="color:white;">
       <div style="margin-left:10%">
        <img style="width:8%;height:8%" src="images/sample_logo.jpg"></img>
        <h5 style="margin-top:-5%;margin-left:10%">Vanisha Honda</h5>
        <h6 style="font-size:12px">9123456789, 97181717817<br>
        9123456789, 97181717817<br>
        info@vanishahonda.com</h6>

        <form>
        <input type="text" placeholder="Enter email" id="email1" name="email1"></input>
        <button style="color:white;background-color:blue" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
          Submit
        </button>
        </form>

       </div>
  </div>
  <div class="col-sm-6" style="color:white">
       <div style="margin-left:10%">
       <h6 style="font-size:12px;margin-top:10%">9123456789, 97181717817<br>
        9123456789, 97181717817<br>
        info@vanishahonda.com</h6>
       </div>
  </div>
</div>


<div style="background-color:red" class="row">
<h4 style="font-size:12px;color:white;text-align:center">2016, Vanisha Honda. All rights reserved</h4>
</div>

</body>
</html>




</body>
</html>

