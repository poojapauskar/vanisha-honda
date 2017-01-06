<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- collapsable -->
<link rel='stylesheet prefetch' href='css/table.css'>
<link rel="stylesheet" href="css/slideshow.css">

 <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
 <link rel="stylesheet" href="css/material.indigo.min.css">
    <!-- Material Design icon font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style2.css">
  <script src="js/index.js"></script>

<style type="text/css">

#ul1 li{
  display: inline;
}
#ul1 li{
  margin-left:7%;
}
#ul1{
  margin-top:8.5%;
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

.material-icons {
   
    margin-right: 20px;
    margin-top: -9px;
}
#menu{
  font-weight:bold;
  font-size:15px;
  font-family: 'Roboto', sans-serif;
  color:#FFFFFF;
}
.mdl-layout__drawer-button{
  margin-top:40px;
  margin-left:40px;
}

#ul1 li{
  margin-left:7%;
  font-size: 12px;
  margin-top:8.5%;
}
</style>

</head>
<body  style="background-color:#E4E5E7">

<?php

if(($_POST['mobile'] == '' || $_POST['mobile'] == 'null') &&  isset($_POST['submit_btn'])){
  $error_message="Mobile field is required";
}elseif(preg_match('/[A-Za-z]/', $_POST['mobile'])  && isset($_POST['submit_btn'])) {
  $error_message="Mobile no must contain only digits";
}elseif( (strlen(preg_replace("/[^0-9]/","",$_POST['mobile'])) >15 || strlen(preg_replace("/[^0-9]/","",$_POST['mobile'])) <10) && isset($_POST['submit_btn']) ) {
  $error_message="Mobile no. must contain 10-15 digits";
}elseif( $_POST['email'] != '' && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['submit_btn']) ) {
  $error_message="Email id not valid";
}elseif(isset($_POST['submit_btn'])){
  $url_web_enquiry = 'https://vanisha-honda.herokuapp.com/web_app_enquiry/?access_token=YbZtBg6XuWWbZ39R3BIn9Mb1XOn7uy';
  $options_web_enquiry = array(
    'http' => array(
      'header'  => array(
                          'NAME: '.$_POST['name'],
                          'EMAIL: '.$_POST['email'],
                          'MOBILE: '.$_POST['mobile'],
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
$url_details_of_selected_vehicle = 'http://vanisha-honda.herokuapp.com/get_details_of_selected_vehicle/?access_token=YbZtBg6XuWWbZ39R3BIn9Mb1XOn7uy';
$options_details_of_selected_vehicle = array(
  'http' => array(
    'header'  => array(
                   'V-ID: '.$_GET['v_id'],
                 ),
    'method'  => 'GET',
  ),
);
$context_details_of_selected_vehicle = stream_context_create($options_details_of_selected_vehicle);
$output_details_of_selected_vehicle = file_get_contents($url_details_of_selected_vehicle, false,$context_details_of_selected_vehicle);
/*var_dump($output_details_of_selected_vehicle);*/
$arr_details_of_selected_vehicle = json_decode($output_details_of_selected_vehicle,true);
/*echo $arr_details_of_selected_vehicle[0]['v_details']['vehicle'];*/
?>

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header style="background-color:#F1524B;height:110px" class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row" style="margin-top:4.5%">
          <!-- Title -->
          <img style="margin-top:-3.8%;margin-left:40px;" src="images/honda_logo_white.png" width="60" height="60"></img>
          <span style="margin-left:1%;font-size:20px;" class="mdl-layout-title">Vanisha Honda</span>
          <!-- Add spacer, to align navigation to the right -->
          <div class="mdl-layout-spacer"></div>
          <!-- Navigation -->
          <nav class="mdl-navigation">
            <a class="mdl-navigation__link"  id="menu" href="index.php">HOME</a>
            
            <div class="mdl-navigation__link dropdown" style="">
                  <a href="#" class="btn dropdown-toggle" style="color:white"  id="menu"  id="menu" data-toggle="dropdown">PRODUCTS<span class="caret"></span></a>
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
              <a href="#" class="btn dropdown-toggle" style="color:white"  id="menu" data-toggle="dropdown">SERVICES<span class="caret"></span></a>
              <ul id="ul_service" class="dropdown-menu">
                <li><a href="book_service.php">Book Servicing</a></li>
                <li><a href="insurance.php">Renew Insurance</a></li>
                <li><a href="finance.php">Get Finance</a></li>
              </ul>
            </div>

            <a class="mdl-navigation__link"  id="menu" href="enquiry.php">CONTACT US</a>
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
  


<div class="row" style="text-align:left;background-color:white;margin-top:1%">
  <div class="container">
      <div class="col-sm-6">
      <h3><?php echo $arr_details_of_selected_vehicle[0]['v_details']['vehicle']; ?></h3>
      <p><?php echo $arr_details_of_selected_vehicle[0]['v_details']['description']; ?></p>
              <div class="row" style="margin-left:-4%">
                <div class="col-sm-2">
                  <img style="transform:scale(0.80);" src="images/CBS.png"></img>
                </div>
                <div class="col-sm-10">
                  <img style="transform:scale(0.80)" src="images/HET.png"></img>
                </div>
              </div>
      </div>

      <div style="text-align:right" class="col-sm-6">
       <img src="<?php echo 'http://res.cloudinary.com/hb3ayjpuz/image/upload/v1478944737/vanishahonda/'.$arr_details_of_selected_vehicle[0]['image_details']['link']; ?>"></img>
      </div>
  </div>
</div>
      <!-- <div class="col-sm-6">
                <div id="slider1" class="csslider2 infinity2">
                    <input type="radio" name="slides" id="slides_1">
                    <input type="radio" name="slides" id="slides_2">
                    <input type="radio" name="slides" checked="checked" id="slides_3">
                    <input type="radio" name="slides" id="slides_4">
                    <input type="radio" name="slides" id="slides_5">
                    <ul>
                      <li><img src="images/bike.jpg"></img></li>
                      <li><img src="images/bike.jpg"></img></li>
                      <li><img src="images/bike.jpg"></img></li>
                      <li><img src="images/bike.jpg"></img></li>
                      <li><img src="images/bike.jpg"></img></li>
                    </ul>
                    <div class="arrows">
                      <label for="slides_1"></label>
                      <label for="slides_2"></label>
                      <label for="slides_3"></label>
                      <label for="slides_4"></label>
                      <label for="slides_5"></label>
                      <label for="slides_1" class="goto-first"></label>
                      <label for="slides_5" class="goto-last"></label>
                    </div>
                    <div class="navigation">
                      <div>
                        <label for="slides_1"></label>
                        <label for="slides_2"></label>
                        <label for="slides_3"></label>
                        <label for="slides_4"></label>
                        <label for="slides_5"></label>
                      </div>
                    </div>
                </div>
      </div> -->






<div class="container" style="background-color:#E4E5E7">

<div class="row">
  <div class="col-sm-6">

      <div id="container_2nd" style="width:390px;margin-top:9%">
        <ul class="collapsible"  data-collapsible="accordion" style="background-color:white">

        <h5 style="color:gray;margin-left:2%">Specifications</h5>

            <li id="col_li">
              <div class="collapsible-header" style="overflow:hidden"><i class="mdi-navigation-chevron-right"></i>Body Dimensions<img src="images/arrow-down-1.png" style="transform:scale(0.5);float:right"></img></div>
              <div class="collapsible-body">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:390px;">
                  <tbody>
                      <tr>
                        <th style="text-align:left;">Length</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['length']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Width</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['width']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Height</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['height']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Wheel Base</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['wheel_base']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Ground Clearance</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['ground_clearance']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Kerb Tank</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['kerb_tank']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Fuel Tank Capacity</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['fuel_tank_capacity']; ?></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </li>
            <li id="col_li">
              <div class="collapsible-header" style="overflow:hidden"><i class="mdi-navigation-chevron-right"></i>Engine<img src="images/arrow-down-1.png" style="transform:scale(0.5);float:right"></img></div>
              <div class="collapsible-body">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:390px;">
                  <tbody>
                      <tr>
                        <th style="text-align:left;">Type</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['engine_type']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Displacement</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['engine_displacement']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Max net power</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['power']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Max net torque</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['torque']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Mileage</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['mileage']; ?></td>
                      </tr>
                      
                      <tr>
                        <th style="text-align:left;">Bore</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['bore']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Stroke</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['stroke']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Compression Ratio</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['compression_ratio']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Valve System</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['valve_system']; ?></td>
                      </tr>
                  </tbody>
                  </table>
              </div>
            </li>
            <li id="col_li">
              <div class="collapsible-header" style="overflow:hidden"><i class="mdi-navigation-chevron-right"></i>Transmission<img src="images/arrow-down-1.png" style="transform:scale(0.5);float:right"></img></div>
              <div class="collapsible-body">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:390px;">
                  <tbody>
                      <tr>
                        <th style="text-align:left;">No. of Gears</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['no_of_gears']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Gear Pattern</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['gear_pattern']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Max Speed</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['max_speed']; ?></td>
                      </tr>
                  </tbody>
                  </table>
              </div>
            </li>
            <li id="col_li">
              <div class="collapsible-header" style="overflow:hidden"><i class="mdi-navigation-chevron-right"></i>Tyres & Brakes<img src="images/arrow-down-1.png" style="transform:scale(0.5);float:right"></img></div>
              <div class="collapsible-body">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:390px;">
                  <tbody>
                      <tr>
                        <th style="text-align:left;">Tyre Size(Front)</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['tyre_size_front']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Tyre Size(Rear)</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['tyre_size_rear']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Tyre Type(Front)</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['tyre_type_front']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Tyre Type(Rear)</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['tyre_type_rear']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Brake Type/Size(Front)</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['brake_type_size_front']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Brake Type/Size(Rear)</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['brake_type_size_rear']; ?></td>
                      </tr>
                  </tbody>
                  </table>
              </div>
            </li>
            <li id="col_li">
              <div class="collapsible-header" style="overflow:hidden"><i class="mdi-navigation-chevron-right"></i>Frame & Suspension<img src="images/arrow-down-1.png" style="transform:scale(0.5);float:right"></img></div>
              <div class="collapsible-body">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:390px;">
                  <tbody>
                      <tr>
                        <th style="text-align:left;">Frame Type</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['frame_type']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Front</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['frame_type_front']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Rear</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['frame_type_rear']; ?></td>
                      </tr>
                  </tbody>
                  </table>
              </div>
            </li>
            <li id="col_li">
              <div class="collapsible-header" style="overflow:hidden"><i class="mdi-navigation-chevron-right"></i>Electricals<img src="images/arrow-down-1.png" style="transform:scale(0.5);float:right"></img></div>
              <div class="collapsible-body">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:390px;">
                  <tbody>
                      <tr>
                        <th style="text-align:left;">Battery</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['battery']; ?></td>
                      </tr>
                      <tr>
                        <th style="text-align:left;">Head Lamp</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['head_lamp']; ?></td>
                      </tr>
                  </tbody>
                  </table>
              </div>
            </li>
        </ul>

    </div>
  <script src='https://code.jquery.com/jquery-2.0.0.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js'></script>


        
  </div>

  <div class="col-sm-6">

      <form action="product_detail.php?v_id=<?php echo $_GET['v_id'] ?>" method="post" style="width:320px;margin-top:9%;background-color:white;padding:5px 5px 5px 5px">

      <h5 style="color:gray">Request Quotation</h5>
      <p style="color:red;text-align:left"><?php echo $error_message ;?></p>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="text" id="name" name="name">
          <label class="mdl-textfield__label" for="name">Full Name</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="text" id="email" name="email">
          <label class="mdl-textfield__label" for="email">Email Address</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input class="mdl-textfield__input" type="text" id="mobile" name="mobile">
          <label class="mdl-textfield__label" for="mobile">Mobile</label>
        </div>

        <input class="mdl-textfield__input" type="hidden" id="v_id" name="v_id" value="<?php echo $_GET['v_id'] ?>">

        
        <input class="mdl-textfield__input" type="hidden" id="address" name="address">
        <input class="mdl-textfield__input" type="hidden" id="enquiry_type" name="enquiry_type">
        <input class="mdl-textfield__input" type="hidden" id="finance" name="finance">
        <input class="mdl-textfield__input" type="hidden" id="exchange" name="exchange">
        <input class="mdl-textfield__input" type="hidden" id="message" name="message">
        <input class="mdl-textfield__input" type="hidden" id="pincode" name="pincode">
        <input class="mdl-textfield__input" type="hidden" id="duration" name="duration">
        <br>
        <div style="text-align:right">
          <button id="submit_btn" name="submit_btn" type="submit" style="background-color:blue;color:white" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Submit
          </button>
        </div>
      </form>

  </div>
</div>

</div>

<div style="background-color:#607D8B;margint-top:5%;border-bottom:1px solid #688491" class="row">
  <div class="col-sm-1" style="color:#FFFFFF;">
  </div>
  <div class="col-sm-3" style="color:#FFFFFF;">
       <div style="margin-top:5%">
        <img style="width:20%;height:20%" src="images/honda_logo_red.png"></img>
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
