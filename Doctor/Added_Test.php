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
        <?php include 'includes/Doctor_nav.php' ?>

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
                                        // $id1 = $_GET['national'];
                                        if ($_SERVER["REQUEST_METHOD"] === "POST") {

                                        if($_POST["eligible"]== 'Yes'){


                                        if (isset($_POST['medication'])) {
                                            // جمع البيانات من النموذج
                                            // $id = $_GET["id"];
                                            $national_id = $_POST["national_id"];
                                            $date_view = $_POST["date_view"];
                                            $medication = $_POST["medication"];
                                            $eligible = $_POST["eligible"];
                                            $Blood_Group = $_POST["Blood_Group"];
                                            $Picking_Type = $_POST["Picking_Type"];
                                            $low_pressure = $_POST["low_pressure"];
                                            $high_pressure = $_POST["high_pressure"];
                                            $pulse = $_POST["pulse"];
                                            $pulse_rate = $_POST["pulse_rate"];
                                            $hemoglobin = $_POST["hemoglobin"];
                                            $weight = $_POST["weight"];
                                            $temperature = $_POST["temperature"];
                                            $note = $_POST["note"];
                                            $status = $_POST["status"];
                                            $first_reason = NULL;
                                            $second_reason = NULL;
                                            // $first_reason = NULL;
                                            // $second_reason = NULL;


                                            include "dbconnect.php";

                                            // الاتصال بقاعدة البيانات وإعداد استعلام SQL لإدخال بيانات المتبرع في قاعدة البيانات
                                            $qry = "insert into Test (national_id,date_view,medication,eligible,Blood_Group,Picking_Type,low_pressure,high_pressure,pulse,pulse_rate,hemoglobin,weight,temperature,note,status) values ('$national_id','$date_view','$medication','$eligible','$Blood_Group','$Picking_Type','$low_pressure','$high_pressure','$pulse','$pulse_rate','$hemoglobin','$weight','$temperature','$note','$status')";
                                            $result = mysqli_query($conn, $qry); // تنفيذ الاستعلام

                                            if (!$result) {
                                                echo "ERROR1";
                                                echo $national_id;
                                            } else {
                                                echo " <div style='text-align: center'><h4>Blood Donation Details Has Been Listed. Thank You.</h4>";
                                                echo '<a style='.'color:red; text_decoration:none;'.' href="upload.php?national=' . $national_id . '"><h4 > Print QR Code? </h4></a>';
                                            }
                                        } else {
                                            echo "<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='dashboard.php'> DASHBOARD </a></h3>";
                                        }}else{
                                            if (isset($_POST['medication'])) {
                                                // جمع البيانات من النموذج
                                                // $id = $_GET["id"];
                                                $national_id = $_POST["national_id"];
                                                $date_view = $_POST["date_view"];
                                                $medication = $_POST["medication"];
                                                $eligible = $_POST["eligible"];
                                                $Blood_Group = NULL;
                                                $Picking_Type = NULL;
                                                $low_pressure = NULL;
                                                $high_pressure = NULL;
                                                $pulse = NULL;
                                                $pulse_rate = NULL;
                                                $hemoglobin = NULL;
                                                $weight = NULL;
                                                $temperature = NULL;
                                                $temperature = NULL;
                                                $status = NULL;
                                                $first_reason = $_POST["first_reason"];
                                                $second_reason = $_POST["second_reason"];
                                                // $first_reason = NULL;
                                                // $second_reason = NULL;
    
    
                                                include "dbconnect.php";
    
                                                // الاتصال بقاعدة البيانات وإعداد استعلام SQL لإدخال بيانات المتبرع في قاعدة البيانات
                                                $qry = "insert into Test (national_id,date_view,medication,eligible,Blood_Group,Picking_Type,first_reason,second_reason) values ('$national_id','$date_view','$medication','$eligible','$Blood_Group','$Picking_Type','$first_reason','$second_reason')";
                                                $result = mysqli_query($conn, $qry); // تنفيذ الاستعلام
    
                                                if (!$result) {
                                                    echo "ERROR";
                                                    echo $national_id;
                                                } else {
                                                    if($_POST["eligible"]== 'No'){
                                                        $new_date = date("Y-m-d", strtotime("+6 months", strtotime($date_view)));
                                                    echo " <div style='text-align: center'><h3>This Donor was Rejected due to illness on:<span style='color:red;'>$date_view</span></h3>";
                                                    echo " <div style='text-align: center'><h3>This Donor has been Rejected until:<span style='color:red;'>$new_date</span></h3>";
                                                    echo " <a href='Doctor_dashboard.php' div style='text-align: center'><h3>Go Back</h3>";
                                                }
                                            }
                                            } else {
                                                echo "<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='dashboard.php'> DASHBOARD </a></h3>";
                                            }}

                                        


                                          }  ?>

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