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
                                        if (isset($_POST['Test_Number'])) {
                                            // جمع البيانات من النموذج
                                            $Test_Number = $_POST["Test_Number"];
                                            $national = $_POST["national"];
                                            $Donation_Number = $_POST["Donation_Number"];
                                            $Test_Date = $_POST["Test_Date"];
                                            $Test_HBsAg = $_POST["Test_HBsAg"];
                                            $Test_HCV_Ab_IgG = $_POST["Test_HCV_Ab_IgG"];
                                            $Test_HIV_1_2_Ag_Ab = $_POST["Test_HIV_1_2_Ag_Ab"];
                                            $Test_Syphilis_Ab = $_POST["Test_Syphilis_Ab"];
                                            $Stereotyping_Capital_C = $_POST["Stereotyping_Capital_C"];
                                            $Stereotyping_Capital_E = $_POST["Stereotyping_Capital_E"];
                                            $Stereotyping_Small_c = $_POST["Stereotyping_Small_c"];
                                            $Stereotyping_Small_e = $_POST["Stereotyping_Small_e"];
                                            $Stereotyping_Capital_K = $_POST["Stereotyping_Capital_K"];
                                           







                                            $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'phpqrcode-main/phpqrcode/temp' . DIRECTORY_SEPARATOR;

                                            // //html PNG location prefix
                                            $PNG_WEB_DIR = 'phpqrcode-main/phpqrcode/temp/';

                                            include "phpqrcode-main/phpqrcode/qrlib.php";

                                            // //of course we need rights to create temp dir
                                            if (!file_exists($PNG_TEMP_DIR))
                                                mkdir($PNG_TEMP_DIR);


                                            $filename = $PNG_TEMP_DIR . 'test1.png';




                                            $errorCorrectionLevel = 'H';
                                             $errorCorrectionLevel = $_REQUEST['level'];

                                            $matrixPointSize = 10;
                                  
                                            $filename = $PNG_TEMP_DIR . 'test1' . md5($_REQUEST['Donation_Number']  . '|' . $errorCorrectionLevel . '|' . $matrixPointSize)  . '.png';
                                            QRcode::png( $_REQUEST['Test_Number'] . ":" . $_REQUEST['national'] . ":" . $_REQUEST['Donation_Number'] . ":" . $_REQUEST['Test_Date'] . ":" . $_REQUEST['Test_HBsAg'] . ":" . $_REQUEST['Test_HCV_Ab_IgG'] . ":" . $_REQUEST['Test_HIV_1_2_Ag_Ab']. ":" . $_REQUEST['Test_Syphilis_Ab']. ":" . $_REQUEST['Stereotyping_Capital_C']. ":" . $_REQUEST['Stereotyping_Capital_E']. ":" . $_REQUEST['Stereotyping_Small_c']. ":" . $_REQUEST['Stereotyping_Small_e']. ":" . $_REQUEST['Stereotyping_Capital_E'] , $filename, $errorCorrectionLevel, $matrixPointSize, 2);


                                        



                                            $Q = file_get_contents($filename);
                                            $QR = base64_encode($Q);

                                            include "dbconnect.php";
                                            
                                            
                                            
                                            $qry1 = "select * from Blood_Test where Donation_Number='$Donation_Number' ";
                                            $result1 = mysqli_query($conn, $qry1);
                                            $num_row1     = mysqli_num_rows($result1);
                                             // تنفيذ الاستعلام

                                            if ($num_row1 <= 0) {

                                            // الاتصال بقاعدة البيانات وإعداد استعلام SQL لإدخال بيانات المتبرع في قاعدة البيانات
                                            $qry = "insert into Blood_Test(Test_Number,Test_Date,Test_HBsAg,Test_HCV_Ab_IgG,Test_HIV_1_2_Ag_Ab,Test_Syphilis_Ab,Stereotyping_Capital_C,Stereotyping_Capital_E,Stereotyping_Small_c,Stereotyping_Small_e,Stereotyping_Capital_K,QR,national,Donation_Number) values ('$Test_Number','$Test_Date','$Test_HBsAg','$Test_HCV_Ab_IgG','$Test_HIV_1_2_Ag_Ab','$Test_Syphilis_Ab','$Stereotyping_Capital_C','$Stereotyping_Capital_E','$Stereotyping_Small_c','$Stereotyping_Small_e','$Stereotyping_Capital_K','$QR','$national','$Donation_Number')";
                                            $result = mysqli_query($conn, $qry); // تنفيذ الاستعلام

                                            if (!$result) {

                                                echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                            } else {
                                                echo "<div style='text-align: center'><h1>SUBMITTED SUCCESSFULLY</h1>";
                                                echo '<a href="uploadPrint.php?Test_Number=' . $Test_Number . '"> <h3>Print QR Code?</h3> </a>';
                                            }
                                        } else{
                                            // $new_date = date("Y-m-d", strtotime("+3 months", strtotime($Donation_Date)));

                                            echo "<h5> <div >The blood that has the number was tested: <span style='color:blue;'>".$Test_Number."</h5>";
                                            echo "<h5> <a href='Edit_Format_Blood_Test.php?Test_Number=" . $Test_Number . "'>Go To Edit Blood Test </a> </h4>";
                                            

                                        }}

                                   

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