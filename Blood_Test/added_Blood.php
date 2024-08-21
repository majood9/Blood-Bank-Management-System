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
                                        if (isset($_POST['Donation_Number'])) {
                                            // جمع البيانات من النموذج
                                            $national = $_POST["national"];
                                            $Donation_Number = $_POST["Donation_Number"];
                                            $Donation_Date = $_POST["Donation_Date"];
                                            $Blood_Group = $_POST["Blood_Group"];
                                            $Amount_Blood = $_POST["Amount_Blood"];
                                            $Picking_Type = $_POST["Picking_Type"];
                                            $Donor_Number = $_POST["Donor_Number"];
                                           







                                            $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'phpqrcode-main/phpqrcode/temp' . DIRECTORY_SEPARATOR;

                                            // //html PNG location prefix
                                            $PNG_WEB_DIR = 'phpqrcode-main/phpqrcode/temp/';

                                            include "phpqrcode-main/phpqrcode/qrlib.php";

                                            // //of course we need rights to create temp dir
                                            if (!file_exists($PNG_TEMP_DIR))
                                                mkdir($PNG_TEMP_DIR);


                                            $filename = $PNG_TEMP_DIR . 'test1.png';





                                            //processing form input
                                            //remember to sanitize user input in real-life solution !!!
                                            $errorCorrectionLevel = 'H';
                                            // if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('H')))
                                            //     $errorCorrectionLevel = $_REQUEST['level'];

                                            $matrixPointSize = 10;
                                            // if (isset($_REQUEST['size']))
                                            //     $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);



                                            // if (isset($_REQUEST['national'])) {

                                            //     //     //     //it's very important!
                                            //     if (trim($_REQUEST['national']) == '')
                                            //         die('data cannot be empty! <a href="?">back</a>');

                                            //     // user data
                                            $filename = $PNG_TEMP_DIR . 'test1' . md5($_REQUEST['Donation_Number']  . '|' . $errorCorrectionLevel . '|' . $matrixPointSize)  . '.png';
                                            QRcode::png( $_REQUEST['Donation_Number'] . ":" . $_REQUEST['national'] . ":" . $_REQUEST['Donor_Number'] . ":" . $_REQUEST['Donation_Date'] . ":" . $_REQUEST['Blood_Group'] . ":" . $_REQUEST['Amount_Blood'] . ":" . $_REQUEST['Picking_Type'] , $filename, $errorCorrectionLevel, $matrixPointSize, 2);


                                            //  

                                            // } else {

                                            //     //default data
                                            //     // echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';
                                            //     QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);
                                            // }



                                            $Q = file_get_contents($filename);
                                            $QR = base64_encode($Q);

                                            include "dbconnect.php";
                                            // if (isset($_POST['national'])) {

                                            //     $query         = mysqli_query($conn, "SELECT * FROM donor WHERE  national='{$_POST['national']}' ");
                                            //     $row        = mysqli_fetch_array($query);
                                            //     $num_row     = mysqli_num_rows($query);
                                            //     if ($num_row > 0) {
                                            //         $national = $row['$national'];
                                            //         header('location: uploaddonor[search].php?national=' . $national);
                                            //     }
                                            // } else {




                                            $qry1 = "select Donation_Number from Blood where Donor_Number=$Donor_Number";
                                            $result1 = mysqli_query($conn, $qry1);
                                            $new_date = date("Y-m-d", strtotime("+3 months", strtotime($Donation_Date)));

                                            if($result1->num_rows == 0 || $Donation_Date ==$new_date){



                                            // include 'dbconnect.php';
                                            // الاتصال بقاعدة البيانات وإعداد استعلام SQL لإدخال بيانات المتبرع في قاعدة البيانات
                                            $qry = "insert into Blood(Donation_Number,Donation_Date,Blood_Group,Amount_Blood,Picking_Type,QR,national,Donor_Number) values ('$Donation_Number','$Donation_Date','$Blood_Group','$Amount_Blood','$Picking_Type','$QR','$national','$Donor_Number')";
                                            $result = mysqli_query($conn, $qry); // تنفيذ الاستعلام

                                            if (!$result) {

                                                echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                            } else {
                                                echo "<div style='text-align: center'><h1>SUBMITTED SUCCESSFULLY</h1>";
                                                echo '<a href="uploadPrint.php?Donation_Number=' . $Donation_Number . '"> <h3>Print QR Code?</h3> </a>';
                                            }
                                        } else{
                                            $new_date = date("Y-m-d", strtotime("+3 months", strtotime($Donation_Date)));

                                            echo "<h4> <div >The donor with the number: <span style='color:blue;'>".$Donor_Number."</span>, He made a donation on: <span style='color:red;'> $Donation_Date</span></h4> <br>";
                                            echo "<h4> <div >The next allowed donation will be on: <span style='color:red;'>$new_date</span></h4>";
                                            

                                        }

                                    }
                                        //else {
                                        //      echo "<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
                                        //  }

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