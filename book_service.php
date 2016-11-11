<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <link rel="stylesheet" href="css/slideshow.css">

 <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
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

if($_POST['req_pic_up'] == 1){
  $pick_up='Yes';
}else{
  $pick_up='No';
}

if($_POST['mobile'] != ''){
  $url_book_service = 'https://vanisha-honda.herokuapp.com/web_app_book_servicing/?access_token=YbZtBg6XuWWbZ39R3BIn9Mb1XOn7uy';
  $options_book_service = array(
    'http' => array(
      'header'  => array(
                          'NAME: '.$_POST['name'],
                          'EMAIL: '.$_POST['email'],
                          'MOBILE: '.$_POST['mobile'],
                          'ADDRESS: '.$_POST['address'],
                          'V-ID: '.$_POST['v_id'],
                          'DATE: '.$_POST['date'],
                          'SERVICE-TYPE: '.$_POST['service_type'],
                          'DELIVERY-DATE: '.$_POST['delivery_date'],
                          'ADDITIONAL-SERVICE: '.$_POST['additional_service'],
                          'COMPLAINTS: '.$_POST['complaints'],
                          'PICK-UP: '.$pick_up,
                          'STATUS: '.$_POST['status'],
                          'MECHANIC-ID: '.$_POST['mechanic_id'],
                          'ENGINE-NO: '.$_POST['engine_no'],
                          ),
      'method'  => 'GET',
    ),
  );
  $context_book_service = stream_context_create($options_book_service);
  $output_book_service = file_get_contents($url_book_service, false,$context_book_service);
  /*var_dump($output_types_subtypes);*/
  $arr_book_service = json_decode($output_book_service,true);
  if($arr_book_service['status'] == 200){
    echo "<script>alert('New Service Request Created')</script>";
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
     <a class="trigger right-caret" href="product_types.php">All Products</a>
      <a class="trigger right-caret">Scooters</a>
      <ul class="dropdown-menu sub-menu">
        <li><a href="product_detail.php">Activa 123</a></li>
        <li><a href="product_detail.php">Activa 2</a></li>
      </ul>
      <a class="trigger right-caret">Motorcycles</a>
      <ul class="dropdown-menu sub-menu">
        <li><a href="product_detail.php">Pleasure 2</a></li>
      </ul>
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
  </ul>
</div>
</li>
      <li><a style="margin-left:14%" href="customer_services.php">Services</a></li>
      <li><a style="margin-left:14%" href="enquiry.php">Contact</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
<h5 style="margin-top:-1%;color:red;text-align:center">Book Servicing</h5>

<div class="row">
  <div class="col-sm-6">
    <img style="width:150px;height:150px" src="images/book_service.png"></img>
  </div>

  <div class="col-sm-6">
      <form action="book_service.php" method="post">
      
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

          <div class="demo" style="margin-top:2%">
            <!-- Standard Select -->
            <div class="mdl-selectfield">
              <label>Servicing Type</label>
              <select class="browser-default"  name="v_type" id="v_type">
                <option value="" disabled selected>Servicing Type</option>
                <option value="1st Free">1st Free</option>
                <option value="2nd Free">2nd Free</option>
                <option value="3rd Free">3rd Free</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>

          <div class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="name" name="name">
            <label class="mdl-textfield__label" for="name">Name</label>
          </div>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="email" name="email">
            <label class="mdl-textfield__label" for="email">Email</label>
          </div>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="mobile" name="mobile" required>
            <label class="mdl-textfield__label" for="mobile">Mobile</label>
          </div>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="engine_no" name="engine_no">
            <label class="mdl-textfield__label" for="v_no">Vehicle Number</label>
          </div>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <textarea class="mdl-textfield__input" type="text" rows= "3" id="address" name="address"></textarea>
            <label class="mdl-textfield__label" for="address">Address</label>
          </div>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <textarea class="mdl-textfield__input" type="text" rows= "3" id="additional_service" name="additional_service"></textarea>
            <label class="mdl-textfield__label" for="additional_service">Other Instructions/<br> Additional Service Requirement</label>
          </div>

          <div style="align:left">
          Select Date: <input style="" id="delivery_date" name="delivery_date" class="date" type="text" placeholder="DD/MM/YYY" required="True">
          </div>

          <input type="checkbox" id="req_pic_up" name="req_pic_up" value="1">Request Pick-Up<br>

<input class="mdl-textfield__input" type="hidden" id="service_type" name="service_type">
<input class="mdl-textfield__input" type="hidden" id="date" name="date">
<input class="mdl-textfield__input" type="hidden" id="complaints" name="complaints">
<input class="mdl-textfield__input" type="hidden" id="status" name="status">
<input class="mdl-textfield__input" type="hidden" id="mechanic_id" name="mechanic_id">

          <button type="submit" style="background-color:red;color:white" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Book Service
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

