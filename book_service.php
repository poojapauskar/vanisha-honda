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
<style type="text/css">

tr{
  border-bottom: 1px solid #E4E5E7;
}
.collapsible-header{
  color:gray;
}

</style>
</head>
<body  style="background-color:#E4E5E7">

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

if($_POST['req_pic_up'] == 1){
  $pick_up='Yes';
}else{
  $pick_up='No';
}

if(($_POST['v_id'] == '' || $_POST['v_id'] == 'null') &&  isset($_POST['book_service_btn'])){
  $error_message="Select a Vehicle";
}elseif(($_POST['v_type'] == '' || $_POST['v_type'] == 'null') &&  isset($_POST['book_service_btn'])){
  $error_message="Select Servicing Type";
}elseif(($_POST['mobile'] == '' || $_POST['mobile'] == 'null') &&  isset($_POST['book_service_btn'])){
  $error_message="Mobile field is required";
}elseif(preg_match('/[A-Za-z]/', $_POST['mobile'])  && isset($_POST['book_service_btn'])) {
  $error_message="Mobile no must contain only digits";
}
elseif( (strlen(preg_replace("/[^0-9]/","",$_POST['mobile'])) >15 || strlen(preg_replace("/[^0-9]/","",$_POST['mobile'])) <10) && isset($_POST['book_service_btn']) ) {
  $error_message="Mobile no. must contain 10-15 digits";
}elseif( $_POST['email'] != '' && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['book_service_btn']) ) {
  $error_message="Email id not valid";
}elseif(($_POST['engine_no'] == '' || $_POST['engine_no'] == 'null') &&  isset($_POST['book_service_btn'])){
  $error_message="Vehicle Number is required";
}elseif(($_POST['delivery_date'] == '' || $_POST['delivery_date'] == 'null') &&  isset($_POST['book_service_btn'])){
  $error_message="Date is required";
}elseif(isset($_POST['book_service_btn'])){
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
    $_POST = array();
  }
}
?>


<div class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header style="background-color:#F1524B;height:110px" class="mdl-layout__header mdl-layout__header--transparent">
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
  <div class="col-sm-6" style="margin-top:-4%;margin-left:3%;">
    <h4>Book Servicing</h4>
    <img style="width:150px;height:150px" src="images/servicing_spanner.png"></img>
    <p style="font-size:13px;margin-top:2%">In publishing and graphic design, lorem ipsum (derived from Latin dolorem ipsum, translated as "pain itself") is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation. Replacing meaningful content with placeholder text allows designers to design the form of the content before the content itself has been produced.</p>
  </div>

  <div class="col-sm-5" style="margin-top:2%;margin-left:5%">
      <form action="book_service.php" method="post" style="background-color:white;width:300px;padding:2px 10px 10px 10px">
        
          <h6 style="font-size:18px">Booking Form</h6>
          <p style="color:red;text-align:left"><?php echo $error_message ;?></p>
          <!-- Added label over the SelectField -->
          <label class="mdl-selectfield__label" for="v_id" style="color:#cccccc;margin-top:-1%;font-size:13px;">Vehicle</label>
          <div class="demo">
            <!-- Standard Select -->
               <div class="mdl-selectfield">
              <select style="background-color:white;border:none;color:gray;font-size:15px;border-bottom: 1px solid #e1e1e1;padding-top:5px;
    width: 140%;z-index:4;position: absolute;margin-top:-8px;" onfocus='this.size=10;' 
onblur='this.size=1;' 
onchange='this.size=1; this.blur();' class="browser-default"  name="v_type" id="v_type">
                      
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
                      }else{?></option>

                       <option value="" disabled selected><?php echo "Select Vehicle Model"; }?></option>


                      <?php for($x=0;$x<count($arr_types_subtypes);$x++){?>
                        <option style="color:#F1524B" value="" disabled><?php echo $arr_types_subtypes[$x]['vehicle_type'] ?></option>
                          <?php for($y=0;$y<count($arr_types_subtypes[$x]['subtype']);$y++){?>
                            <option value="<?php echo $arr_types_subtypes[$x]['subtype'][$y]['v_id'] ?>"><?php echo $arr_types_subtypes[$x]['subtype'][$y]['vehicle'] ?></option>
                          <?php } ?>
                      <?php } ?>
</div>

                  </select>
                </div>
          </div>

          <div class="demo" style="margin-top:3%">
          <!-- Added label over the SelectField -->
          
            <!-- Standard Select -->
            <label class="mdl-selectfield__label" for="v_id" style="color:#cccccc;margin-top:9%;font-size:13px;">Servicing Type</label>
            <div class="mdl-selectfield">
              <select style="background-color:white;border:none;color:gray;font-size:15px;border-bottom: 1px solid #e1e1e1;width: 140%; padding-top:3px;z-index:1;position: absolute;margin-top:-2%;"  class="browser-default"  name="v_type" id="v_type">
                
                <?php if($_POST['v_type'] != ''){?>
                       <option value="<?php echo $_POST['v_type'] ?>" selected><?php echo $_POST['v_type']; 
                      }else{?>
                       <option value="" disabled selected><?php echo "Select Servicing Type"; }?>

                <option value="1st Free">1st Free</option>
                <option value="2nd Free">2nd Free</option>
                <option value="3rd Free">3rd Free</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>

          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10%">
            <input value="<?php echo $_POST['name'] ?>" class="mdl-textfield__input" type="text" id="name" name="name" placeholder="Full Name"> 
            <label class="mdl-textfield__label" for="name" style="color:#cccccc;">Name</label>
          </div>

          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="<?php echo $_POST['email'] ?>" class="mdl-textfield__input" type="email" id="email" name="email" placeholder="Email Address">
            <label class="mdl-textfield__label" for="email" style="color:#cccccc;">Email</label> 
          </div>

          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="<?php echo $_POST['mobile'] ?>" class="mdl-textfield__input" type="text" id="mobile" name="mobile" pattern="-?[0-9]*(\.[0-9]+)?" id="inputnocheck" placeholder="+91-">
            <label class="mdl-textfield__label" for="mobile inputnocheck" style="color:#cccccc;" >Mobile</label>
            
              <!-- class "mdl-textfield__error" -->
          <span class="mdl-textfield__error">Input is not a phone number</span>
          </div>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="<?php echo $_POST['engine_no'] ?>" class="mdl-textfield__input" type="text" id="engine_no" name="engine_no" placeholder="Registration Number">
            <label class="mdl-textfield__label" for="v_no" style="color:#cccccc;">Vehicle Registration</label>
            
          </div>
          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <textarea placeholder="Address" class="mdl-textfield__input" type="text" rows= "1" id="address" name="address"><?php echo $_POST['address'] ?></textarea>
            <label class="mdl-textfield__label" for="address" style="color:#cccccc;">Address</label>
          </div>

          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <textarea class="mdl-textfield__input" type="text" rows= "1" id="additional_service" name="additional_service" placeholder="instructions/Requirement/complains"><?php echo $_POST['additional_service'] ?></textarea>
            <label class="mdl-textfield__label" for="additional_service" style="color:#cccccc;">Instructions/Complains</label>
            
          </div>

          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             
            <input value="<?php echo $_POST['delivery_date'] ?>" class="mdl-textfield__input date" type="text" id="delivery_date" placeholder="Date DD/MM/YYY" name="delivery_date">
            <label class="mdl-textfield__label" for="delivery_date" style="color:#cccccc;">Date</label>
          </div>

          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <input type="checkbox" id="req_pic_up" name="req_pic_up" value="1">
            <label class="mdl-textfield__label" for="additional_service">&nbsp &nbsp Use Current Location</label>
          </div>
          

<input class="mdl-textfield__input" type="hidden" id="service_type" name="service_type">
<input class="mdl-textfield__input" type="hidden" id="date" name="date">
<input class="mdl-textfield__input" type="hidden" id="complaints" name="complaints">
<input class="mdl-textfield__input" type="hidden" id="status" name="status">
<input class="mdl-textfield__input" type="hidden" id="mechanic_id" name="mechanic_id">

          <div style="text-align:right">
          <button id="book_service_btn" name="book_service_btn" type="submit" style="background-color: #fff;color: rgb(0, 0, 255);" class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect">
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
  <div class="col-sm-2" style="color:white;text-align:right">
      <ul id="ul2">

                     <li><a href="https://twitter.com/" target="_blank">
            <img src="images/twitter.png" /></a></li>
            <li><a href="https://www.facebook.com/" target="_blank">
            <img src="images/facebook.png"></img></a></li>
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
