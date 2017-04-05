<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="16x16" href="images/honda_logo_red.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--select field-->
  <link rel="stylesheet" href="https://code.getmdl.io/1.1.1/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>   
  <link rel="stylesheet" href="css/mdl.css">
     
<script defer src="https://rawgit.com/MEYVN-digital/mdl-selectfield/master/mdl-selectfield.min.js"></script>   


 <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <link rel="stylesheet" href="css/material.indigo.min.css">
<!-- Code for File Upload-->
  <script src="js/ajaxmaterial.js"></script>
  <link rel="stylesheet" type="text/css" href="css/inputfileclasses.css">
<!-- End of importing -->
  <link rel="stylesheet" href="css/slideshow.css">
  <script type="scoped.json"></script>
  <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
  <link rel="stylesheet" href="css/material.indigo.min.css">
    <!-- Material Design icon font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/vanisha-honda.css">
  <script src="js/index.js"></script>
  <style type="text/css">
    .mdl-textfield__input {
    border: none;
    border-bottom: 1px solid rgba(0, 0, 0, .12);
    display: block;
    font-size: 15px;
    font-family: "Helvetica", "Arial", sans-serif;
    margin: 0;
    padding: 4px 0;
    width: 100%;
    background: 0 0;
    text-align: left;
    color: inherit;
}
  </style>

</head>
<body  style="background-color:#E4E5E7;overflow-x:hidden;overflow-y: hidden">

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
if(($_POST['mobile'] == '' || $_POST['mobile'] == 'null') &&  isset($_POST['finance_btn'])){
  $error_message="Mobile field is required";
}elseif(preg_match('/[A-Za-z]/', $_POST['mobile'])  && isset($_POST['finance_btn'])) {
  $error_message="Mobile no must contain only digits";
}elseif( (strlen(preg_replace("/[^0-9]/","",$_POST['mobile'])) >15 || strlen(preg_replace("/[^0-9]/","",$_POST['mobile'])) <10) && isset($_POST['finance_btn']) ) {
  $error_message="Mobile no. must contain 10-15 digits";
}elseif( $_POST['email'] != '' && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['finance_btn']) ) {
  $error_message="Email id not valid";
}elseif(($_POST['v_id'] == '' || $_POST['v_id'] == 'null') &&  isset($_POST['finance_btn'])){
  $error_message="Select a Vehicle";
}elseif(($_POST['loan_amt'] == '' || $_POST['loan_amt'] == 'null') &&  isset($_POST['finance_btn'])){
  $error_message="Loan Amount is required";
}elseif(($_POST['down_payment'] == '' || $_POST['down_payment'] == 'null') &&  isset($_POST['finance_btn'])){
  $error_message="Down Payment is required";
}elseif(($_POST['price'] == '' || $_POST['price'] == 'null') &&  isset($_POST['finance_btn'])){
  $error_message="Price is required";
}elseif(($_POST['pan_no'] == '' || $_POST['pan_no'] == 'null') &&  isset($_POST['finance_btn'])){
  $error_message="Pan No. is required";
}elseif(!preg_match('/^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/', $_POST['pan_no'])  && isset($_POST['finance_btn'])) {
  $error_message="Invalid Pan No.";
}elseif(($_POST['id_proof'] == '' || $_POST['id_proof'] == 'null') &&  isset($_POST['finance_btn'])){
  $error_message="Id Proof is required";
}elseif(($_POST['add_proof'] == '' || $_POST['add_proof'] == 'null') &&  isset($_POST['finance_btn'])){
  $error_message="Address Proof is required";
}elseif(($_POST['bank_statement'] == '' || $_POST['bank_statement'] == 'null') &&  isset($_POST['finance_btn'])){
  $error_message="Bank Statement is required";
}elseif(($_POST['salary_slip'] == '' || $_POST['salary_slip'] == 'null') &&  isset($_POST['finance_btn'])){
  $error_message="Salary Slip is required";
}elseif(($_POST['it_returns'] == '' || $_POST['it_returns'] == 'null') &&  isset($_POST['finance_btn'])){
  $error_message="IT Returns is required";
}elseif(isset($_POST['finance_btn'])){
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
            $_POST = array();
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

<div class="demo-layout-transparent mdl-layout mdl-js-layout">
      <header style="background-color:#F1524B;height:110px;-webkit-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;  /* Chrome and Safari         */
     -moz-box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;  /* Firefox 3.6               */
     box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23) !important;" class="mdl-layout__header mdl-layout__header--transparent">
        <div class="mdl-layout__header-row" style="margin-top:4.5%">
          <!-- Title -->

          <img style="margin-top:-3.8%;margin-left:30px;" src="images/honda_logo_white.png" width="60" height="60"></img>

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
<div class="row" style="margin-top:6%;margin-left:3%">
  <div class="col-sm-6" style="margin-top:-4%">
    <h4>Get Finance</h4>
    <img style="width:150px;height:150px" src="images/Finance_2.png"></img>
    <p style="font-size:13px;margin-top:2%">In publishing and graphic design, lorem ipsum (derived from Latin dolorem ipsum, translated as "pain itself") is a filler text commonly used to demonstrate the graphic elements of a document or visual presentation. Replacing meaningful content with placeholder text allows designers to design the form of the content before the content itself has been produced.</p>
  </div>

  <div class="col-sm-5" style="margin-top:-1%;margin-left:5%">
      <form action="finance.php" method="post" style="background-color:white;width:300px;padding:2px 10px 10px 10px">
        
          <h6 style="font-size:18px">Get Finance</h6>
          <p style="color:red;text-align:left"><?php echo $error_message ;?></p>
      

         <div style="margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="<?php echo $_POST['name']; ?>" class="mdl-textfield__input" type="text" id="name" name="name" placeholder="FullName">
            <label class="mdl-textfield__label" for="name" style="color:#cccccc;">Name</label>
          </div>

          <div style="margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="<?php echo $_POST['email']; ?>" class="mdl-textfield__input" type="text" id="email" name="email" placeholder="Email Address">
            <label class="mdl-textfield__label" for="email" style="color:#cccccc;">Email</label>
          </div>

          <div style="margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="<?php echo $_POST['mobile']; ?>" class="mdl-textfield__input" type="text" id="mobile" name="mobile" placeholder="+91">
            <label class="mdl-textfield__label" for="mobile" style="color:#cccccc;">Mobile</label>
          </div>

          <div style="margin-top:-2%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <textarea class="mdl-textfield__input" style="margin-bottom:0%;" type="text" rows= "1" id="address" name="address" placeholder="Address"><?php echo $_POST['address']; ?></textarea>
            <label class="mdl-textfield__label" for="address" style="color:#cccccc;">Address</label>
          </div>
<!-- Added label over the SelectField -->
          <div class="demo" >
           <label class="mdl-selectfield__label" for="v_id" style="color:#cccccc;margin-top:61%;margin-left:5%;font-size:13px;">Vehicle</label>
               <div style="align:left;margin-top:-6%;" class="mdl-selectfield mdl-js-selectfield mdl-selectfield--floating-label" >
              <select style="" class="mdl-selectfield__select" name="v_type" id="v_type">
                
                      
<?php

if($_POST['v_id'] != ''){
  $url_details_of_selected_vehicle = 'http://vanisha-honda.herokuapp.com/get_details_of_selected_vehicle/?access_token=YbZtBg6XuWWbZ39R3BIn9Mb1XOn7uy';
  $options_details_of_selected_vehicle = array(
    'http' => array(
      'header'  => array(
                     'V-ID: '.$_POST['v_id'],
                   ),
      'method'  => 'GET',
    ),
  );
  $context_details_of_selected_vehicle = stream_context_create($options_details_of_selected_vehicle);
  $output_details_of_selected_vehicle = file_get_contents($url_details_of_selected_vehicle, false,$context_details_of_selected_vehicle);
  /*var_dump($output_details_of_selected_vehicle);*/
  $arr_details_of_selected_vehicle = json_decode($output_details_of_selected_vehicle,true);
  /*echo $arr_details_of_selected_vehicle[0]['v_details']['vehicle'];*/
}
?>
                      <?php if($_POST['v_id'] != ''){?>
                       <option value="<?php echo $_POST['v_id'] ?>" selected><?php echo $arr_details_of_selected_vehicle[0]['v_details']['vehicle']; 
                      }else{?>
                       <option value="" disabled selected><?php echo "Select Vehicle Model"; }?>


                      <?php for($x=0;$x<count($arr_types_subtypes);$x++){?>
                        <option style="color:#F1524B" value="" disabled><?php echo $arr_types_subtypes[$x]['vehicle_type'] ?></option>
                          <?php for($y=0;$y<count($arr_types_subtypes[$x]['subtype']);$y++){?>
                            <option value="<?php echo $arr_types_subtypes[$x]['subtype'][$y]['v_id'] ?>"><?php echo $arr_types_subtypes[$x]['subtype'][$y]['vehicle'] ?></option>
                          <?php } ?>
                      <?php } ?>


                  </select>
                </div>
          </div>
<br>
          <div style="align:left;margin-top:-13%;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="loan_amt" style="color:#cccccc;">Loan Amount</label>
            <input value="<?php echo $_POST['loan_amt']; ?>" class="mdl-textfield__input" type="text" id="loan_amt" name="loan_amt" placeholder="Loan Amt">
          </div>

          <div style="align:left;margin-top:-4%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="down_payment" style="color:#cccccc;">Down Payment</label>
            <input value="<?php echo $_POST['down_payment']; ?>" class="mdl-textfield__input" type="text" id="down_payment" name="down_payment" placeholder="Down payment">
          </div>

          <div style="align:left;margin-top:-4%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"> 
             <label class="mdl-textfield__label" for="price" style="color:#cccccc;">Price</label>
            <input value="<?php echo $_POST['price']; ?>" class="mdl-textfield__input" type="text" id="price" name="price" placeholder="price">
          </div>

<br>


          <div style="align:left;margin-top:-4%" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <label class="mdl-textfield__label" for="pan_no" style="color:#cccccc;">PAN</label>
            <input value="<?php echo $_POST['pan_no']; ?>" class="mdl-textfield__input" type="text" id="pan_no" name="pan_no" placeholder="PAN">
          </div>
<br>

  <div style="align:left;margin-top:4%;" class=" file-field input-field " >
<label class="mdl-textfield__label" style="margin-top:-10%" for="id_proof" style="color:#cccccc;">ID Proof</label>
      <div class="btn1 mdl-button--raised"  style="background-color: #f1524b;" >
        <span style="margin-left:-1%;position:absolute;margin-top:-1%;">Upload</span>
        <input type="file" id="id_proof" name="id_proof">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text1" placeholder="No file Choosen">
      </div>
  </div>

          <!-- <div style="align:left;margin-top:5%" class="mdl-textfield mdl-js-textfield">
            <input type="file" id="add_proof" name="add_proof">
            <label class="mdl-textfield__label" style="margin-top:-10%" for="add_proof" style="color:#cccccc;">Address Proof</label>
          </div> -->
               <div style="align:left;margin-top:5%;" class=" file-field input-field " >
              <label class="mdl-textfield__label" style="margin-top:-10%" for="add_proof" style="color:#cccccc;">Address Proof</label>
             <div class="btn1 mdl-button--raised"  style="background-color: #f1524b;" >
             <span style="margin-left:-1%;position:absolute;margin-top:-1%;">Upload</span>
              <input type="file" id="add_proof" name="add_proof">
             </div>
           <div class="file-path-wrapper">
              <input class="file-path validate" type="text1" placeholder="No file Choosen">
            </div>
          </div>


          <!-- <div style="align:left;margin-top:5%" class="mdl-textfield mdl-js-textfield">
            <label class="mdl-textfield__label" style="margin-top:-10%" for="bank_statement" style="color:#cccccc;">Bank Statement</label>
            <input type="file" id="bank_statement" name="bank_statement" placeholder="Bank Details">
            
          </div> -->
            <div style="align:left;margin-top:5%;" class=" file-field input-field " >
              <label class="mdl-textfield__label" style="margin-top:-10%" for="bank_statement" style="color:#cccccc;">Bank Statement</label>
             <div class="btn1 mdl-button--raised"  style="background-color: #f1524b;">
             <span style="margin-left:-1%;position:absolute;margin-top:-1%;">Upload</span>
              <input type="file" id="bank_statement" name="bank_statement">
             </div>
           <div class="file-path-wrapper">
              <input class="file-path validate" type="text1" placeholder="No file Choosen">
            </div>
          </div>


          <!-- <div style="align:left;margin-top:5%" class="mdl-textfield mdl-js-textfield">
            <label class="mdl-textfield__label" style="margin-top:-10%" for="salary_slip" style="color:#cccccc;">Salary Slip</label>
            <input type="file" id="salary_slip" name="salary_slip" placeholder="Salary Slip">
          </div> -->
            <div style="align:left;margin-top:5%;" class=" file-field input-field " >
              <label class="mdl-textfield__label" style="margin-top:-10%" for="salary_slip" style="color:#cccccc;">Salary Slip</label>
              <div class="btn1 mdl-button--raised"  style="background-color: #f1524b;" >
             <span style="margin-left:-1%;position:absolute;margin-top:-1%;">Upload</span>
        
              <input type="file" id="salary_slip" name="salary_slip">
             </div>
           <div class="file-path-wrapper">
              <input class="file-path validate" type="text1" placeholder="No file Choosen">
            </div>
          </div>


         <!--  <div style="align:left;margin-top:5%" class="mdl-textfield mdl-js-textfield">
            <label class="mdl-textfield__label" style="margin-top:-10%" for="it_returns" style="color:#cccccc;">IT Returns</label>
            <input type="file" id="it_returns" name="it_returns" placeholder="IT Returns">
          </div>-->

            <div style="align:left;margin-top:5%;" class=" file-field input-field " >
              <label class="mdl-textfield__label" style="margin-top:-10%" for="it_returns" style="color:#cccccc;">Address Proof</label>
             <div class="btn1 mdl-button--raised"  style="background-color: #f1524b;">
             <span style="margin-left:-1%;position:absolute;margin-top:-1%;">Upload</span>
              <input type="file" id="it_returns" name="it_returns">
             </div>
           <div class="file-path-wrapper">
              <input class="file-path validate" type="text1" placeholder="No file Choosen">
            </div>
          </div>

        <input class="mdl-textfield__input" type="hidden" id="date" name="date">

          <div style="text-align:right">
          <button type="submit" id="finance_btn" name="finance_btn" style="background-color:#fff;color: rgb(0, 0, 255);" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised
          ">
            Get Approval
          </button>
          </div>

      </form>
  </div>
</div>
</div>

  
<div style="background-color:#607D8B;border-bottom:1px solid #688491;margin-top:11%" class="mdl-mini-footer">
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
  <div class="col-sm-2" style="color:#FFFFFF;text-align:right">
      <ul id="ul2">
                 <li><a href="https://twitter.com/" target="_blank">
            <img src="images/twitter.png" /></a></li>
            <li><a href="https://www.facebook.com/" target="_blank"><img src="images/facebook.png"></img></a></li>
            <li><a href="https://plus.google.com/" target="_blank"> 
            <img src="images/google-plus.png"></img></a></li>

        </ul>
  </div>
  <div class="col-sm-1">
  </div>
</div>

<div style="background-color:#607D8B;margint-top:5%;border-bottom:1px solid #688491" class="mdl-mini-footer">
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
