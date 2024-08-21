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
                            <center>QR Code Reader </center>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="index.php" method="post">
                                        <!DOCTYPE html>
                                        <html lang="en">

                                        <head>
                                            <meta charset="UTF-8">
                                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                            <title>QR Code Scanner</title>
                                        </head>

                                        <body>
                                            <video id="qr-video" style="margin-left:4% ;" width="200%" height="200%" hidden></video>
                                            <script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
                                            <script>
                                                let scanner = new Instascan.Scanner({
                                                    video: document.getElementById('qr-video')
                                                });
                                                scanner.addListener('scan', function(content) {
                                                    fetch('fetchData.php?qrData=')
                                                        .then(response => response.text())
                                                        .then(data => {
                                                            window.location.href = "Add_Test.php?qrData=" + content;
                                                        });
                                                });
                                                Instascan.Camera.getCameras().then(cameras => {
                                                    if (cameras.length > 0) {
                                                        scanner.start(cameras[0]);
                                                    } else {
                                                        console.error('No cameras found.');
                                                    }
                                                });
                                            </script>
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
                                $qry = "SELECT name,name_family,dob FROM donor WHERE national = '$id'";
                                $result = mysqli_query($conn, $qry);

                                if ($row = mysqli_fetch_array($result)) {
                                    echo "<div style='direction: rtl;'>";
                                    echo "<span style='font-size: larger; color: black;'>اسم المتبرع : </span><span style='font-size: larger; color: blue;'>" . $row['name'] . " </span><span style='font-size: larger; color: blue;'>" . $row['guardiansname'] . "</span>";
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
                                    <form role="form" action="addtest.php" method="post">
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;" hidden>national</label>
                                            <input style="flex: 1; margin-left: 500px;" class="form-control" name="national_id" type="hidden" value="<?php echo $id ?>" readonly>
                                        </div>

                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;">تاريخ العرض</label>
                                            <input style="flex: 1; margin-left: 500px;" class="form-control" name="date_view" type="date" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;">دواء</label>
                                            <select style="flex: 1; margin-left: 500px;" class="form-control" name="medication">
                                                <option value="">اختر الدواء</option>
                                                <option value="galvus">Non</option>
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






                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                            

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