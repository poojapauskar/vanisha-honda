<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vanisha Honda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <script src="js/material.min.js"></script>
  <link rel="stylesheet" href="css/material.indigo-pink.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

</head>
<body ng-app="">

<div class="text-center">
  <h5>Admin Portal</h5>
</div>
  
<div class="container">
  <div class="row">

    <div class="col-sm-1">
    </div>

    <div class="col-sm-3">
        <img style="width:70%;height:70%" src="images/sample_logo.jpg"></img>
        <h4>Vanisha Honda</h4>
    </div>

    <div class="col-sm-5">
    </div>


    <div class="col-sm-2">
        <form name="myForm" method="post" action="#">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input name="myName" class="mdl-textfield__input" ng-model="myName" required>
          <span ng-show="myForm.myName.$touched && myForm.myName.$invalid">Username is required.</span>
          <label class="mdl-textfield__label" for="sample3">Username</label>
          </div>
          </p>


          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input name="myPassword" class="mdl-textfield__input" ng-model="myPassword" pattern=".{8,}" type="password" required>
          <span ng-show="myForm.myPassword.$touched && myForm.myPassword.$invalid">Password must contain atleast 8 digits.</span>
          <label class="mdl-textfield__label" for="sample3">Password</label>
          </div>
          </p>

          <br>
          <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
           Log In
          </button>

        </form>
    </div>

    <div class="col-sm-1">
    </div>

  </div>
</div>

    <!-- Textfield with Floating Label -->
    
    

</body>
</html>

