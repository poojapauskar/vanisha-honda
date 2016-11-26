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

</style>
</head>
<body style="background-color:#E4E5E7">


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

