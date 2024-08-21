<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BDMS</title>
    <style>
    .additional-content {
        height:100px;
        position: fixed;
        top: 50%; /* وضع العنصر في منتصف الصفحة بشكل عمودي */
        right: 40px; /* يمين الصفحة */
        transform: translateY(-50%); /* لوضع العنصر بشكل دقيق في وسط الصفحة */
        z-index: 999; /* ضمان ظهور العنصر فوق العناصر الأخرى */
        background-color: #f8f9fa; /* لون خلفية العنصر */
        padding: 70px; /* تباعد داخلي للعنصر */
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); /* ظل العنصر لإبرازه عن الخلفية */
        border-radius: 5px; /* انحناء حواف العنصر */
        /* يمكنك إضافة أي أنماط أخرى أو تعديل هذه الأنماط حسب متطلباتك */
    }
</style>


    <style>
        input:out-of-range {
            border: 2px solid red;
        }

        .error-message {
            color: red;
            display: none;
            /* جعل رسالة الخطأ غير مرئية ابتدائياً */
        }

        .out-of-range:focus+.error-message {
            display: block;
        }

        .btn-primary {
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: scale(1.1);
        }
    </style>
    <script>
        function updateFields(eligibleValue) {
            if (eligibleValue === 'Yes') {
                document.getElementById('eligibleYesFields').style.display = 'block';
                document.getElementById('eligibleNoFields').style.display = 'none';
            } else {
                document.getElementById('eligibleYesFields').style.display = 'none';
                document.getElementById('eligibleNoFields').style.display = 'block';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('eligible').addEventListener('change', function() {
                updateFields(this.value);
            });
            updateFields(document.getElementById('eligible').value);
        });
    </script>




    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../icofont/icofont.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <div id="wrapper">


        <?php include 'includes/Doctor_nav.php' ?>
        <?php include 'includes/nav.php' ?>
        <?php
        include "dbconnect.php";


        $qrData = $_GET['qrData'];

        // قم بتفكيك بيانات QR code إلى مصفوفة
        $data = explode(":", $qrData);

        // $Id = $data[5];
        $Donation_code = $data[0];
if(strlen((string)$Donation_code ) == 6 ){
        $Donation_code = $data[0];
        $national = $data[1];
        // $qry = "select eligible, national_id, status, date_view from Test where national_id = '$national'";
        // $result = mysqli_query($conn, $qry);

        // if ($result->num_rows > 0) {


        // $qry = "select eligible, national_id, status, date_view from Test where national_id = '$national'";
        // $result = mysqli_query($conn, $qry);

        // if ($row = mysqli_fetch_array($result)) {
        //     if(($result->num_rows == 0) || ($row['date_view'] == date('Y-m-d', strtotime('+6 months', strtotime($row['date_view']))) && $row['eligible'] == 'No' ) || ($row['date_view'] == date('Y-m-d', strtotime('+1 days', strtotime($row['date_view']))) && $row['status'] == 'No') || ($row['date_view'] == date('Y-m-d', strtotime('+3 months', strtotime($row['date_view']))) && $result->num_rows >= 1)){

        

        // $qry = "select * from donor join status on donor.national = status.national where donor.national = '$national' and status.Donation_Code = '$Donation_code' ";
        // $result = mysqli_query($conn, $qry);





        // if ($result->num_rows <= 0) {





        ?>

        

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12" style="display: flex; justify-content: space-between; align-items: center;padding-top:20px;padding-bottom:20px">
                        <h1 class="page-header" style="color: #777; margin: 0; margin-left: auto; margin-right: auto;">MEDICAL EXAMINATION</h1>
                        <form action="user2dashboard.php" method="post" style="margin: 0;">
                            <button type="submit" class="btn btn-primary" style="border-radius: 20px; border-radius: 20px; background-color: #777; color: white; padding: 5px 15px; border: none; text-transform: uppercase; font-weight: bold;">
                                <span class="glyphicon glyphicon-arrow-right"></span>
                            </button>
                        </form>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>

                <!-- /.row -->
                <div class="row">

                    <div class="col-lg-12">
                        <div class="panel panel-default">


                            <div class="panel-heading">
                                <?php
                                include 'dbconnect.php';
                                $id = $_GET['national'];
                                $qry = "SELECT name,name_family,dob FROM donor WHERE national = '$national'";
                                $result = mysqli_query($conn, $qry);

                                if ($row = mysqli_fetch_array($result)) {
                                    echo "<div style='direction: rtl;'>";
                                    echo "<span style='font-size: larger; color: black;'>اسم المتبرع : </span><span style='font-size: larger; color: blue;'>" . $row['name'] . " </span><span style='font-size: larger; color: blue;'>" . $row['name_family'] . "</span>";
                                    echo "<span style='display: inline-block; width: 20px;'></span>";  // Adding space between the elements
                                    echo "<span style='font-size: larger; color: black;'>تاريخ الميلاد : </span><span style='font-size: larger; color: blue;'>" . $row['dob'] . " </span>";
                                    echo "</div>";
                                    echo "</div>";
                                } else {
                                    echo "<span style='font-size: larger; color: red;margin-left:350px;'> لم يتم العثور على سجل </span>";
                                }
                                ?> </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form" action="Added_Test.php" method="post">
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;" hidden>national</label>
                                            <input style="flex: 1; margin-left: 500px;" class="form-control" name="national_id" type="hidden" value="<?php echo $national; ?>" readonly>
                                        </div>

                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;">تاريخ العرض</label>
                                            <input style="flex: 1; margin-left: 500px;" class="form-control" name="date_view" type="date" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;">دواء</label>
                                            <select style="flex: 1; margin-left: 500px;" class="form-control" name="medication" >
                                                <option value="">اختر الدواء</option>
                                                <option value="Non">Non</option>
                                                <option value="galvus">galvus</option>
                                                <option value="galvus">galvus</option>
                                                <option value="Galvus Met">Galvus Met</option>
                                                <option value="Vildagluse Plus">Vildagluse Plus</option>
                                                <option value="Entecavir">Entecavir</option>
                                                <option value="watinwfir">watinwfir</option>

                                                <!-- يمكنك إضافة المزيد من الخيارات هنا -->
                                            </select>
                                        </div>

                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;">مؤهل بواسطة الأستبيان <span style="color: red;">*</span></label>
                                            <select id="eligible" style="flex: 1; margin-left: 500px;" class="form-control" name="eligible" required>
                                                <option value="Yes">نعم</option>
                                                <option value="No">لا</option>
                                            </select>
                                        </div>
                                        <div id="eligibleYesFields">
                                        <div class="form-group" style="margin-left: 130px; margin-bottom:30px; display: flex; flex-direction: row; direction: rtl;">
                                                <label style="flex: 2.3; padding: 7px;">الزمرة الدموية<span style="color: red;">*</span></label>
                                                <!-- <input style="flex: 0.5; margin-right: 85px; margin-left: 2px; width: 50%;" class="form-control" name="Blood_Group" type="number" min="90" max="180 "> -->
                                                <select style="flex: 2.3; margin-left: 45px;" class="form-control" name="Blood_Group">
                                                    <option value="">اختر الزمرة</option>
                                                    <option value="A-">A-</option>
                                                    <option value="A+">A+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="O-">O-</option>
                                                    <option value="O+">O+</option>

                                                </select>

                                                <!-- <span style=" flex: 1; padding: 7px; color: blue;">mmHg (180-90)</span> -->
                                                <label style="padding: 7px;margin-right: 70px;">نوع القطف<span style="color: red;">*</span></label>
                                                <select style="flex: 1; margin-left: 60px;" class="form-control" name="Picking_Type">
                                                    <option value="">اختر نوع القطف</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Quadrant">Quadrant</option>
                                                    <option value="Patients">Patients</option>


                                                </select>
                                            </div>


                                            <div class="form-group" style="margin-left: 100px; display: flex; flex-direction: row; direction: rtl;">
                                                <label style="flex: 0.5; padding: 7px;">الضغط المنخفض<span style="color: red;">*</span></label>
                                                <input style="flex: 0.5; margin-right: 85px; margin-left: 2px; width: 50%;" class="form-control" name="low_pressure" type="number" min="90" max="180">

                                                <span style=" flex: 1; padding: 7px; color: blue;">mmHg (180-90)</span>
                                                <label style="padding: 7px;margin-right: 70px;">الضغط العالي<span style="color: red;">*</span></label>
                                                <input style="flex: 0.5; width: 50%; margin-left: 20px;margin-right: 10px;" class="form-control" name="high_pressure" type="number" min="60" max="100">
                                                <span style="flex: 1; padding: 7px; color: blue;">mmHg (100-60)</span>
                                            </div>

                                            <div class="form-group" style="margin-left: 100px; display: flex; flex-direction: row; direction: rtl;">
                                                <label style="flex: 0.5; padding: 7px;">النبض<span style="color: red;">*</span></label>
                                                <select style="flex: 0.5; margin-right: 85px; margin-left: 2px; width: 50%;" class="form-control" name="pulse" type="text">
                                                    <option value="Regular">منتظم</option>
                                                    <option value="Irregular">غير منتظم</option>
                                                </select>

                                                <span style="flex: 1; padding: 7px; color: blue;"></span>
                                                <label style="padding: 7px;margin-right: 70px;">معدل النبض<span style="color: red;">*</span></label>
                                                <input style="flex: 0.5; width: 50%; margin-left: 20px;margin-right: 10px;" class="form-control" name="pulse_rate" type="number" min="60" max="100">
                                                <span style="flex: 1; padding: 7px; color: blue;">(100-60)</span>
                                            </div>

                                            <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                <label style="flex: 1; padding: 7px;">هيموجلوبين <span style="color: red;">*</span></label>
                                                <input style="flex: 1; margin-left: 8px;" class="form-control" name="hemoglobin" type="number" min="13" max="18">
                                                <span style="flex: 1; padding: 7px;  margin-left: 320px; color: blue;"> g/dl (18-13)</span>



                                            </div>

                                            <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                <label style="flex: 1; padding: 7px;">الوزن <span style="color: red;">*</span></label>
                                                <input style="flex: 1; margin-left: 8px;" class="form-control" name="weight" type="number" min="50" max="120">
                                                <span style="flex: 1; padding: 7px;  margin-left: 320px; color: blue;"> Kg (50<) </span>



                                            </div>

                                            <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                <label style="flex: 1; padding: 7px;">درجة الحرارة <span style="color: red;">*</span></label>
                                                <input style="flex: 1; margin-left: 8px;" class="form-control" name="temperature" type="number" min="36" max="37.5">
                                                <span style="flex: 1; padding: 7px; margin-left: 320px; color: blue;">(37.5-36) °C</span>


                                            </div>
                                            <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                <label style="flex: 1; padding: 7px;">ملاحظات طبية</label>
                                                <input style="flex: 1; margin-left: 415px; padding: 44px; text-align: left;" class="form-control" name="note" type="text" dir="auto">

                                            </div><br>
                                            <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                <label style="flex: 1; padding: 7px;">مقبول ؟ <span style="color: red;">*</span></label>
                                                <select style="flex: 1; margin-left: 500px;" class="form-control" name="status">
                                                    <option value=""></option>

                                                    <option value="Yes">نعم</option>
                                                    <option value="No">لا</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="eligibleNoFields" style="display: none;">
                                            <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                <label style="flex: 1; padding: 7px;"> السبب 1<span style="color: red;">*</span></label>
                                                <select style="flex: 1; margin-left: 328px;" class="form-control" name="first_reason" value="">
                                                    <option value=""> حدد السبب الأول</option>
                                                    <option value="DONOR COLAPSES BEFORE PHLEBOTOMY ">DONOR COLAPSES BEFORE PHLEBOTOMY </option>
                                                    <option value="HEART OR CIRCULATORY DISEASES">HEART OR CIRCULATORY DISEASES</option>
                                                    <option value="HIGH DIASTOLIC">HIGH DIASTOLIC</option>
                                                    <option value="HIGH HEMOGLOBIN">HIGH HEMOGLOBIN</option>
                                                    <option value="HIGH SYSTOLIC">HIGH SYSTOLIC</option>
                                                    <option value="HIGH TEMPERATURE">HIGH TEMPERATURE</option>
                                                    <option value=" IMMUNE SYSTEM DISEASES"> IMMUNE SYSTEM DISEASES</option>
                                                    <option value="INFECTIOUS OR PARASITIC DISEASES">INFECTIOUS OR PARASITIC DISEASES</option>
                                                    <option value="INJURY OR TOXICATION">INJURY OR TOXICATION</option>
                                                    <option value="LOW DIASTOLIC">LOW DIASTOLIC</option>
                                                    <option value="LOW HEMOGLOBIN">LOW HEMOGLOBIN</option>
                                                    <option value="LOW PULSE">LOW PULSE</option>
                                                    <option value="LOW SYSTOLIC ">LOW SYSTOLIC </option>
                                                    <option value="LOW TEMPERATURE">LOW TEMPERATURE</option>
                                                    <option value="LOW WEIGHT">LOW WEIGHT</option>
                                                    <option value="MALIGNANT DISEASES">MALIGNANT DISEASES</option>
                                                    <option value="MENSTRUAL PERIOD">MENSTRUAL PERIOD</option>
                                                    <option value="NEUROLOGICAL DISEASES ">NEUROLOGICAL DISEASES </option>
                                                    <option value="PIERCING">PIERCING</option>
                                                    <option value="PSIHICAL DISEASES">PSIHICAL DISEASES</option>
                                                    <option value="RISK BEHAVIOR">RISK BEHAVIOR</option>
                                                    <option value="SURGICAL TREATMENT">SURGICAL TREATMENT</option>
                                                    <option value="TATOO">TATOO</option>

                                                </select>
                                            </div>
                                            <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                <label style="flex: 1; padding: 7px;"> السبب 2</label>
                                                <select style="flex: 1; margin-left: 328px;" class="form-control" name="second_reason" value="">
                                                    <option value="">حدد السبب الثاني</option>
                                                    <option value="DONOR COLAPSES BEFORE PHLEBOTOMY ">DONOR COLAPSES BEFORE PHLEBOTOMY </option>
                                                    <option value="HEART OR CIRCULATORY DISEASES">HEART OR CIRCULATORY DISEASES</option>
                                                    <option value="HIGH DIASTOLIC">HIGH DIASTOLIC</option>
                                                    <option value="HIGH HEMOGLOBIN">HIGH HEMOGLOBIN</option>
                                                    <option value="HIGH SYSTOLIC">HIGH SYSTOLIC</option>
                                                    <option value="HIGH TEMPERATURE">HIGH TEMPERATURE</option>
                                                    <option value=" IMMUNE SYSTEM DISEASES"> IMMUNE SYSTEM DISEASES</option>
                                                    <option value="INFECTIOUS OR PARASITIC DISEASES">INFECTIOUS OR PARASITIC DISEASES</option>
                                                    <option value="INJURY OR TOXICATION">INJURY OR TOXICATION</option>
                                                    <option value="LOW DIASTOLIC">LOW DIASTOLIC</option>
                                                    <option value="LOW HEMOGLOBIN">LOW HEMOGLOBIN</option>
                                                    <option value="LOW PULSE">LOW PULSE</option>
                                                    <option value="LOW SYSTOLIC ">LOW SYSTOLIC </option>
                                                    <option value="LOW TEMPERATURE">LOW TEMPERATURE</option>
                                                    <option value="LOW WEIGHT">LOW WEIGHT</option>
                                                    <option value="MALIGNANT DISEASES">MALIGNANT DISEASES</option>
                                                    <option value="MENSTRUAL PERIOD">MENSTRUAL PERIOD</option>
                                                    <option value="NEUROLOGICAL DISEASES ">NEUROLOGICAL DISEASES </option>
                                                    <option value="PIERCING">PIERCING</option>
                                                    <option value="PSIHICAL DISEASES">PSIHICAL DISEASES</option>
                                                    <option value="RISK BEHAVIOR">RISK BEHAVIOR</option>
                                                    <option value="SURGICAL TREATMENT">SURGICAL TREATMENT</option>
                                                    <option value="TATOO">TATOO</option>

                                                </select>
                                            </div>

                                        </div>





                                        <div style="display: flex; justify-content: center;">




                                            <button type="submit" class="btn btn-primary" style="border-radius: 20px; background-color: #777; color: white; padding: 10px 10px; border: none;font-size:13px;">
                                                Add Test
                                            </button>
                                        </div>




                                    </form>


<?php } ?>
                           
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
            <!-- /.containerfluid -->
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





</html>