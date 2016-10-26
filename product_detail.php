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
  <link rel="stylesheet" href="css/style2.css">
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
     <a class="trigger right-caret" href="product_types.php">All Products</a>
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
      <li><a style="margin-left:14%" href="customer_services.php">Services</a></li>
      <li><a style="margin-left:14%" href="enquiry.php">Contact</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">

<div class="row" style="">
      <div class="col-sm-6">
      <h3>Honda Activa 3g</h3>
      <h6>60 Km/L Milage<br>
      1 year Warranty<br>
      New Colours<br>
      And a lot more.</h6> 
      <h3 style="color:yellow">Book Test Ride Now</h3>
      </div>

      <div class="col-sm-6">
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
      </div>
</div>

<div class="row">
<h5>About Us</h5>
<p>In publishing and graphic design, lorem ipsum (derived from Latin dolorem ipsum, translated as "pain itself") is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation. Replacing meaningful content with placeholder text allows designers to design the form of the content before the content itself has been produced.</p>
</div>

<div class="row">
  <div class="col-sm-6">
   <h5>Specifications</h5>
        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
            <tr>
              <th>Material</th>
              <td>Teflon
            </tr>
            <tr>
              <th>Material</th>
              <td>Teflon
            </tr>
            <tr>
              <th>Material</th>
              <td>Teflon
            </tr>
            <tr>
              <th>Material</th>
              <td>Teflon
            </tr>
        </table>
  </div>

  <div class="col-sm-6">

      <form action="#">
        <div class="mdl-textfield mdl-js-textfield">
          <input class="mdl-textfield__input" type="text" id="sample1">
          <label class="mdl-textfield__label" for="sample1">Enter Email</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield">
          <input class="mdl-textfield__input" type="text" id="sampl2">
          <label class="mdl-textfield__label" for="sample2">Enter Mobile</label>
        </div>
        <br>
        <button style="background-color:red" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
          Get Quote
        </button>
      </form>

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

