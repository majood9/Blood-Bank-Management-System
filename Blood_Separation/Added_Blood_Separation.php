<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BBMS</title>

    <!-- روابط CSS اللازمة -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../icofont/icofont.min.css">

    <!-- HTML5 Shim و Respond.js لدعم عناصر HTML5 واستجابة المستعرض IE8 -->
    <!-- تحذير: لا يعمل Respond.js إذا تم عرض الصفحة من خلال file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="wrapper">
        <!-- شريط التنقل -->
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





                                        // التحقق مما إذا تم النقر على زر الإرسال في النموذج
                                        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                            // جمع البيانات من النموذج
                                            $Test_Number = $_POST["Test_Number"];
                                            $national = $_POST["national"];
                                            $Donation_Number = $_POST["Donation_Number"];
                                            $Separation_Date = $_POST["Separation_Date"];
                                            $Picking_Type = $_POST["Picking_Type"];
                                            $volume0 = $_POST["volume0"];
                                            $volume1 = $_POST["volume1"];
                                            $volume2 = $_POST["volume2"];
                                            $volume3 = $_POST["volume3"];



                                            if ($volume0 != null || $volume1 != null || $volume2 != null) {
                                                $Unit_Type = 'RPC';
                                                $Unit_Amount = $volume0;
                                                $Unit_Type1 = 'FFP';
                                                $Unit_Amount1 = $volume1;
                                                $Unit_Type2 = 'PU';
                                                $Unit_Amount2 = $volume2;

                                                $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'phpqrcode-main/phpqrcode/temp' . DIRECTORY_SEPARATOR;

                                                $PNG_WEB_DIR = 'phpqrcode-main/phpqrcode/temp/';

                                                include "phpqrcode-main/phpqrcode/qrlib.php";

                                                if (!file_exists($PNG_TEMP_DIR))
                                                    mkdir($PNG_TEMP_DIR);


                                                $PNG_TEMP_DIR1 = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'phpqrcode-main-FFP/phpqrcode/temp' . DIRECTORY_SEPARATOR;

                                                $PNG_WEB_DIR1 = 'phpqrcode-main-FFP/phpqrcode/temp/';

                                                include "phpqrcode-main/phpqrcode-FFP/qrlib.php";

                                                if (!file_exists($PNG_TEMP_DIR1))
                                                    mkdir($PNG_TEMP_DIR1);


                                                $PNG_TEMP_DIR2 = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'phpqrcode-main-PU/phpqrcode/temp' . DIRECTORY_SEPARATOR;

                                                $PNG_WEB_DIR2 = 'phpqrcode-main-PU/phpqrcode/temp/';

                                                include "phpqrcode-main/phpqrcode-PU/qrlib.php";

                                                if (!file_exists($PNG_TEMP_DIR2))
                                                    mkdir($PNG_TEMP_DIR2);


                                                $filename = $PNG_TEMP_DIR . 'test1.png';
                                                $filename1 = $PNG_TEMP_DIR1 . 'test2.png';
                                                $filename1 = $PNG_TEMP_DIR1 . 'test3.png';

                                                $errorCorrectionLevel = 'H';

                                                $matrixPointSize = 10;


                                                $uniqueId = sprintf("SE%08d", mt_rand(1, 99999));
                                                $Unit_Number = $uniqueId;

                                                $uniqueId1 = sprintf("SE%08d", mt_rand(1, 99999));
                                                $Unit_Number1 = $uniqueId1;

                                                $uniqueId2 = sprintf("SE%08d", mt_rand(1, 99999));
                                                $Unit_Number2 = $uniqueId2;

                                                $filename = $PNG_TEMP_DIR . 'test1' . md5($Unit_Number  . '|' . $errorCorrectionLevel . '|' . $matrixPointSize)  . '.png';
                                                QRcode::png($Unit_Number . ":" . $_REQUEST['Test_Number'] . ":" . $_REQUEST['Donation_Number'] . ":" . $_REQUEST['Separation_Date'] . ":" . $_REQUEST['Picking_Type'] . ":" . $_REQUEST['volume0'] . ":" . $Unit_Type, $filename, $errorCorrectionLevel, $matrixPointSize, 2);

                                                $filename1 = $PNG_TEMP_DIR1 . 'test2' . md5($Unit_Number1  . '|' . $errorCorrectionLevel . '|' . $matrixPointSize)  . '.png';
                                                QRcode::png($Unit_Number1 . ":" . $_REQUEST['Test_Number'] . ":" . $_REQUEST['Donation_Number'] . ":" . $_REQUEST['Separation_Date'] . ":" . $_REQUEST['Picking_Type'] . ":" . $_REQUEST['volume1'] . ":" . $Unit_Type1, $filename1, $errorCorrectionLevel, $matrixPointSize, 2);

                                                $filename2 = $PNG_TEMP_DIR2 . 'test3' . md5($Unit_Number2  . '|' . $errorCorrectionLevel . '|' . $matrixPointSize)  . '.png';
                                                QRcode::png($Unit_Number2 . ":" . $_REQUEST['Test_Number'] . ":" . $_REQUEST['Donation_Number'] . ":" . $_REQUEST['Separation_Date'] . ":" . $_REQUEST['Picking_Type'] . ":" . $_REQUEST['volume2'] . ":" . $Unit_Type2, $filename2, $errorCorrectionLevel, $matrixPointSize, 2);


                                                $Q = file_get_contents($filename);
                                                $QR = base64_encode($Q);

                                                $Q1 = file_get_contents($filename1);
                                                $QR1 = base64_encode($Q1);

                                                $Q2 = file_get_contents($filename2);
                                                $QR2 = base64_encode($Q2);

                                                include "dbconnect.php";

                                                if ($volume0 != null && $volume1 != null && $volume2 != null) {



                                                    // الاتصال بقاعدة البيانات وإعداد استعلام SQL لإدخال بيانات المتبرع في قاعدة البيانات
                                                    $qry = "insert into Blood_Separation (Unit_Number,Separation_Date,Picking_Type,Unit_Type,Unit_Amount,QR,Test_Number,Donation_Number) values ('$Unit_Number','$Separation_Date','$Picking_Type','$Unit_Type','$Unit_Amount','$QR','$Test_Number','$Donation_Number')";
                                                    $result = mysqli_query($conn, $qry); // تنفيذ الاستعلام

                                                    if (!$result) {

                                                        echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                    } else {
                                                        echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (RPC) </h4>";
                                                        echo '<a href="uploadPrint.php?Unit_Number=' . $Unit_Number . '"> <h5>Go To Print QR Code (RPC)</h5> </a>';
                                                        echo '<hr>';
                                                    }


                                                    $qry1 = "insert into Blood_Separation (Unit_Number,Separation_Date,Picking_Type,Unit_Type,Unit_Amount,QR,Test_Number,Donation_Number) values ('$Unit_Number1','$Separation_Date','$Picking_Type','$Unit_Type1','$Unit_Amount1','$QR1','$Test_Number','$Donation_Number')";
                                                    $result1 = mysqli_query($conn, $qry1); // تنفيذ الاستعلام

                                                    if (!$result1) {

                                                        echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                    } else {
                                                        echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (RPC) </h4>";
                                                        echo '<a href="uploadPrint.php?Unit_Number=' . $Unit_Number1 . '"> <h5>Go To Print QR Code (RPC)</h5> </a>';
                                                        echo '<hr>';
                                                    }



                                                    $qry2 = "insert into Blood_Separation (Unit_Number,Separation_Date,Picking_Type,Unit_Type,Unit_Amount,QR,Test_Number,Donation_Number) values ('$Unit_Number2','$Separation_Date','$Picking_Type','$Unit_Type2','$Unit_Amount2','$QR2','$Test_Number','$Donation_Number')";
                                                    $result2 = mysqli_query($conn, $qry2); // تنفيذ الاستعلام

                                                    if (!$result2) {

                                                        echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                    } else {
                                                        echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (RPC) </h4>";
                                                        echo '<a href="uploadPrint.php?Unit_Number=' . $Unit_Number2 . '"> <h5>Go To Print QR Code (RPC)</h5> </a>';
                                                        echo '<hr>';
                                                    }
                                                } elseif ($volume0 == null && $volume1 != null && $volume2 != null) {
                                                    $qry1 = "insert into Blood_Separation (Unit_Number,Separation_Date,Picking_Type,Unit_Type,Unit_Amount,QR,Test_Number,Donation_Number) values ('$Unit_Number1','$Separation_Date','$Picking_Type','$Unit_Type1','$Unit_Amount1','$QR1','$Test_Number','$Donation_Number')";
                                                    $result1 = mysqli_query($conn, $qry1); // تنفيذ الاستعلام

                                                    if (!$result1) {

                                                        echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                    } else {
                                                        echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (RPC) </h4>";
                                                        echo '<a href="uploadPrint.php?Unit_Number=' . $Unit_Number1 . '"> <h5>Go To Print QR Code (RPC)</h5> </a>';
                                                        echo '<hr>';
                                                    }



                                                    $qry2 = "insert into Blood_Separation (Unit_Number,Separation_Date,Picking_Type,Unit_Type,Unit_Amount,QR,Test_Number,Donation_Number) values ('$Unit_Number2','$Separation_Date','$Picking_Type','$Unit_Type2','$Unit_Amount2','$QR2','$Test_Number','$Donation_Number')";
                                                    $result2 = mysqli_query($conn, $qry2); // تنفيذ الاستعلام

                                                    if (!$result2) {

                                                        echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                    } else {
                                                        echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (RPC) </h4>";
                                                        echo '<a href="uploadPrint.php?Unit_Number=' . $Unit_Number2 . '"> <h5>Go To Print QR Code (RPC)</h5> </a>';
                                                        echo '<hr>';
                                                    }
                                                } elseif ($volume0 != null && $volume1 == null && $volume2 != null) {
                                                    $qry = "insert into Blood_Separation (Unit_Number,Separation_Date,Picking_Type,Unit_Type,Unit_Amount,QR,Test_Number,Donation_Number) values ('$Unit_Number','$Separation_Date','$Picking_Type','$Unit_Type','$Unit_Amount','$QR','$Test_Number','$Donation_Number')";
                                                    $result = mysqli_query($conn, $qry); // تنفيذ الاستعلام

                                                    if (!$result) {

                                                        echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                    } else {
                                                        echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (RPC) </h4>";
                                                        echo '<a href="uploadPrint.php?Unit_Number=' . $Unit_Number . '"> <h5>Go To Print QR Code (RPC)</h5> </a>';
                                                        echo '<hr>';
                                                    }



                                                    $qry2 = "insert into Blood_Separation (Unit_Number,Separation_Date,Picking_Type,Unit_Type,Unit_Amount,QR,Test_Number,Donation_Number) values ('$Unit_Number2','$Separation_Date','$Picking_Type','$Unit_Type2','$Unit_Amount2','$QR2','$Test_Number','$Donation_Number')";
                                                    $result2 = mysqli_query($conn, $qry2); // تنفيذ الاستعلام

                                                    if (!$result2) {

                                                        echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                    } else {
                                                        echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (RPC) </h4>";
                                                        echo '<a href="uploadPrint.php?Unit_Number=' . $Unit_Number2 . '"> <h5>Go To Print QR Code (RPC)</h5> </a>';
                                                        echo '<hr>';
                                                    }
                                                } elseif ($volume0 != null && $volume1 != null && $volume2 == null) {
                                                    $qry1 = "insert into Blood_Separation (Unit_Number,Separation_Date,Picking_Type,Unit_Type,Unit_Amount,QR,Test_Number,Donation_Number) values ('$Unit_Number1','$Separation_Date','$Picking_Type','$Unit_Type1','$Unit_Amount1','$QR1','$Test_Number','$Donation_Number')";
                                                    $result1 = mysqli_query($conn, $qry1); // تنفيذ الاستعلام

                                                    if (!$result1) {

                                                        echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                    } else {
                                                        echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (RPC) </h4>";
                                                        echo '<a href="uploadPrint.php?Unit_Number=' . $Unit_Number1 . '"> <h5>Go To Print QR Code (RPC)</h5> </a>';
                                                        echo '<hr>';
                                                    }



                                                    $qry = "insert into Blood_Separation (Unit_Number,Separation_Date,Picking_Type,Unit_Type,Unit_Amount,QR,Test_Number,Donation_Number) values ('$Unit_Number','$Separation_Date','$Picking_Type','$Unit_Type','$Unit_Amount','$QR','$Test_Number','$Donation_Number')";
                                                    $result = mysqli_query($conn, $qry); // تنفيذ الاستعلام

                                                    if (!$result) {

                                                        echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                    } else {
                                                        echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (RPC) </h4>";
                                                        echo '<a href="uploadPrint.php?Unit_Number=' . $Unit_Number . '"> <h5>Go To Print QR Code (RPC)</h5> </a>';
                                                        echo '<hr>';
                                                    }
                                                } elseif ($volume0 != null && $volume1 == null && $volume2 == null) {
                                                    $qry = "insert into Blood_Separation (Unit_Number,Separation_Date,Picking_Type,Unit_Type,Unit_Amount,QR,Test_Number,Donation_Number) values ('$Unit_Number','$Separation_Date','$Picking_Type','$Unit_Type','$Unit_Amount','$QR','$Test_Number','$Donation_Number')";
                                                    $result = mysqli_query($conn, $qry); // تنفيذ الاستعلام

                                                    if (!$result) {

                                                        echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                    } else {
                                                        echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (RPC) </h4>";
                                                        echo '<a href="uploadPrint.php?Unit_Number=' . $Unit_Number . '"> <h5>Go To Print QR Code (RPC)</h5> </a>';
                                                        echo '<hr>';
                                                    }
                                                } elseif ($volume0 == null && $volume1 != null && $volume2 == null) {
                                                    $qry1 = "insert into Blood_Separation (Unit_Number,Separation_Date,Picking_Type,Unit_Type,Unit_Amount,QR,Test_Number,Donation_Number) values ('$Unit_Number1','$Separation_Date','$Picking_Type','$Unit_Type1','$Unit_Amount1','$QR1','$Test_Number','$Donation_Number')";
                                                    $result1 = mysqli_query($conn, $qry1); // تنفيذ الاستعلام

                                                    if (!$result1) {

                                                        echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                    } else {
                                                        echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (RPC) </h4>";
                                                        echo '<a href="uploadPrint.php?Unit_Number=' . $Unit_Number1 . '"> <h5>Go To Print QR Code (RPC)</h5> </a>';
                                                        echo '<hr>';
                                                    }
                                                } elseif ($volume0 == null && $volume1 == null && $volume2 != null) {
                                                    $qry2 = "insert into Blood_Separation (Unit_Number,Separation_Date,Picking_Type,Unit_Type,Unit_Amount,QR,Test_Number,Donation_Number) values ('$Unit_Number2','$Separation_Date','$Picking_Type','$Unit_Type2','$Unit_Amount2','$QR2','$Test_Number','$Donation_Number')";
                                                    $result2 = mysqli_query($conn, $qry2); // تنفيذ الاستعلام

                                                    if (!$result2) {

                                                        echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                    } else {
                                                        echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (RPC) </h4>";
                                                        echo '<a href="uploadPrint.php?Unit_Number=' . $Unit_Number2 . '"> <h5>Go To Print QR Code (RPC)</h5> </a>';
                                                        echo '<hr>';
                                                    }
                                                }
                                            } elseif ($volume3 != null) {
                                                $Unit_Type3 = 'WB';
                                                $Unit_Amount3 = $volume3;

                                                $PNG_TEMP_DIR3 = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'phpqrcode-main-WB/phpqrcode/temp' . DIRECTORY_SEPARATOR;

                                                $PNG_WEB_DIR3 = 'phpqrcode-main-WB/phpqrcode/temp/';

                                                include "phpqrcode-main-WB/phpqrcode/qrlib.php";

                                                if (!file_exists($PNG_TEMP_DIR))
                                                    mkdir($PNG_TEMP_DIR);

                                                $filename3 = $PNG_TEMP_DIR3 . 'test4.png';

                                                $errorCorrectionLevel = 'H';

                                                $matrixPointSize = 10;


                                                $uniqueId3 = sprintf("SE%08d", mt_rand(1, 99999));
                                                $Unit_Number3 = $uniqueId3;

                                                $filename3 = $PNG_TEMP_DIR3 . 'test4' . md5($Unit_Number3  . '|' . $errorCorrectionLevel . '|' . $matrixPointSize)  . '.png';
                                                QRcode::png($Unit_Number3 . ":" . $_REQUEST['Test_Number'] . ":" . $_REQUEST['Donation_Number'] . ":" . $_REQUEST['Separation_Date'] . ":" . $_REQUEST['Picking_Type'] . ":" . $_REQUEST['volume3'] . ":" . $Unit_Type3, $filename3, $errorCorrectionLevel, $matrixPointSize, 2);


                                                $Q3 = file_get_contents($filename3);
                                                $QR3 = base64_encode($Q3);

                                                include 'dbconnect.php';

                                                $qry3 = "insert into Blood_Separation (Unit_Number,Separation_Date,Picking_Type,Unit_Type,Unit_Amount,QR,Test_Number,Donation_Number) values ('$Unit_Number3','$Separation_Date','$Picking_Type','$Unit_Type3','$Unit_Amount3','$QR3','$Test_Number','$Donation_Number')";
                                                $result3 = mysqli_query($conn, $qry3); // تنفيذ الاستعلام

                                                if (!$result3) {

                                                    echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                } else {
                                                    echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (RPC) </h4>";
                                                    echo '<a href="uploadPrint.php?Unit_Number=' . $Unit_Number3 . '"> <h5>Go To Print QR Code (RPC)</h5> </a>';
                                                    echo '<hr>';
                                                }
                                            }
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

    <!-- النصوص البرمجية -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
</body>

<style>
    /* تنسيق قسم الفوتر */
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