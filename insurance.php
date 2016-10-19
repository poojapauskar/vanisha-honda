<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vanisha Honda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>


<!-- datepicker -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular-animate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular-aria.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.0.4/angular-material.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-114/assets-cache.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.0.4/angular-material.css">
<script src="js/datepicker.js"></script>   

<!-- search functionality -->
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>
<link rel="stylesheet" href="css/search.css">
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/search.js"></script>

  <script src="js/material.min.js"></script>
  <link rel="stylesheet" href="css/material.indigo-pink.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>
<body ng-app="" style="overflow-x:hidden">

<div class="row">
  <div class="col-sm-4">
  <a href="admin_panel.php">
    <img style="width:13%;height:13%;margin-top:4%;margin-left:4%" src="images/sample_logo.jpg"></img>
    <h6 style="color:black;margin-top:-5%;margin-left:19%">Vanisha Honda</h6>
    <img style="width:9%;height:9%;margin-top:-23%;margin-left:48%" src="images/home.png"></img>
  </a>
  </div>
  <div class="col-sm-4" style="text-align:center">
    <h5>Insurance Renewal</h5>
  </div>
  <div class="col-sm-4">
  
 
          <!-- Navigation -->
          <nav class="mdl-navigation" style="margin-top:4%">
            <a class="mdl-navigation__link" href=""><img style="width:13%;height:13%;" src="images/bell.png"></img>Welcome User,</a>
            <a style="color:red" class="mdl-navigation__link" href="#">Logout</a>
          </nav>
        </div>
      
  </div>
</div>
  
<div class="container">
  <div class="row" style="margin-top:5%">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-2">
      <h6 style="margin-top:-8%;font-weight:bold">Recent Renewal Requests</h6>
      <form action="#" style="margin-top:-20%">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
          <label class="mdl-button mdl-js-button mdl-button--icon" for="sample6">
            <i class="material-icons">search</i>
          </label>
          <div class="mdl-textfield__expandable-holder">
            <input class="search mdl-textfield__input" type="text" id="sample6">
            <label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
          </div>
        </div>
      </form>
    </div>

    <div class="col-sm-1">
    </div>
    <div class="col-sm-5">

<html ng-app="datepickerBasicUsage">
<div ng-controller="AppCtrl" style=''>
    <md-content>
      From <md-datepicker ng-model="myDate1" md-placeholder="Enter date"></md-datepicker>
      To <md-datepicker ng-model="myDate2" md-placeholder="Enter date"></md-datepicker>
     <!--  <h4>Date-picker with min date and max date</h4>
      <md-datepicker ng-model="myDate" placeholder="Enter date"
                 md-min-date="minDate" md-max-date="maxDate"></md-datepicker> -->
    </md-content>
  </div>



    </div>
    <div class="col-sm-1">
      <button class="mdl-button mdl-js-button mdl-button--raised">
        Search
      </button>
    </div>
    <div class="col-sm-1">
      <button class="mdl-button mdl-js-button mdl-button--raised">
        Export/Print 
      </button>
    </div>
  </div>
</div>

    <!-- Textfield with Floating Label -->

<div class="row">
<!-- <div class="form-group pull-right">
<input type="text" class="search form-control" placeholder="What you looking for?">
</div> -->
<!-- <span class="counter pull-right"></span> -->
<table align="center" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp results">
  <thead>
    <tr>
      <th>Name</th>
      <th>Mobile</th>
      <th>Email</th>
      <th>Vehicle</th>
      <th>Vehicle No.</th>
      <th>Policy No.</th>
      <th>Renewal Amount</th>
      <th>Payment Date</th>
      <th>Expiry Date</th>
    </tr>
    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Jason Matt123</td>
      <td>9123456789</td>
      <td>jason@bitjini.com</td>
      <td>Pleasure</td>
      <td>hjkhk22333</td>
      <td>87979hj</td>
      <td>Rs.2000</td>
      <td>12/4/2014</td>
      <td>8/4/2015</td>
    </tr>
    <tr>
      <td>Jason Matt</td>
      <td>9123456789</td>
      <td>jason@bitjini.com</td>
      <td>Pleasure</td>
      <td>hjkhk22333</td>
      <td>87979hj</td>
      <td>Rs.2000</td>
      <td>12/4/2014</td>
      <td>8/4/2015</td>
    </tr>
    <tr>
      <td>Jason Matt</td>
      <td>9123456789</td>
      <td>jason@bitjini.com</td>
      <td>Pleasure</td>
      <td>hjkhk22333</td>
      <td>87979hj</td>
      <td>Rs.2000</td>
      <td>12/4/2014</td>
      <td>8/4/2015</td>
    </tr>
    <tr>
      <td>Jason Matt</td>
      <td>9123456789</td>
      <td>jason@bitjini.com</td>
      <td>Pleasure</td>
      <td>hjkhk22333</td>
      <td>87979hj</td>
      <td>Rs.2000</td>
      <td>12/4/2014</td>
      <td>8/4/2015</td>
    </tr>
    <tr>
      <td>Jason Matt</td>
      <td>9123456789</td>
      <td>jason@bitjini.com</td>
      <td>Pleasure</td>
      <td>hjkhk22333</td>
      <td>87979hj</td>
      <td>Rs.2000</td>
      <td>12/4/2014</td>
      <td>8/4/2015</td>
    </tr>
  </tbody>
</table>
</div>  
    

</body>
</html>

