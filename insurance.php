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
<style type="text/css">

#ul1 li{
  display: inline;
}
#ul1 li{
  margin-left:7%;
}
#ul1{
  margin-top:10%;
}
#ul2 li{
  display: inline;
}
#ul2{
  margin-top:25%;
}
#ul4 li{
  display: inline;
}
tr{
  border-bottom: 1px solid #E4E5E7;
}
.collapsible-header{
  color:gray;
}

</style>
</head>
<body  style="background-color:#E4E5E7">
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

<div style="" class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header style="background-color:#F1524B;height:80px" class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row" style="margin-top:2%">
          <!-- Title -->
          <img style="margin-top:-2%" src="images/honda_logo_white.png"></img>
          <span style="margin-left:1%;font-size:18px;" lass="mdl-layout-title">Vanisha Honda</span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation -->
          <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="index.php">Home</a>
            
            <div class="mdl-navigation__link dropdown" style="">
                  <a href="#" class="btn dropdown-toggle" style="color:white" data-toggle="dropdown">Products<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <li>
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
                        
            <div class="mdl-navigation__link dropdown" style="">
              <a href="#" class="btn dropdown-toggle" style="color:white" data-toggle="dropdown">Services<span class="caret"></span></a>
              <ul id="ul_service" class="dropdown-menu">
                <li><a href="book_service.php">Book Servicing</a></li>
                <li><a href="insurance.php">Renew Insurance</a></li>
                <li><a href="finance.php">Get Finance</a></li>
              </ul>
            </div>

            <a class="mdl-navigation__link" href="enquiry.php">Contact Us</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Vanisha Honda</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="index.php">Home</a>
          <a class="mdl-navigation__link" href="product_types.php">Products</a>
          <a class="mdl-navigation__link" href="customer_services.php">Services</a>
          <a class="mdl-navigation__link" href="enquiry.php">Contact Us</a>
        </nav>
      </div>

<main class="mdl-layout__content">

<div class="container">
<div class="row" style="margin-top:6%">
  <div class="col-sm-6" style="margin-top:-4%">
    <h4>Insurance Renewal</h4>
    <img style="width:150px;height:150px" src="images/Insurance.png"></img>
    <p style="font-size:13px">In publishing and graphic design, lorem ipsum (derived from Latin dolorem ipsum, translated as "pain itself") is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation. Replacing meaningful content with placeholder text allows designers to design the form of the content before the content itself has been produced.</p>
  </div>

  <div class="col-sm-6">
      <form action="#" method="post">
      
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
            <input class="mdl-textfield__input" type="text" id="mobile" name="mobile" required>
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
</div>

<div style="background-color:#607D8B;border-bottom:1px solid #688491;margin-top:11%" class="row">
  <div class="col-sm-1" style="color:white;">
  </div>
  <div class="col-sm-3" style="color:white;">
       <div style="margin-top:5%">
        <img style="width:25%;height:25%" src="images/honda_logo_red.png"></img>
        <h5 style="margin-top:-6%;margin-left:29%">Vanisha Honda</h5>
       </div>
  </div>
  <div class="col-sm-5" style="color:white">
       <ul id="ul1">
            <li><a style="color:white" href="index.php">Home</a></li>
            <li><a style="color:white" href="product_types.php">Products</a></li>
            <li><a style="color:white" href="customer_services.php">Services</a></li>
            <li><a style="color:white" href="enquiry.php">Contact Us</a></li>
        </ul>
  </div>
  <div class="col-sm-2" style="color:white;text-align:right">
      <ul id="ul2">
            <li><img src="images/twitter.png"></img></li>
            <li><img src="images/facebook.png"></img></li>
            <li><img src="images/google-plus.png"></img></li>
        </ul>
  </div>
  <div class="col-sm-1">
  </div>
</div>

<div style="background-color:#607D8B;border-bottom:1px solid #688491" class="row">
  <div class="col-sm-1" style="color:white;">
  </div>
  <div class="col-sm-3" style="color:white;margin-top:3%">
        <ul id="ul3" style="list-style: none;margin-left:-14%">
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

