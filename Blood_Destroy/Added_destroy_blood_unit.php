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
                                            $Unit_Number = $_POST["Unit_Number"];
                                            $Amount_Blood = $_POST["Amount_Blood"];
                                            $Blood_Group = $_POST["Blood_Group"];
                                            $uniqueId = sprintf("DE%08d", mt_rand(1, 99999));
                                            $Destruction_Number = $uniqueId;
                                            $Destruction_Date =  $_POST["Destruction_Date"];
                                            $Expiry_Date = $_POST["Expiry_Date"];
                                            $First_Reason = $_POST["First_Reason"];
                                            $Second_Reason = $_POST["Second_Reason"];




                                                      // الاتصال بقاعدة البيانات وإعداد استعلام SQL لإدخال بيانات المتبرع في قاعدة البيانات

                                            include 'dbconnect.php';
                                            $qry = "select * from Destroy_Blood_Unit where Unit_Number = '$Unit_Number' ";
                                            $result = mysqli_query($conn, $qry);





                                            if ($result->num_rows == 0) {
                                                // if ($Expiry_Date <= date('Y-m-d')) {






                                                    $qry = " insert into Destroy_Blood_Unit (U_Destruction_Number, U_Destruction_Date, U_First_Reason, U_Second_Reason, U_Blood_Group, U_Amount_Blood, Expiry_Date, Unit_Number) values ('$Destruction_Number','$Destruction_Date','$First_Reason','$Second_Reason', '$Blood_Group', '$Amount_Blood','$Expiry_Date','$Unit_Number') ";
                                                    $result = mysqli_query($conn, $qry); // تنفيذ الاستعلام

                                                    if (!$result) {

                                                        echo "<div style='text-align: center'><h4>SUBMITTED FAILED (<span style='color:blue;'>$Unit_Number</span>), Database Not Entered  </h4>";
                                                        echo '<h5><a href="destroy_blood_units_by_QR_Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
                                                    } else {
                                                        echo "<div style='text-align: center'><h4>SUBMITTED SUCCESSFULLY (<span style='color:blue;'>$Unit_Number</span>) </h4>";
                                                        echo '<h5><a href="destroy_blood_units_by_QR_Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
                                                        // $q = "delete from blood where Donation_Number = '$Donation_Number'";
                                                        // $r = mysqli_query($conn, $q);
                                                    }
                                                // } else {
                                                //     echo "<div style='text-align: center'><h4>SUBMITTED FAILED (<span style='color:blue;'>$Unit_Type</span>), This Unit Is Not Expired  </h4>";
                                                //     echo '<h5><a href="Add_Release_By_QR Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
                                                // }
                                            } elseif ($result->num_rows != 0) {
                                                echo "<div style='text-align: center'><h4>SUBMITTED FAILED (<span style='color:blue;'>$Unit_Type</span>), This Unit Has Been Released  </h4>";
                                                echo '<h5><a href="destroy_blood_units_by_QR_Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
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