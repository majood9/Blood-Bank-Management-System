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
                                            $Donation_Number = $_POST["Donation_Number"];
                                            $Unit_Number = $_POST["Unit_Number"];
                                            $Blood_Amount = $_POST["Blood_Amount"];
                                            $Unit_Type = $_POST["Unit_Type"];
                                            $Blood_Group = $_POST["Blood_Group"];
                                            $uniqueId = sprintf("ST%08d", mt_rand(1, 99999));
                                            $Release_Number = $uniqueId;
                                            $Release_Date =  $_POST["Release_Date"];
                                            $Expiry_Date = $_POST["Expiry_Date"];




                                            $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'phpqrcode-main/phpqrcode/temp' . DIRECTORY_SEPARATOR;

                                            // //html PNG location prefix
                                            $PNG_WEB_DIR = 'phpqrcode-main/phpqrcode/temp/';

                                            include "phpqrcode-main/phpqrcode/qrlib.php";

                                            // //of course we need rights to create temp dir
                                            if (!file_exists($PNG_TEMP_DIR))
                                                mkdir($PNG_TEMP_DIR);


                                            $filename = $PNG_TEMP_DIR . 'test.png';




                                            $errorCorrectionLevel = 'H';
                                            $errorCorrectionLevel = $_REQUEST['level'];

                                            $matrixPointSize = 10;

                                            $filename = $PNG_TEMP_DIR . 'test' . md5($_REQUEST['Release_Number']  . '|' . $errorCorrectionLevel . '|' . $matrixPointSize)  . '.png';
                                            QRcode::png($Release_Number . ":" . $Release_Date . ":" . $Donation_Number . ":" . $Unit_Number . ":" . $Blood_Amount . ":" . $Unit_Type . ":" . $Blood_Group . ":" . $Expiry_Date, $filename, $errorCorrectionLevel, $matrixPointSize, 2);






                                            $Q = file_get_contents($filename);
                                            $QR = base64_encode($Q);




                                            // الاتصال بقاعدة البيانات وإعداد استعلام SQL لإدخال بيانات المتبرع في قاعدة البيانات

                                            include 'dbconnect.php';
                                            $qry = "select * from Blood_Release where Unit_Number = '$Unit_Number' ";
                                            $result = mysqli_query($conn, $qry);





                                            if ($result->num_rows == 0) {
                                                if ($Expiry_Date <= date('Y-m-d')) {






                                                    $qry = " insert into Blood_Release (Release_Number, Release_Date, Blood_Group, Unit_Type,QR, Unit_Number, Donation_Number,Blood_Amount, Expiry_Date) values ('$Release_Number','$Release_Date','$Blood_Group','$Unit_Type','$QR', '$Unit_Number', '$Donation_Number','$Blood_Amount','$Expiry_Date') ";
                                                    $result = mysqli_query($conn, $qry); // تنفيذ الاستعلام

                                                    if (!$result) {

                                                        echo "<div style='text-align: center'><h4>SUBMITTED FAILED (<span style='color:blue;'>$Unit_Type</span>), Database Not Entered  </h4>";
                                                        echo '<h5><a href="Add_Release_By_QR Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
                                                    } else {
                                                        echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (<span style='color:blue;'>$Unit_Type</span>) </h4>";
                                                        echo '<h5><a href="Add_Release_By_QR Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
                                                        $q = "delete from Blood_Stock where Unit_Number = '$Unit_Number'";
                                                        $r = mysqli_query($conn, $q);
                                                    }
                                                } else {
                                                    echo "<div style='text-align: center'><h4>SUBMITTED FAILED (<span style='color:blue;'>$Unit_Type</span>), This Unit Is Not Expired  </h4>";
                                                    echo '<h5><a href="Add_Release_By_QR Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
                                                }
                                            } elseif ($result->num_rows != 0) {
                                                echo "<div style='text-align: center'><h4>SUBMITTED FAILED (<span style='color:blue;'>$Unit_Type</span>), This Unit Has Been Released  </h4>";
                                                echo '<h5><a href="Add_Release_By_QR Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
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