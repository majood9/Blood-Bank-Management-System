<!DOCTYPE html>
<html lang="en">

<head>

    <title>BDMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../icofont/icofont.min.css">


</head>

<body>

    <div id="wrapper">

        <?php include 'includes/nav.php'?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">BBMS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            MESSAGE BOX
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="#" method="post">

								<?php
									include 'dbconnect.php';
                                    $Donation_code = $_POST["Donation_code"];
                                            $name = $_POST["name"];
                                            $name_father = $_POST["name_father"];
                                            $name_mother = $_POST["name_mother"];
                                            $name_family = $_POST["name_family"];
                                            $national = $_POST["national"];
                                            $address = $_POST["address"];
                                            $dob = $_POST["dob"];
                                            $gender = $_POST["gender"];
                                            $age = $_POST["age"];
                                            $date_view = $_POST["date_view"];
                                            $donation_reason = $_POST["donation_reason"];
                                            $phone_number = $_POST["phone_number"];

                                            $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . '../Reception/phpqrcode-main/phpqrcode/temp' . DIRECTORY_SEPARATOR;

                                            // //html PNG location prefix
                                            $PNG_WEB_DIR = '../Reception/phpqrcode-main/phpqrcode/temp/';

                                            include "../Reception/phpqrcode-main/phpqrcode/qrlib.php";

                                            // //of course we need rights to create temp dir
                                            if (!file_exists($PNG_TEMP_DIR))
                                                mkdir($PNG_TEMP_DIR);


                                            $filename = $PNG_TEMP_DIR . 'test.png';

                                            $errorCorrectionLevel = 'H';

                                            $matrixPointSize = 10;

                                            $filename = $PNG_TEMP_DIR . 'test1' . md5($_REQUEST['national']  . '|' . $errorCorrectionLevel . '|' . $matrixPointSize)  . '.png';
                                            QRcode::png($_REQUEST['Donation_code'] . ":" . $_REQUEST['national'] .  ":" . $_REQUEST['name'] . ":" . $_REQUEST['name_father'] . ":" . $_REQUEST['name_mother'] . ":" . $_REQUEST['name_family'] .  ":" . $_REQUEST['address'] . ":" . $_REQUEST['dob'] . ":" . $_REQUEST['gender'] . ":" . $_REQUEST['age'] . ":" . $_REQUEST['date_view'] . ":" . $_REQUEST['donation_reason'] . ":" . $_REQUEST['phone_number'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

                                            $Q = file_get_contents($filename);
                                            $QR = base64_encode($Q);

										//update query
										$qry = "update donor set  name='$name', name_father='$name_father', name_mother='$name_mother', name_family='$name_family', national='$national', address='$address', dob='$dob', gender='$gender', age='$age', date_view='$date_view', phone_number='$phone_number', QR = '$QR' where national='$national'";
									    $qry1 = "update status set   date_view='$date_view', donation_reason='$donation_reason' where national='$national'";
										$result = mysqli_query($conn,$qry); //query executes
										 $result1 = mysqli_query($conn,$qry1);
                                          //query executes
										if(!$result ){
											echo"ERROR";
										}else {
											echo"<h4>SUCCESSFULLY UPDATED <span style='color: red;' >DONOR</span> DETAILS.. </h4>";
                                            ?> <br> <?php 
											// header ("Location:editblood.php");
										}
										if(!$result1 ){
											echo"ERROR";
										}else {
											echo"<h4>SUCCESSFULLY UPDATED <span style='color: blue;' >STATUS</span> DETAILS.. </h4>";
											// header ("Location:editblood.php");
										}
								?>

                                  </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>


	
	<style>
	footer{
   background-color: #424558;
    bottom: 0;
    left: 0;
    right: 0;
    height: 35px;
    text-align: center;
    color: #CCC;
}

footer p {
    padding: 10.5px;
    margin: 0px;
    line-height: 100%;
}
	</style>

</html>
