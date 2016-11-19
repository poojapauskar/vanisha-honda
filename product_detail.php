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
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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

</style>

</head>
<body  style="background-color:#E4E5E7">

<?php

if($_POST['mobile'] != ''){
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
  


<div class="row" style="text-align:left;background-color:white">
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
        <ul class="collapsible"  data-collapsible="accordion">
            <li id="col_li">
              <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i><img src="images/arrow-down.png"></img>  Body Dimensions</a></div>
              <div class="collapsible-body">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:390px;">
                  <tbody>
                      <tr>
                        <th>Length</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['length']; ?></td>
                      </tr>
                      <tr>
                        <th>Width</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['width']; ?></td>
                      </tr>
                      <tr>
                        <th>Height</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['height']; ?></td>
                      </tr>
                      <tr>
                        <th>Wheel Base</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['wheel_base']; ?></td>
                      </tr>
                      <tr>
                        <th>Ground Clearance</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['ground_clearance']; ?></td>
                      </tr>
                      <tr>
                        <th>Kerb Tank</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['kerb_tank']; ?></td>
                      </tr>
                      <tr>
                        <th>Fuel Tank Capacity</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['fuel_tank_capacity']; ?></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
            </li>
            <li id="col_li">
              <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i><img src="images/arrow-down.png"></img>  Engine</div>
              <div class="collapsible-body">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:390px;">
                  <tbody>
                      <tr>
                        <th>Type</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['engine_type']; ?></td>
                      </tr>
                      <tr>
                        <th>Displacement</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['engine_displacement']; ?></td>
                      </tr>
                      <tr>
                        <th>Max net power</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['power']; ?></td>
                      </tr>
                      <tr>
                        <th>Max net torque</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['torque']; ?></td>
                      </tr>
                      <tr>
                        <th>Mileage</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['mileage']; ?></td>
                      </tr>
                      
                      <tr>
                        <th>Bore</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['bore']; ?></td>
                      </tr>
                      <tr>
                        <th>Stroke</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['stroke']; ?></td>
                      </tr>
                      <tr>
                        <th>Compression Ratio</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['compression_ratio']; ?></td>
                      </tr>
                      <tr>
                        <th>Valve System</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['valve_system']; ?></td>
                      </tr>
                  </tbody>
                  </table>
              </div>
            </li>
            <li id="col_li">
              <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i><img src="images/arrow-down.png"></img>  Transmission</div>
              <div class="collapsible-body">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:390px;">
                  <tbody>
                      <tr>
                        <th>No. of Gears</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['no_of_gears']; ?></td>
                      </tr>
                      <tr>
                        <th>Gear Pattern</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['gear_pattern']; ?></td>
                      </tr>
                      <tr>
                        <th>Max Speed</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['max_speed']; ?></td>
                      </tr>
                  </tbody>
                  </table>
              </div>
            </li>
            <li id="col_li">
              <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i><img src="images/arrow-down.png"></img>  Tyres & Brakes</div>
              <div class="collapsible-body">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:390px;">
                  <tbody>
                      <tr>
                        <th>Tyre Size(Front)</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['tyre_size_front']; ?></td>
                      </tr>
                      <tr>
                        <th>Tyre Size(Rear)</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['tyre_size_rear']; ?></td>
                      </tr>
                      <tr>
                        <th>Tyre Type(Front)</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['tyre_type_front']; ?></td>
                      </tr>
                      <tr>
                        <th>Tyre Type(Rear)</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['tyre_type_rear']; ?></td>
                      </tr>
                      <tr>
                        <th>Brake Type/Size(Front)</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['brake_type_size_front']; ?></td>
                      </tr>
                      <tr>
                        <th>Brake Type/Size(Rear)</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['brake_type_size_rear']; ?></td>
                      </tr>
                  </tbody>
                  </table>
              </div>
            </li>
            <li id="col_li">
              <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i><img src="images/arrow-down.png"></img>  Frame & Suspension</div>
              <div class="collapsible-body">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:390px;">
                  <tbody>
                      <tr>
                        <th>Frame Type</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['frame_type']; ?></td>
                      </tr>
                      <tr>
                        <th>Front</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['frame_type_front']; ?></td>
                      </tr>
                      <tr>
                        <th>Rear</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['frame_type_rear']; ?></td>
                      </tr>
                  </tbody>
                  </table>
              </div>
            </li>
            <li id="col_li">
              <div class="collapsible-header"><i class="mdi-navigation-chevron-right"></i><img src="images/arrow-down.png"></img>  Electricals</div>
              <div class="collapsible-body">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:390px;">
                  <tbody>
                      <tr>
                        <th>Battery</th>
                        <td><?php echo $arr_details_of_selected_vehicle[0]['v_details']['battery']; ?></td>
                      </tr>
                      <tr>
                        <th>Head Lamp</th>
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

        <div class="mdl-textfield mdl-js-textfield">
          <input class="mdl-textfield__input" type="text" id="name" name="name">
          <label class="mdl-textfield__label" for="name">Full Name</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield">
          <input class="mdl-textfield__input" type="text" id="email" name="email">
          <label class="mdl-textfield__label" for="email">Email Address</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield">
          <input class="mdl-textfield__input" type="text" id="mobile" name="mobile" required>
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
          <button type="submit" style="background-color:blue;color:white" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Submit
          </button>
        </div>
      </form>

  </div>
</div>

</div>

<div style="background-color:#607D8B;border-bottom:1px solid #688491;margin-top:3%" class="row">
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

