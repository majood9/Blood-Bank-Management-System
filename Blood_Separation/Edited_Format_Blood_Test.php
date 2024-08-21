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

        <?php include 'includes/nav.php' ?>

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
                                        $Unit_Number =  $_POST['Unit_Number'];
                                        $Test_Number =  $_POST['Test_Number'];
                                        $Donation_Number =  $_POST['Donation_Number'];
                                        $Separation_Date =  $_POST['Separation_Date'];
                                        $Picking_Type =  $_POST['Picking_Type'];
                                        $Unit_Type =  $_POST['Unit_Type'];
                                        $Unit_Amount = $_POST['Unit_Amount'];

                                        $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'phpqrcode-main/phpqrcode/temp' . DIRECTORY_SEPARATOR;

                                        $PNG_WEB_DIR = 'phpqrcode-main/phpqrcode/temp/';

                                        include "phpqrcode-main/phpqrcode/qrlib.php";

                                        if (!file_exists($PNG_TEMP_DIR))
                                            mkdir($PNG_TEMP_DIR);

                                        $filename = $PNG_TEMP_DIR . 'test5.png';

                                        $errorCorrectionLevel = 'H';

                                        $matrixPointSize = 10;


                                        

                                        $filename = $PNG_TEMP_DIR . 'test5' . md5($Unit_Number  . '|' . $errorCorrectionLevel . '|' . $matrixPointSize)  . '.png';
                                        QRcode::png($Unit_Number . ":" . $Test_Number . ":" . $Donation_Number . ":" . $Separation_Date . ":" . $Picking_Type . ":" . $Unit_Amount . ":" . $Unit_Type, $filename, $errorCorrectionLevel, $matrixPointSize, 2);


                                        $Q = file_get_contents($filename);
                                        $QR = base64_encode($Q);

                                        //update query
                                        $qry = "update Blood_Separation set Unit_Amount=$Unit_Amount, QR='$QR' where Unit_Number='$Unit_Number'";
                                        $result = mysqli_query($conn, $qry); //query executes
                                        if (!$result) {
                                            echo "ERROR";
                                        } else {
                                            echo "SUCCESSFULLY UPDATED";
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
    footer {
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