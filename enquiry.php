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
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/vanisha-honda.css">
  <script src="js/index.js"></script>

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

if(($_POST['mobile'] == '' || $_POST['mobile'] == 'null') &&  isset($_POST['enq_btn'])){
  $error_message="Mobile field is required";
}elseif(preg_match('/[A-Za-z]/', $_POST['mobile'])  && isset($_POST['enq_btn'])) {
  $error_message="Mobile no must contain only digits";
}elseif( (strlen(preg_replace("/[^0-9]/","",$_POST['mobile'])) >15 || strlen(preg_replace("/[^0-9]/","",$_POST['mobile'])) <10) && isset($_POST['enq_btn']) ) {
  $error_message="Mobile no. must contain 10-15 digits";
}elseif( $_POST['email'] != '' && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['enq_btn']) ) {
  $error_message="Email id not valid";
}elseif(($_POST['v_id'] == '' || $_POST['v_id'] == 'null') &&  isset($_POST['enq_btn'])){
  $error_message="Select a Vehicle";
}elseif(isset($_POST['enq_btn'])){
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

<div style="" class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header style="background-color:#F1524B;height:110px" class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row" style="margin-top:4.5%">
          <!-- Title -->
          <img style="margin-top:-3.8%" src="images/honda_logo_white.png"></img>
          <span style="margin-left:1%;font-size:18px;" lass="mdl-layout-title">Vanisha Honda</span>
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
                        
           <div class="mdl-navigation__link dropdown homonhov" style="line-height:35px;">
              <a href="#" class="btn dropdown-toggle" id="menu" data-toggle="dropdown">SERVICES<!-- <span class="caret"></span> --></a>
              <ul id="ul_service" class="dropdown-menu">
                <li><a href="book_service.php">Book Servicing</a></li>
                <li><a href="insurance.php">Renew Insurance</a></li>
                <li><a href="finance.php">Get Finance</a></li>
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
  <div class="col-sm-6" style="margin-top:-4%">
    <h4>Contact Us</h4>
    <h5 style="font-size:18px;margin-top:-1%">Drop Us a mail at: <span style="font-size:14px">info@vanishahonda.com</span></h5>
    <h5 style="font-size:18px;margin-top:-1%">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Reach Us on: <span style="font-size:14px">+91-9876543210</span></h5>
    <h5 style="margin-top:-2%"><span style="font-size:14px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp +91-9876012345</span></h5>
    <p style="font-size:13px;margin-top:2%">In publishing and graphic design, lorem ipsum (derived from Latin dolorem ipsum, translated as "pain itself") is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation. Replacing meaningful content with placeholder text allows designers to design the form of the content before the content itself has been produced.</p>
  </div>

  <div class="col-sm-6">
    <form action="enquiry.php" method="post" style="background-color:white;width:300px;padding:2px 10px 10px 10px">
        
          <h6 style="font-size:18px">Enquiry Form</h6>
          <p style="color:red;text-align:left"><?php echo $error_message ;?></p>
      
          

          <div style="align:left;margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="<?php echo $_POST['name'] ?>" class="mdl-textfield__input" type="text" id="name" name="name">
            <label class="mdl-textfield__label" for="name">Name</label>
          </div>

          <div style="align:left;margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="<?php echo $_POST['email'] ?>" class="mdl-textfield__input" type="text" id="email" name="email">
            <label class="mdl-textfield__label" for="email">Email</label>
          </div>

          <div style="align:left;margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="<?php echo $_POST['mobile'] ?>" class="mdl-textfield__input" type="text" id="mobile" name="mobile">
            <label class="mdl-textfield__label" for="mobile">Phone</label>
          </div>

          <div class="demo">
            <!-- Standard Select -->
            <div class="mdl-selectfield">
                  <select style="background-color:white;border:none;color:gray;font-size:15px" class="browser-default" name="v_id" id="v_id">
                      
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


<br>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <textarea class="mdl-textfield__input" type="text" rows= "3" id="address" name="address"><?php echo $_POST['address'] ?></textarea>
            <label class="mdl-textfield__label" for="address">Address</label>
          </div>

<br>
        <input class="mdl-textfield__input" type="hidden" id="enquiry_type" name="enquiry_type">
        <input class="mdl-textfield__input" type="hidden" id="finance" name="finance">
        <input class="mdl-textfield__input" type="hidden" id="exchange" name="exchange">
        <input class="mdl-textfield__input" type="hidden" id="message" name="message">
        <input class="mdl-textfield__input" type="hidden" id="pincode" name="pincode">
        <input class="mdl-textfield__input" type="hidden" id="duration" name="duration">

        <div style="text-align:right">
          <button id="enq_btn" name="enq_btn" type="submit" style="background-color:blue;color:white" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Submit
          </button>
        </div>
        
      </form>
  </div>
</div>
</div>

<div style="background-color:#607D8B;margin-top:5%" class="row">
  <div class="col-sm-1">
  </div>
  <div class="col-sm-4" style="color:white;margin-top:1%"> 
          <h5 style="font-size:14px;font-weight:bold">Head Office</h5>
          <h6 style="font-size:12px;margin-top:-3%">#4855/83, Near 3rd Railway Gate, Udyambag</h6>
          <h6 style="font-size:12px;margin-top:-5%">Belagavi-590001, Karnataka-India</h6>
  </div>
  <div class="col-sm-3">
  </div>
  <div class="col-sm-4" style="color:white;margin-top:1%;"> 
          <h5 style="font-size:14px;font-weight:bold">Branch</h5>
          <h6 style="font-size:12px;margin-top:-3%">#4855/83, Near 3rd Railway Gate, Udyambag</h6>
          <h6 style="font-size:12px;margin-top:-5%">Belagavi-590001, Karnataka-India</h6>
  </div>
  <div class="col-sm-1">
  </div>
</div>



<!-- maps start-->
<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      #map-canvas{
  height: 150px;
  width: 100%;
}
</style>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script> -->
<div id="map-canvas"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYNU-mlRq2sPcsN_Cia4tm0p6oujPy998&v=3.exp&sensor=false" type="text/javascript"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/map.js"></script>
<!-- maps end -->



<div style="background-color:#607D8B;border-bottom:1px solid #688491;" class="row">
  <div class="col-sm-1" style="color:white;">
  </div>
  <div class="col-sm-3" style="color:white;">
       <div style="margin-top:5%">
         <img width="60" height="60" src="images/honda_logo_red.png"></img>
        <h5 style="margin-top:-6%;margin-left:25%">Vanisha Honda</h5>
       </div>
  </div>
  <div class="col-sm-5" style="color:#FFFFFF">
       <ul id="ul1">
            <li><a style="color:#FFFFFF" href="index.php">HOME</a></li>
            <li><a style="color:#FFFFFF" href="product_types.php">PRODUCTS</a></li>
            <li><a style="color:#FFFFFF" href="customer_services.php">SERVICES</a></li>
            <li><a style="color:#FFFFFF" href="enquiry.php">CONTACT US</a></li>
        </ul>
  </div>
  <div class="col-sm-2" style="color:#FFFFFF;text-align:right">
      <ul id="ul2">
            <li><img src="images/twitter.png"></img></li>
            <li><img src="images/facebook.png"></img></li>
            <li><img src="images/google-plus.png"></img></li>
        </ul>
  </div>
  <div class="col-sm-1">
  </div>
</div>

<div style="background-color:#607D8B;margint-top:5%;border-bottom:1px solid #688491" class="row">
  <div class="col-sm-1" style="color:#FFFFFF;">
  </div>
  <div class="col-sm-3" style="color:#FFFFFF;margin-top:3%">
        <ul id="ul3" style="list-style: none;margin-left:-14%;font:italic 13px Roboto,sans-serif;">
            <li>+91-9987654321</li>
            <li>+91-8314208821</li>
            <li>info@vanishahonda.com</li>
        </ul>
  </div>
  <div class="col-sm-2" style="color:#FFFFFF">
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

