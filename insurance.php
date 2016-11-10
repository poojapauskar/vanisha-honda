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

if($_POST['mobile'] != ''){
  $url_insurance = 'https://vanisha-honda.herokuapp.com/web_app_insurance/?access_token=YbZtBg6XuWWbZ39R3BIn9Mb1XOn7uy';
  $options_insurance = array(
    'http' => array(
      'header'  => array(
                          'NAME: '.$_POST['name'],
                          'EMAIL: '.$_POST['email'],
                          'MOBILE: '.$_POST['mobile'],
                          'ADDRESS: '.$_POST['address'],
                          'V-ID: '.$_POST['v_id'],
                          'POLICY-NO: '.$_POST['policy_no'],
                          'RENEWAL-AMT: '.$_POST['renewal_amt'],
                          'PAYMENT-DATE: '.$_POST['payment_date'],
                          'ENQUIRY-DATE: '.$_POST['enquiry_date'],
                          'PURCHASE-DATE: '.$_POST['purchase_date'],
                          'EXPIRY-DATE: '.$_POST['expiry_date'],
                          'CHASSIS-NO: '.$_POST['chassis_no'],
                          'ENGINE-NO: '.$_POST['engine_no'],
                          'DATE: '.$_POST['date'],
                          ),
      'method'  => 'GET',
    ),
  );
  $context_insurance = stream_context_create($options_insurance);
  $output_insurance = file_get_contents($url_insurance, false,$context_insurance);
  /*var_dump($output_types_subtypes);*/
  $arr_insurance = json_decode($output_insurance,true);
  if($arr_insurance['status'] == 200){
    echo "<script>alert('New Insurance Created')</script>";
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
    <!-- <li>
      <a class="trigger right-caret">Level 1</a>
      <ul class="dropdown-menu sub-menu">
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
<h5 style="margin-top:-1%;color:red;text-align:center">Insurance Renewal</h5>

<div class="row">
  <div class="col-sm-6">
    <img style="width:150px;height:150px" src="images/book_service.png"></img>
  </div>

  <div class="col-sm-6">
      <form action="#" method="post">
      
          <div class="demo">
            <!-- Standard Select -->
            <div class="mdl-selectfield">
                  <label>Select Vehicle Model</label>
                  <select class="browser-default" name="v_id" id="v_id">
                      <?php for($x=0;$x<count($arr_types_subtypes);$x++){?>
                        <option value="" disabled selected><?php echo $arr_types_subtypes[$x]['vehicle_type'] ?></option>
                          <?php for($y=0;$y<count($arr_types_subtypes[$x]['subtype']);$y++){?>
                            <option value="<?php echo $arr_types_subtypes[$x]['subtype'][$y]['v_id'] ?>"><?php echo $arr_types_subtypes[$x]['subtype'][$y]['vehicle'] ?></option>
                          <?php } ?>
                      <?php } ?>
                  </select>
                </div>
          </div>

          <div style="align:left;margin-top:2%">
          Purchase Date: <input style="" id="purchase_date" name="purchase_date" class="date" type="text" placeholder="DD/MM/YYY" required="True">
          </div>

          <div style="align:left;margin-top:-2%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="policy_no" name="policy_no">
            <label class="mdl-textfield__label" for="policy_no">Policy Number</label>
          </div>

          <div style="align:left;margin-top:-2%">
          Expiry Date: <input style="" id="expiry_date" name="expiry_date" class="date" type="text" placeholder="DD/MM/YYY" required="True">
          </div>

          <div style="margin-top:-2%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="engine_no" name="engine_no">
            <label class="mdl-textfield__label" for="engine_no">Vehicle Number</label>
          </div>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="chassis_no" name="chassis_no">
            <label class="mdl-textfield__label" for="chassis_no">Chassis Number</label>
          </div>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="name" name="name">
            <label class="mdl-textfield__label" for="name">Name</label>
          </div>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="email" name="email">
            <label class="mdl-textfield__label" for="email">Email</label>
          </div>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="mobile" name="mobile">
            <label class="mdl-textfield__label" for="mobile">Mobile</label>
          </div>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <textarea class="mdl-textfield__input" type="text" rows= "3" id="address" name="address"></textarea>
            <label class="mdl-textfield__label" for="address">Address</label>
          </div>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="renewal_amt" name="renewal_amt">
            <label class="mdl-textfield__label" for="renewal_amt">Amount</label>
          </div>
          
          <br>

<input class="mdl-textfield__input" type="hidden" id="date" name="date">

          <button type="submit" style="background-color:red;color:white" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Make Payment
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

