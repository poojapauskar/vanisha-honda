<!DOCTYPE html>
<html>
<head>

   <!-- Material Design Lite -->
    <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
    <!-- Material Design icon font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
<body style="background-color:#E4E5E7;overflow-x:hidden">


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
/*echo $_GET['type_id'];*/
$url_vehicles_of_particular_type = 'https://vanisha-honda.herokuapp.com/get_all_vehicles_of_particular_type/?access_token=YbZtBg6XuWWbZ39R3BIn9Mb1XOn7uy';
$options_vehicles_of_particular_type = array(
  'http' => array(
    'header'  => array(
                    'TYPE-ID: '.$_GET['type_id'],
                 ),
    'method'  => 'GET',
  ),
);
$context_vehicles_of_particular_type = stream_context_create($options_vehicles_of_particular_type);
$output_vehicles_of_particular_type = file_get_contents($url_vehicles_of_particular_type, false,$context_vehicles_of_particular_type);
/*var_dump($output_vehicles_of_particular_type);*/
$arr_vehicles_of_particular_type = json_decode($output_vehicles_of_particular_type,true);
/*echo count($arr_vehicles_of_particular_type[0]['v_details']);*/
?>

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header style="background-color:#F1524B;height:110px;-webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;  /* Chrome and Safari         */
     -moz-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;  /* Firefox 3.6               */
     box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;" class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row" style="margin-top:4.5%">
          <!-- Title -->
          <img style="margin-top:-3.8%;margin-left:40px;" src="images/honda_logo_white.png" width="60" height="60"></img>
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
                <li><a href="book_service.php" id="service">Book Servicing</a></li>
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

<div class="row" style="margin-top:6%;text-align:center">
  <?php for($x=0;$x<count($arr_vehicles_of_particular_type);$x++){
    /*echo $arr_vehicles_of_particular_type[1]['v_details']['v_id'];
    echo $arr_vehicles_of_particular_type[1]['image_details']['link'];*/
    $image_url="http://res.cloudinary.com/hb3ayjpuz/image/upload/v1478944737/vanishahonda/".$arr_vehicles_of_particular_type[$x]['image_details']['link'];
    /*echo $image_url;echo "<br>"*/?>
    <div class="col-sm-4" style="margin-bottom:5%">
      <a href="product_detail.php?v_id=<?php echo $arr_vehicles_of_particular_type[$x]['v_details']['v_id']?>">
        <img style="width:220px;height:220px" src="<?php echo $image_url;?>"></img>
      </a>
    </div> 
  <?php } ?>
</div>


</div>
<div style="background-color:#607D8B;border-bottom:1px solid #688491;margin-top:3%" class="mdl-mini-footer">
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
                     <li><a href="https://twitter.com/">
            <img src="images/twitter.png" /></a></li>
            <li><a href="https://www.facebook.com/"><img src="images/facebook.png"></img></a></li>
            <li><a href="https://plus.google.com/"> 
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
        <ul id="ul3" style="list-style: none;margin-left:-14%;font:italic 13px Roboto,sans-serif;">
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

