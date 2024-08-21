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


                                            // $filename = $PNG_TEMP_DIR . 'test.png';

                                            $errorCorrectionLevel = 'H';

                                            $matrixPointSize = 10;

                                            $filename = $PNG_TEMP_DIR . 'test1' . md5($_REQUEST['national']  . '|' . $errorCorrectionLevel . '|' . $matrixPointSize)  . '.png';
                                            QRcode::png($_REQUEST['Donation_code'] . ":" . $_REQUEST['national'] .  ":" . $_REQUEST['name'] . ":" . $_REQUEST['name_father'] . ":" . $_REQUEST['name_mother'] . ":" . $_REQUEST['name_family'] .  ":" . $_REQUEST['address'] . ":" . $_REQUEST['dob'] . ":" . $_REQUEST['gender'] . ":" . $_REQUEST['age'] . ":" . $_REQUEST['date_view'] . ":" . $_REQUEST['donation_reason'] . ":" . $_REQUEST['phone_number'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);

                                            $Q = file_get_contents($filename);
                                            $QR = base64_encode($Q);

                                            include "dbconnect.php";

                                            $sql = "SELECT MAX(donor.date_view) AS latest_date ,MAX(Test.date_view) AS latest_dates , eligible FROM donor join Test on donor.national=Test.national_id  where donor.national = $national  ";

                                            $result = $conn->query($sql);





                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    // echo "أحدث تاريخ: " . $row["latest_date"];
                                                    $d = date('Y-m-d');
                                                    $date1 = new DateTime($d);
                                                    $date2 = new DateTime($row["latest_date"]);
                                                    $date3 = new DateTime($row["latest_dates"]);
                                                    // $date3 = new DateTime($row1["latest_date"]);

                                                    $interval = date_diff($date1, $date2);
                                                    $interval1 = date_diff($date1, $date3);

                                                    // echo "الفارق بين التاريخين هو: " . $interval->format('%d يوم');
                                                    if (($interval->format('%m') >= 3) || ($d != $row["latest_date"] && $interval->format('%d') <= 0 && $interval->format('%m') <= 0 && $interval->format('%y') <= 0) || ($date1 != $date3 && $row["status"] == "No" && $interval1->format('%d') >= 1)) {
                                                       
                                                        $qry = "select * from donor";
                                                        $result = mysqli_query($conn, $qry);

                                                        $qry = "insert into donor(name,name_father,name_mother,name_family,national,address,dob,gender,age,date_view,phone_number,QR) values ('$name','$name_father','$name_mother','$name_family','$national','$address','$dob','$gender','$age','$date_view','$phone_number','$QR')";
                                                        $result = mysqli_query($conn, $qry); // تنفيذ الاستعلام

                                                        if (!$result) {

                                                            // echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                        } else {
                                                            echo "<div style='text-align: center'><h1>SUBMITTED SUCCESSFULLY</h1>";
                                                            // echo "<a href='userdashboard.php' div style='text-align: center'><h3>Go Back</h3></a>";
                                                        }

                                                        $qry = "select * from status";
                                                        $result = mysqli_query($conn, $qry);
                                                        $qry = "insert into status(Donation_code,donation_reason,date_view,national ) values ('$Donation_code','$donation_reason','$date_view ','$national')";
                                                        $result = mysqli_query($conn, $qry);
                                                        if (!$result) {


                                                            echo '<button type="submit" class="btn btn-success" class="btn btn-success" style="border-radius:0%; margin-left:75%" ;> <a href="uploaddonor[search].php?national=' . $national . '" style="color:white;">Go To Donor Detail</a></button>';
                                                        } else {
                                                            echo "<div style='text-align: center'><h1>SUBMITTED SUCCESSFULLY</h1>";
                                                            echo '<a href="uploadPrint.php?national=' . $national . '"><h3>Print QR Code?</h3>';










                                                            // echo "<div style='text-align: center'><h1>SUBMITTED SUCCESSFULLY</h1>";
                                                            // echo '<a href="upload.php?national=' . $national . '"><h3>Go To QR Code</h3>';

                                                        }
                                                    } else {
                                                        $sql1 = "SELECT MAX(Test.date_view) AS latest_dates,Test.eligible FROM Test  join donor on donor.national=Test.national_id where Test.national_id = $national and Test.date_view=(select MAX(Test.date_view) from Test where national_id = $national )  ";

                                                        $result1 = $conn->query($sql1);





                                                        if ($result1->num_rows > 0) {
                                                            while ($row1 = $result1->fetch_assoc()) {

                                                                echo "<h5>The donation was made by this donor on:<span style='color:red'>" . $row["latest_dates"] . "\n</span></h5>";
                                                                echo "<h5>Donor case (acceptable or not):<span style='color:red'>" . $row1["eligible"] . "</span></h5>";
                                                                $new_date = date("Y-m-d", strtotime("+6 months", strtotime($d)));

                                                                if ($row1["eligible"] == 'No' && $row["latest_dates"] <= $new_date) {
                                                                    echo "<h5> <div >This Donor was Rejected due to illness on:<span style='color:red;'>$date_view</span></h4>";
                                                                    echo "<h5> <div >This Donor has been Rejected until:<span style='color:red;'>$new_date</span></h4>";
                                                                }
                                                                echo " <h4><a href='userdashboard.php' div style='text-align: center'><h3>Go Back</h3>";
                                                                echo '<h4><a style="text-align: center" href="upload.php?national=' . $national . '"><h3>Go To Donor Details</h3></h4>';
                                                            }
                                                        }
                                                    }
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