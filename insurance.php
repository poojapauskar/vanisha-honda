<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="16x16" href="images/honda_logo_red.png">
  <!---select field-->
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.indigo-pink.min.css">
  <script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>   
  <link rel="stylesheet" href="css/mdl.css">
  <script defer src="https://rawgit.com/MEYVN-digital/mdl-selectfield/master/mdl-selectfield.min.js"></script>   
 <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
 <!---bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/slideshow.css">

  <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
  <link rel="stylesheet" href="css/material.indigo.min.css">
    <!-- Material Design icon font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/vanisha-honda.css">
  <script src="js/index.js"></script>
<style type="text/css">

.mdl-textfield__input {
    border: none;
    border-bottom: 1px solid rgba(0, 0, 0, .12);
    display: block;
    font-size: 15px;
    font-family: "Helvetica", "Arial", sans-serif;
    margin: 0;
    padding: 4px 0;
    width: 100%;
    background: 0 0;
    text-align: left;
    color: inherit;
}
tr{
  border-bottom: 1px solid #E4E5E7;
}
.collapsible-header{
  color:gray;
}

</style>
</head>
<body  style="background-color:#E4E5E7;overflow-x:hidden">

<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-ui.js"></script>
  <script>
  $(function() {
    $( ".date" ).datepicker({ dateFormat: 'dd/mm/yy' });
  });
  </script>

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

if(($_POST['v_id'] == '' || $_POST['v_id'] == 'null') &&  isset($_POST['insurance_btn'])){
  $error_message="Select a Vehicle";
}elseif(($_POST['purchase_date'] == '' || $_POST['purchase_date'] == 'null') &&  isset($_POST['insurance_btn'])){
  $error_message="Purchase Date is required";
}elseif(($_POST['policy_no'] == '' || $_POST['policy_no'] == 'null') &&  isset($_POST['insurance_btn'])){
  $error_message="Policy No. is required";
}elseif(($_POST['expiry_date'] == '' || $_POST['expiry_date'] == 'null') &&  isset($_POST['insurance_btn'])){
  $error_message="Expiry Date is required";
}elseif(($_POST['engine_no'] == '' || $_POST['engine_no'] == 'null') &&  isset($_POST['insurance_btn'])){
  $error_message="Engine No. is required";
}elseif(($_POST['chassis_no'] == '' || $_POST['chassis_no'] == 'null') &&  isset($_POST['insurance_btn'])){
  $error_message="Chassis No. is required";
}elseif(($_POST['mobile'] == '' || $_POST['mobile'] == 'null') &&  isset($_POST['insurance_btn'])){
  $error_message="Mobile field is required";
}elseif(preg_match('/[A-Za-z]/', $_POST['mobile'])  && isset($_POST['insurance_btn'])) {
  $error_message="Mobile no must contain only digits";
}elseif( (strlen(preg_replace("/[^0-9]/","",$_POST['mobile'])) >15 || strlen(preg_replace("/[^0-9]/","",$_POST['mobile'])) <10) && isset($_POST['insurance_btn']) ) {
  $error_message="Mobile no. must contain 10-15 digits";
}elseif( $_POST['email'] != '' && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['insurance_btn']) ) {
  $error_message="Email id not valid";
}elseif(($_POST['renewal_amt'] == '' || $_POST['renewal_amt'] == 'null') &&  isset($_POST['insurance_btn'])){
  $error_message="Amount is required";
}elseif(isset($_POST['insurance_btn'])){
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
    $_POST = array();
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


<div class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header style="background-color:#F1524B;height:110px;-webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;  /* Chrome and Safari         */
     -moz-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;  /* Firefox 3.6               */
     box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;" class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row" style="margin-top:4.5%">
          <!-- Title -->
          <img style="margin-top:-3.8%;margin-left:30px;" src="images/honda_logo_white.png" width="60" height="60"></img>

          <span style="margin-left:1%;font-size:20px;" class="mdl-layout-title">Vanisha Honda</span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation -->
          <nav class="mdl-navigation">
            <a class="mdl-navigation__link homonhov" href="index.php" id="menu" style="line-height:35px;">HOME</a>
            
            <div class="mdl-navigation__link dropdown homonhov"  style="line-height:35px;">
                  <a href="#" class="btn dropdown-toggle" id="menu" data-toggle="dropdown">PRODUCTS<!-- <span class="caret"></span> --></a>
                  <ul class="dropdown-menu">
                     <li>
                      <?php for($x=0;$x<count($arr_types_subtypes);$x++){?>
                          <a class="trigger right-caret" id="service"><?php echo $arr_types_subtypes[$x]['vehicle_type'] ?></a>
                              <ul class="dropdown-menu sub-menu">
                                <?php for($y=0;$y<count($arr_types_subtypes[$x]['subtype']);$y++){?>
                                  <li id="service"><a href="product_detail.php?v_id=<?php echo $arr_types_subtypes[$x]['subtype'][$y]['v_id'] ?>"><?php echo $arr_types_subtypes[$x]['subtype'][$y]['vehicle'] ?></a></li>
                                <?php } ?>
                              </ul>
                      <?php } ?>
                    </li>
                  </ul>
            </div>
                        
           <div class="mdl-navigation__link dropdown homonhov" style="line-height:35px;">
              <a href="#" class="btn dropdown-toggle" id="menu" data-toggle="dropdown">SERVICES<!-- <span class="caret"></span> --></a>
              <ul id="ul_service" class="dropdown-menu">
                <li><a href="book_service.php"  id="service">Book Servicing</a></li>
                <li><a href="insurance.php" id="service">Renew Insurance</a></li>
                <li><a href="finance.php" id="service">Get Finance</a></li>
              </ul>
            </div>

            <a class="mdl-navigation__link homonhov" href="enquiry.php" id="menu" style="line-height:35px;">CONTACT US</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Vanisha Honda</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="index.php"><i class="material-icons">home</i>Home</a>
          <a class="mdl-navigation__link" href="product_types.php"><i class="material-icons">directions_bike</i>Products</a>
          <a class="mdl-navigation__link" href="customer_services.php"><i class="material-icons">build</i>Services</a>
          <a class="mdl-navigation__link" href="enquiry.php"><i class="material-icons">contact_phone</i>Contact Us</a>
        </nav>
      </div>

<main class="mdl-layout__content">

<div class="container">
<div class="row" style="margin-top:6%">
  <div class="col-sm-6" style="margin-top:-4%;margin-left:3%;">
    <h4>Insurance Renewal</h4>
    <img style="" src="images/Insurance_2.png"></img>
    <p style="font-size:13px;margin-top:2%">In publishing and graphic design, lorem ipsum (derived from Latin dolorem ipsum, translated as "pain itself") is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation. Replacing meaningful content with placeholder text allows designers to design the form of the content before the content itself has been produced.</p>
  </div>

  <div class="col-sm-5" style="margin-top:2%;margin-left:5%">
      <form action="insurance.php" method="post" style="background-color:white;width:300px;padding:2px 10px 10px 10px">
          
          <h6 style="font-size:18px">Insurance Form</h6>
          <p style="color:red;text-align:left"><?php echo $error_message ;?></p>
         <!-- Added label over the SelectField -->
          <div class="demo" style="margin-bottom:-6%">
            <!-- Standard Select -->
            <label class="mdl-selectfield__label" for="v_id" style="color:#cccccc;margin-top:9%;margin-left:5%;font-size:13px;">Vehicle</label>
               <div class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label" >
              <select style="" class="mdl-selectfield__select""  name="v_type" id="v_type">
             
<?php

if($_POST['v_id'] != ''){
  $url_details_of_selected_vehicle = 'http://vanisha-honda.herokuapp.com/get_details_of_selected_vehicle/?access_token=YbZtBg6XuWWbZ39R3BIn9Mb1XOn7uy';
  $options_details_of_selected_vehicle = array(
    'http' => array(
      'header'  => array(
                     'V-ID: '.$_POST['v_id'],
                   ),
      'method'  => 'GET',
    ),
  );
  $context_details_of_selected_vehicle = stream_context_create($options_details_of_selected_vehicle);
  $output_details_of_selected_vehicle = file_get_contents($url_details_of_selected_vehicle, false,$context_details_of_selected_vehicle);
  /*var_dump($output_details_of_selected_vehicle);*/
  $arr_details_of_selected_vehicle = json_decode($output_details_of_selected_vehicle,true);
  /*echo $arr_details_of_selected_vehicle[0]['v_details']['vehicle'];*/
}
?>
                      <?php if($_POST['v_id'] != ''){?>
                       <option value="<?php echo $_POST['v_id'] ?>" selected><?php echo $arr_details_of_selected_vehicle[0]['v_details']['vehicle']; 
                      }else{?>
                       <option value="" disabled selected><?php echo "Select Vehicle Model"; }?>


                      <?php for($x=0;$x<count($arr_types_subtypes);$x++){?>
                        <option style="color:#F1524B" value="" disabled><?php echo $arr_types_subtypes[$x]['vehicle_type'] ?></option>
                          <?php for($y=0;$y<count($arr_types_subtypes[$x]['subtype']);$y++){?>
                            <option value="<?php echo $arr_types_subtypes[$x]['subtype'][$y]['v_id'] ?>"><?php echo $arr_types_subtypes[$x]['subtype'][$y]['vehicle'] ?></option>
                          <?php } ?>
                      <?php } ?>


                  </select>
                </div>
          </div>

          <div style="margin-top:4%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="delivery_date" style="color:#cccccc;font-size:13px;">Purchase Date</label> 
            <input value="<?php echo $_POST['purchase_date'] ?>" class="mdl-textfield__input date" type="text" id="purchase_date" name="purchase_date" placeholder="Purchase Date DD/MM/YYY">
          </div>

          <div style="align:left;margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="policy_no" style="color:#cccccc;font-size:13px;">Policy Number</label>
            <input value="<?php echo $_POST['policy_no'] ?>" class="mdl-textfield__input" type="text" id="policy_no" name="policy_no" placeholder="Policy Number">
          </div>

          <div style="margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="delivery_date" style="color:#cccccc;font-size:13px;">Expiry Date</label>
            <input value="<?php echo $_POST['expiry_date'] ?>" class="mdl-textfield__input date" type="text" id="expiry_date" name="expiry_date" placeholder="Expiry Date DD/MM/YYY">
          </div>

          <div style="margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="engine_no" style="color:#cccccc;font-size:13px;">Vehicle Number</label>
            <input value="<?php echo $_POST['engine_no'] ?>" class="mdl-textfield__input" type="text" id="engine_no" name="engine_no" placeholder="Vehicle Number">
          </div>
          <div style="margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="chassis_no" style="color:#cccccc;font-size:13px;">Chassis Number</label>
            <input value="<?php echo $_POST['chassis_no'] ?>" class="mdl-textfield__input" type="text" id="chassis_no" name="chassis_no" placeholder="Chassis Number">
          </div>
          <div style="margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="name" style="color:#cccccc;font-size:13px;">Name</label>
            <input value="<?php echo $_POST['name'] ?>" class="mdl-textfield__input" type="text" id="name" name="name" placeholder="Full Name">
          </div>
          <div style="margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="email" style="color:#cccccc;font-size:13px;">Email</label>
            <input value="<?php echo $_POST['email'] ?>" class="mdl-textfield__input" type="text" id="email" name="email" placeholder="Email Address">
          </div>
          <div style="margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="mobile" style="color:#cccccc;font-size:13px;" >Mobile</label>
            <input value="<?php echo $_POST['mobile'] ?>" class="mdl-textfield__input" type="text" id="mobile" name="mobile" placeholder="+91">
          </div>
          <div style="margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="address" style="color:#cccccc;font-size:13px;">Address</label>
            <textarea class="mdl-textfield__input" type="text" rows= "1" id="address" name="address" placeholder="Address"><?php echo $_POST['address'] ?></textarea>
          </div>
          <div style="margin-top:-2font-size:13px;%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="renewal_amt" style="color:#cccccc;font-size:13px;">Amount</label>
            <input value="<?php echo $_POST['renewal_amt'] ?>" class="mdl-textfield__input" type="text" id="renewal_amt" name="renewal_amt" placeholder="Amount">
          </div>
          
          <br>

          <input class="mdl-textfield__input" type="hidden" id="date" name="date">
        
          <div style="text-align:right">
            <button type="submit" id="insurance_btn" name="insurance_btn" style="background-color: #fff;color: rgb(0, 0, 255);" class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect">
              Submit
            </button>
          </div>
      </form>
  </div>
</div>
</div>

<div style="background-color:#607D8B;border-bottom:1px solid #688491;margin-top:11%" class="mdl-mini-footer">
  <div class="col-sm-1" style="color:white;">
  </div>
  <div class="col-sm-3" style="color:white;">
       <div style="margin-top:5%;margin-left:-24%">
        <img width="60" height="60" src="images/honda_logo_red.png"></img>

        <h5 style="margin-top:-5.5%;margin-left:22%">Vanisha Honda</h5>
       </div>
  </div>
  <div class="col-sm-5" style="color:#FFFFFF">
       <ul id="ul1" style="margin-top:11%">
            <li><a style="color:#FFFFFF" href="index.php">HOME</a></li>
            <li><a style="color:#FFFFFF" href="product_types.php">PRODUCTS</a></li>
            <li><a style="color:#FFFFFF" href="customer_services.php">SERVICES</a></li>
            <li><a style="color:#FFFFFF" href="enquiry.php">CONTACT US</a></li>
        </ul>
  </div>
  <div class="col-sm-2" style="color:white;text-align:right">
      <ul id="ul2">
                   <li><a href="https://twitter.com/" target="_blank">
            <img src="images/twitter.png" /></a></li>
            <li><a href="https://www.facebook.com/" target="_blank"><img src="images/facebook.png"></img></a></li>
            <li><a href="https://plus.google.com/" target="_blank"> 
            <img src="images/google-plus.png"></img></a></li>

        </ul>
  </div>
  <div class="col-sm-1">
  </div>
</div>

<div style="background-color:#607D8B;border-bottom:1px solid #688491" class="mdl-mini-footer">
  <div class="col-sm-1" style="color:white;">
  </div>
  <div class="col-sm-3" style="color:white;margin-top:3%">
         <ul id="ul3" style="list-style: none;margin-left:-36%;font:italic 13px Roboto,sans-serif;">
            <li>+91-9987654321</li>
            <li>+91-8314208821</li>
            <li>info@vanishahonda.com</li>
        </ul>
  </div>
  <div class="col-sm-2" style="color:white">
  </div>
  <div class="col-sm-5" style="color:#97A8B0;text-align:right">
        <ul id="ul4" style="margin-top:17%">
            <li>PRIVACY POLICY</li>
            <li style="margin-left:10%">TERMS AND CONDITIONS</li>
        </ul>
  </div>
  <div class="col-sm-1">
  </div>
</div>

</main>

</body>
</html>

