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

if($_POST['mobile'] != ''){
  $url_finance = 'https://vanisha-honda.herokuapp.com/web_app_finance/?access_token=YbZtBg6XuWWbZ39R3BIn9Mb1XOn7uy';
  $options_finance = array(
    'http' => array(
      'header'  => array(
                          'NAME: '.$_POST['name'],
                          'EMAIL: '.$_POST['email'],
                          'MOBILE: '.$_POST['mobile'],
                          'ADDRESS: '.$_POST['address'],
                          'V-ID: '.$_POST['v_id'],
                          'LOAN-AMT: '.$_POST['loan_amt'],
                          'DOWN-PAYMENT: '.$_POST['down_payment'],
                          'PRICE: '.$_POST['price'],
                          'PAN-NO: '.$_POST['pan_no'],
                          'DATE: '.$_POST['date'],
                          ),
      'method'  => 'GET',
    ),
  );
  $context_finance = stream_context_create($options_finance);
  $output_finance = file_get_contents($url_finance, false,$context_finance);
  /*var_dump($output_types_subtypes);*/
  $arr_finance = json_decode($output_finance,true);
  if($arr_finance['status'] == 200){

            /*Upload Files*/
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 4; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }

            $names=array();
            $names[0]= $randomString.rand(0, 9999).".jpg";
            $names[1]= $randomString.rand(0, 9999).".jpg";
            $names[2]= $randomString.rand(0, 9999).".jpg";
            $names[3]= $randomString.rand(0, 9999).".jpg";
            $names[4]= $randomString.rand(0, 9999).".jpg";


            /*Get Signed Urls*/
            $url = 'https://vanisha-honda.herokuapp.com/get_signed_url/?access_token=YbZtBg6XuWWbZ39R3BIn9Mb1XOn7uy';
            $data = array('image_list' => [$names[0],$names[1],$names[2],$names[3],$names[4]]);

            $options = array(
              'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'PUT',
                'content' => json_encode($data),
              ),
            );
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            $arr = json_decode($result,true);

            /*echo $arr[0]['url'];*/

            $type=["id_proof","add_proof","bank_statement","salary_slip","it_returns"];

            /*Upload Images in signed urls*/
            for($i=0;$i<count($arr);$i++){

                /*echo $arr[$i]['url'];*/
                $url_upload = $arr[$i]['url'];
                $filename = $_FILES[$type[$i]]["tmp_name"];
                $file = fopen($filename, "rb");
                $data = fread($file, filesize($filename));

                $options_upload = array(
                  'http' => array(
                    'header'  => "Content-type: \r\n",
                    'method'  => 'PUT',
                    'content' => $data,
                  ),
                );
                $context_upload  = stream_context_create($options_upload);
                $result_upload = file_get_contents($url_upload, false, $context_upload);
                /*var_dump($result_upload);*/
                $arr_upload = json_decode($result_upload,true);
                /*var_dump($arr_upload);*/


                /*Update Documents Table*/
                $url_update_doc_tab = 'https://vanisha-honda.herokuapp.com/documents/?access_token=YbZtBg6XuWWbZ39R3BIn9Mb1XOn7uy';
                $data_update_doc_tab = array('user_id' => $arr_finance['user_id'],'link' => $arr[$i]['url'],'document_name' => $names[$i],'document_type' => $type[$i]);

                $options_update_doc_tab = array(
                  'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data_update_doc_tab),
                  ),
                );
                $context_update_doc_tab  = stream_context_create($options_update_doc_tab);
                $result_update_doc_tab = file_get_contents($url_update_doc_tab, false, $context_update_doc_tab);
                $arr_update_doc_tab = json_decode($result_update_doc_tab,true);

            }

            echo "<script>alert('New Finance Request Created')</script>";
  }
}
?>

<!-- datepicker -->
<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-ui.js"></script>
  <script>
  $(function() {
    $( ".date" ).datepicker({ dateFormat: 'dd/mm/yy' });
  });
  </script>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <img style="width:8%;height:8%" src="images/sample_logo.jpg"></img>
      <a class="" href="#">Vanisha Honda</a>
    </div>

<ul style="margin-top:-5%;margin-left:50%" class="nav navbar-nav">
 <li class="active"><a href="index.php">Home</a></li>

<li>
<div class="dropdown" style="margin-left:10%">
  <a href="#" class="btn dropdown-toggle" data-toggle="dropdown">Products<span class="caret"></span></a>
  <ul class="dropdown-menu">
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
      <a class="trigger right-caret" href="finance.php">Renew Insurance</a>
      <a class="trigger right-caret" href="finance.php">Get Finance</a>
  </ul>
</div>
</li>
      <li><a style="margin-left:14%" href="customer_services.php">Services</a></li>
      <li><a style="margin-left:14%" href="enquiry.php">Contact</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
<h5 style="margin-top:-1%;color:red;text-align:center">Get Finance</h5>

<div class="row">
  <div class="col-sm-6">
    <img style="width:150px;height:150px" src="images/book_service.png"></img>
  </div>

  <div class="col-sm-6">
      <form action="#" method="post" enctype="multipart/form-data">
      

         <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="name" name="name">
            <label class="mdl-textfield__label" for="name">Name</label>
          </div>

          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="email" name="email">
            <label class="mdl-textfield__label" for="email">Email</label>
          </div>

          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="mobile" name="mobile">
            <label class="mdl-textfield__label" for="mobile">Mobile</label>
          </div>

          <div style="margin-top:-5%" class="mdl-textfield mdl-js-textfield">
            <textarea class="mdl-textfield__input" type="text" rows= "3" id="address" name="address"></textarea>
            <label class="mdl-textfield__label" for="address">Address</label>
          </div>

          <div class="demo">
            <!-- Standard Select -->
            <div class="mdl-selectfield">
                  <label>Select Vehicle Model</label>
                  <select class="browser-default" name="v_id" id="v_id">
                      <?php for($x=0;$x<count($arr_types_subtypes);$x++){?>
                        <option value="" disabled selected><?php echo $arr_types_subtypes[$x]['vehicle_type'] ?></option>
                          <?php for($y=0;$y<count($arr_types_subtypes[$x]['subtype']);$y++){?>
                            <option value="<?php echo $arr_types_subtypes[$x]['subtype'][$y]['v_id'] ?>"><?php echo $arr_types_subtypes[$x]['subtype'][$y]['vehicle'] ?></option>
                          <?php } ?>
                      <?php } ?>
                  </select>
                </div>
          </div>

          <div style="align:left;margin-top:-2%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="loan_amt" name="loan_amt">
            <label class="mdl-textfield__label" for="loan_amt">Loan Amount</label>
          </div>

          <div style="align:left;margin-top:-2%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="down_payment" name="down_payment">
            <label class="mdl-textfield__label" for="down_payment">Down Payment</label>
          </div>

          <div style="align:left;margin-top:-2%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="price" name="price">
            <label class="mdl-textfield__label" for="price">Price</label>
          </div>

<br>


          <div style="align:left;margin-top:-2%" class="mdl-textfield mdl-js-textfield">
            <input class="mdl-textfield__input" type="text" id="pan_no" name="pan_no">
            <label class="mdl-textfield__label" for="pan_no">PAN</label>
          </div>
<br>
          ID Proof: <input type="file" id="id_proof" name="id_proof" required>
          Add. Proof: <input type="file" id="add_proof" name="add_proof" required>
          6 Months Bank Statement: <input type="file" id="bank_statement" name="bank_statement" required>
          Salary Slip: <input type="file" id="salary_slip" name="salary_slip" required>
          IT Returns: <input type="file" id="it_returns" name="it_returns" required>

          <br>

<input class="mdl-textfield__input" type="hidden" id="date" name="date">

          <button type="submit" style="background-color:red;color:white" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
            Get Approval
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
<h4 style="font-size:12px;color:white;text-align:center">2016, Vanisha Honda. All rights reserved</h4>
</div>

</body>
</html>




</body>
</html>

