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
              <ul class="dropdown-menu">
                <li>
                  <a href="book_service.php">Book Servicing</a>
                  <a href="insurance.php">Renew Insurance</a>
                  <a href="finance.php">Get Finance</a>
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
          <a class="mdl-navigation__link" href="">Products</a>
          <a class="mdl-navigation__link" href="">Services</a>
          <a class="mdl-navigation__link" href="enquiry.php">Contact Us</a>
        </nav>
      </div>

<main class="mdl-layout__content">

  <div style="margin-top:1%">
    <div style="text-align:center !important;background-color:white" class="row">
      <div id="slider1" class="csslider infinity">
        <input type="radio" name="slides" id="slides_1">
        <input type="radio" name="slides" id="slides_2">
        <input type="radio" name="slides" checked="checked" id="slides_3">
        <input type="radio" name="slides" id="slides_4">
        <input type="radio" name="slides" id="slides_5">
        <ul>
          <li><p>Slide 1</p></li>
          <li><p>Slide 2</p></li>
          <li>
                <div class="row">
                    <div class="col-sm-7" style="text-align:left;">
                      <h4 style="margin-top:5%;font-size:30px;margin-left:5%">Presenting Vanisha Honda <br> Android App</h4>
                      <h5 style="font-size:15px;margin-left:5%">Introducing the new Vanisha Honda Android App. Now the power in your hands. Featuring new vehicle booking, insurance renewal, scheduling vehicle servicing, helpline and much more.</h5>
                      <img style="width:30%;height:30%;margin-left:5%" src="images/playstore.png"></img>
                    </div>
                    <div class="col-sm-5"  style="text-align:right">
                    <img style="width:47%;height:47%;margin-right:5%;margin-top:5%" src="images/mobile_app.png"></img>
                    </div>
                  </div>
          </li>
          <li><p>Slide 4</p></li>
          <li><p>Slide 5</p></li>
        </ul>
        <div class="arrows">

        
        <!-- <img src="images/slider_btn_right.png"></img> -->

          <label for="slides_1"><img src="images/slider_btn_left.png"></img></label>
          <label for="slides_2"><img src="images/slider_btn_left.png"></img></label>
          <label for="slides_3"><img src="images/slider_btn_left.png"></img></label>
          <label for="slides_4"><img src="images/slider_btn_left.png"></img></label>
          <label for="slides_5"><img src="images/slider_btn_left.png"></img></label>
          <label for="slides_1" class="goto-first"><img src="images/slider_btn_left.png"></img></label>
          <label for="slides_5" class="goto-last"><img src="images/slider_btn_left.png"></img></label>
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
    </div>


<div class="container">
<div class="row" style="background-color:white;margin-top:5%">
<h5 id="heading">About Us</h5>
<p id="content">In publishing and graphic design, lorem ipsum (derived from Latin dolorem ipsum, translated as "pain itself") is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation. Replacing meaningful content with placeholder text allows designers to design the form of the content before the content itself has been produced.</p>
</div>


<div class="row" style="background-color:white;margin-top:5%">
<h5 id="heading">New Launched Vehicles</h5>
<div style="margin-bottom:50px;margin-top:0%">
    <div class="col-sm-3" style="text-align:center;border-right:1px solid #F0F2F7">
         <div class="row">
         <img style="width:160px;height:160px" src="images/activa.png"></img>
         </div>
         <div class="row">
          <h6 id="first_line">Activa 125</h6>
          <p id="second_line">125 cc</p>
          <h6 id="third_line">Rs. 54,899</h6>
          <p id="fourth_line">(Ex- Showroom Price)</p>
         </div>
    </div>
    <div class="col-sm-3" style="text-align:center;border-right:1px solid #F0F2F7">
           <div class="row">
           <img style="width:160px;height:160px" src="images/hornet.png"></img>
           </div>
           <div class="row">
            <h6 id="first_line">Hornet 160 R</h6>
            <p id="second_line">160 cc</p>
            <h6 id="third_line">Rs. 85,899</h6>
            <p id="fourth_line">(Ex- Showroom Price)</p>
           </div>
    </div>
    <div class="col-sm-3" style="text-align:center;border-right:1px solid #F0F2F7">
           <div class="row">
           <img style="width:160px;height:160px" src="images/navi.png"></img>
           </div>
           <div class="row">
            <h6 id="first_line">Navi</h6>
            <p id="second_line">110 cc</p>
            <h6 id="third_line">Rs. 41,691</h6>
            <p id="fourth_line">(Ex- Showroom Price)</p>
           </div>
    </div>
    <div class="col-sm-3" style="text-align:center;border-right:1px solid #F0F2F7">
           <div class="row">
           <img style="width:160px;height:160px" src="images/unicorn.png"></img>
           </div>
           <div class="row">
            <h6 id="first_line">CB Unicorn 160</h6>
            <p id="second_line">160 cc</p>
            <h6 id="third_line">Rs. 77,899</h6>
            <p id="fourth_line">(Ex- Showroom Price)</p>
           </div>
    </div>
  </div>
</div>

</div>

<div style="text-align:center;background-color:white;margin-top:5%;padding-top:30px;padding-bottom:34px" class="row">
<h5 style="text-align:center !important;font-weight:bold">What Our Customers Have To Say</h5>
<h5 style="font-size:14px;text-align:center !important;margin-top:-5px">Wings of Trust</h5>

<div class="row" style="text-align:left;margin-top:4%">
               <div class="col-sm-2">
               </div>

               <div class="col-sm-2">
                   <div class="row">
                      <div class="col-sm-4">
                        <img style="width:60px;height:60px;border-radius:50%" src="images/face.jpg"></img>
                      </div>
                      <div class="col-sm-8">
                        <p>Amit Desai</p>
                        <p style="margin-top:-14%;color:gray">IT Consultant</p>
                      </div>
                   </div>
                   <div class="row">
                      <p>"I am a happy customer for a period of 4 year. I own an Activa 3G, which I can completely rely on Vanisha Honda for any maintainence. Undivided attention to customers".</p>
                   </div>
               </div>

               <div class="col-sm-1">
               </div>

               <div class="col-sm-2">
                   <div class="row">
                      <div class="col-sm-4">
                        <img style="width:60px;height:60px;border-radius:50%" src="images/face2.jpg"></img>
                      </div>
                      <div class="col-sm-8">
                        <p>Sanjay Shah</p>
                        <p style="margin-top:-14%;color:gray">Entrepreneur</p>
                      </div>
                   </div>
                   <div class="row">
                     <p>"I am a happy customer for a period of 4 year. I own an Activa 3G, which I can completely rely on Vanisha Honda for any maintainence. Undivided attention to customers".</p>
                   </div>
               </div>

               <div class="col-sm-1">
               </div>

               <div class="col-sm-2">
                   <div class="row">
                      <div class="col-sm-4">
                        <img style="width:60px;height:60px;border-radius:50%" src="images/face3.jpg"></img>
                      </div>
                      <div class="col-sm-8">
                        <p>Ayesha Bhat</p>
                        <p style="margin-top:-14%;color:gray">Dentist</p>
                      </div>
                   </div>
                   <div class="row">
                    <p>"I am a happy customer for a period of 4 year. I own an Activa 3G, which I can completely rely on Vanisha Honda for any maintainence. Undivided attention to customers".</p>
                   </div>
               </div>

               <div class="col-sm-2">
               </div>
</div>


<!--     <div class="slideshow">
        <input type="radio" name="ss1" id="ss1-item-1" class="slideshow--bullet" checked="checked" />
        <div class="slideshow--item">
              <p>In publishing and graphic design</p>
              <label for="ss1-item-3" class="slideshow--nav slideshow--nav-previous">Go to slide 3</label>
              <label for="ss1-item-2" class="slideshow--nav slideshow--nav-next">Go to slide 2</label>
        </div>
      
       <input type="radio" name="ss1" id="ss1-item-2" class="slideshow--bullet" />
        <div class="slideshow--item">
          <p>In publishing and graphic design</p>
          <label for="ss1-item-1" class="slideshow--nav slideshow--nav-previous">Go to slide 1</label>
          <label for="ss1-item-3" class="slideshow--nav slideshow--nav-next">Go to slide 3</label>
        </div>
      
        <input type="radio" name="ss1" id="ss1-item-3" class="slideshow--bullet" />
        <div class="slideshow--item">
          <p>In publishing and graphic design .In publishing and graphic design</p>
          <label for="ss1-item-2" class="slideshow--nav slideshow--nav-previous">Go to slide 2</label>
          <label for="ss1-item-4" class="slideshow--nav slideshow--nav-next">Go to slide 4</label>
        </div>
        
        <input type="radio" name="ss1" id="ss1-item-4" class="slideshow--bullet" />
        <div class="slideshow--item">
          <p>In publishing and graphic design</p>
          <label for="ss1-item-3" class="slideshow--nav slideshow--nav-previous">Go to slide 3</label>
          <label for="ss1-item-1" class="slideshow--nav slideshow--nav-next">Go to slide 1</label>
        </div>

    </div> -->

</div>


<div style="background-color:#607D8B;margint-top:5%;border-bottom:1px solid #688491" class="row">
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
            <li>Home</li>
            <li>Products</li>
            <li>Services</li>
            <li>Contact Us</li>
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

<div style="background-color:#607D8B;margint-top:5%;border-bottom:1px solid #688491" class="row">
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
</div>



</body>
</html>




</body>
</html>

