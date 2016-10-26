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


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <img style="width:8%;height:8%" src="images/sample_logo.jpg"></img>
      <a class="" href="#">Vanisha Honda</a>
    </div>

<ul style="margin-top:-5%;margin-left:50%" class="nav navbar-nav">
 <li class="active"><a href="#">Home</a></li>

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
     <!--  <ul class="dropdown-menu sub-menu">
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
  </ul>
</div>
</li>

      <li><a style="margin-left:14%" href="enquiry.php">Contact</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">

<div style="text-align:center !important" class="row">

<div id="slider1" class="csslider infinity">
  <input type="radio" name="slides" id="slides_1">
  <input type="radio" name="slides" id="slides_2">
  <input type="radio" name="slides" checked="checked" id="slides_3">
  <input type="radio" name="slides" id="slides_4">
  <input type="radio" name="slides" id="slides_5">
  <ul>
    <li><h2>Slide 1</h2></li>
    <li><h2>Slide 2</h2></li>
    <li>
          <div class="row">
              <div class="col-sm-6" style="text-align:center">
                <h5>Introducing the new</h5>
                <h4 style="margin-top:-5%">Vanisha Honda Android App</h5>
                <a style="margin-top:-5%" href="#">Vehicle Booking</a><br>
                <a style="margin-top:-5%" href="#">Book test ride</a>
                        <h6 >Download Now</h6>
                        <img style="width:50%;height:50%" src="images/google-play-badge.png"></img>
              </div>
              <div class="col-sm-6"  style="text-align:center">
              <img style="width:30%;height:30%" src="images/mobile.png"></img>
              </div>
            </div>
    </li>
    <li><h2>Slide 4</h2></li>
    <li><h2>Slide 5</h2></li>
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

</div>

<div class="row">
<h5>About Us</h5>
<p>In publishing and graphic design, lorem ipsum (derived from Latin dolorem ipsum, translated as "pain itself") is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation. Replacing meaningful content with placeholder text allows designers to design the form of the content before the content itself has been produced.</p>
</div>

<div style="text-align:center"  class="row">
<h5 style="text-align:left !important">Testimonials</h5>

    <div class="slideshow">
        <input type="radio" name="ss1" id="ss1-item-1" class="slideshow--bullet" checked="checked" />
        <div class="slideshow--item">
          <p>In publishing and graphic design .In publishing and graphic design</p>
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

    </div>

</div>


<div class="row">
<h5>Recent Launch</h5>
</div>

<div style="background-color:red;" class="row">
  <div style="margin-top:90px;margin-bottom:90px">
    <div class="col-sm-4" style="text-align:center">
         <div class="row">
         <img style="width:160px;height:160px" src="images/bike.jpg"></img>
         </div>
         <div class="row">
          <h6 style="color:white">Activa 125</h6>
         </div>
    </div>
    <div class="col-sm-4" style="text-align:center">
           <div class="row">
           <img style="width:160px;height:160px" src="images/bike.jpg"></img>
           </div>
           <div class="row">
            <h6 style="color:white">Activa 125</h6>
           </div>
    </div>
    <div class="col-sm-4" style="text-align:center">
           <div class="row">
           <img style="width:160px;height:160px" src="images/bike.jpg"></img>
           </div>
           <div class="row">
            <h6 style="color:white">Activa 125</h6>
           </div>
    </div>
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
<h4 style="font-size:12px;color:white;text-align:center">2016, Vanisha Honda. All rights reserver</h4>
</div>


</body>
</html>




</body>
</html>

