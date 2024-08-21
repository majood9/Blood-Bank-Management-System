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
    .form-control[name="date_view"] {
  border: none;
}
    .form-control[name="Donation code"] {
  border: none;
}
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
        <video id="qr-video" style="display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: flex-end;
        margin-right: -50px;
        margin-top: -13px; " width="0px" height="0px" type="hidden" hidden></video>
        
        <script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script>
            let scanner = new Instascan.Scanner({
                video: document.getElementById('qr-video')
            });
            scanner.addListener('scan', function(content) {
                fetch('Add_Donor.php?qrData=')
                    .then(response => response.text())
                    .then(data => {
                        window.location.href = "Add1_Donor.php?qrData=" + content;
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
                        <h1 class="page-header" style="color: #777; margin: 0; margin-left: auto; margin-right: auto;">RECORD THE VISIT</h1>
                        <form action="userdashboard.php" method="post" style="margin: 0;">
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


                            
                            <div class="panel-body">
                                <div class="row">
                                    <form role="form" action="#" method="post" style=" margin-right: 20px; ">
                                        

                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl; margin-top: 20px;">
                                            <label style="flex: 1; padding: 7px;">تاريخ العرض</label>
                                            <input style="text-align: center; color:darkred;flex: 1; margin-left: 470px;" class="form-control" name="date_view" type="text" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                      

                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;">civil id</label>
                                            <input  style="text-align: center;flex: 1; margin-left: 470px;" class="form-control" name="national" required>
                                              
                                            </input>
                                        </div>
                                        


                                            <div class="form-group" style="margin-left: 150px; display: flex; flex-direction: row; direction: rtl;">
                                                <label style="flex: 0.5; padding: 7px;">الاسم<span style="color: red;">*</span></label>
                                                <input style="text-align: center;flex: 1.05;  margin-left: 95px; width: 50%;" class="form-control" name="low_pressure" type="text" "required>

                                                <label style="padding: 7px;">النسبة<span style="color: red;">*</span></label>
                                                <input style="text-align: center;flex: 1.05; width: 50%;" class="form-control" name="high_pressure" type="text" required>
                                            </div>
                                                <div class="form-group" style="margin-left: 150px; display: flex; flex-direction: row; direction: rtl;">
                                                <label style="flex: 0.5; padding: 7px;">اسم الأب<span style="color: red;">*</span></label>
                                                <input style="text-align: center;flex: 1.05;  margin-left: 60px; width: 50%;" class="form-control" name="low_pressure" type="text" "required>

                                                <label style="padding: 7px;">اسم ونسبة الأم<span style="color: red;">*</span></label>
                                                <input style="text-align: center;flex: 1.05; width: 50%;" class="form-control" name="high_pressure" type="text"required >
                                            </div>

                                            <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                             <label style="flex: 1; padding: 7px;">تاريخ الميلاد<span style="color: red;">*</span></label> 
                                             <input style="text-align: center;flex: 2.1; margin-left: 470px;" class="form-control" name="birth_date" type="date" required oninput="calculateAge()"> </div>

                                          <div class="form-group" style="margin-left: 150px; display: flex; flex-direction: row; direction: rtl;"> 
                                          <label style="flex: 0.5; padding: 7px;">السن<span style="color: red;">*</span></label> 
                                          <input style="text-align: center;flex: 1.05; margin-left: 95px; width: 50%;" class="form-control" name="age" type="number" min="0" max="120" readonly required>

                                                <label style="padding: 7px;">الجنس<span style="color: red;">*</span></label>
                                                <select style="text-align: center;flex: 1.05; width: 50%;" class="form-control" name="high_pressure" type="text" required>
                                                 <option value=""></option>

                                                    <option value="M">ذكر</option>
                                                    <option value="F">انثى</option>
                                                </select>
                                            </div>
<?php
// Generate a random and unique ID of 5 digits
$uniqueId = sprintf("%06d", mt_rand(1, 99999));
?>

<div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
    <label style="flex: 1; padding: 7px;">رقم المتبرع<span style="color: red;">*</span></label>
    <input style="color:darkred ;text-align: center;flex: 1; margin-left: 470px;" class="form-control" name="Donation code" value="<?php echo $uniqueId; ?>">
</div>
                                            

                                            <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;">العنوان <span style="color: red;">*</span></label>
                                            <input  style="text-align: center;flex: 1; margin-left: 470px;" class="form-control" name="national" required>
                                              
                                            </input>
                                            </div>
                                            
                                            <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;">هاتف جوال</label>
                                            <input  style="text-align: center;flex: 1; margin-left: 470px;" class="form-control" name="national" >
                                              
                                            </input>
                                            </div>
                                              <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;">سبب التبرع<span style="color: red;">*</span></label>
                                            <select style="text-align: center;flex: 2.1; margin-left: 470px;" class="form-control" name="medication" required>
                                             <option value=""></option>

                                                    <option value="Patients">مرضي</option>
                                                    <option value="Voluntary">متطوع</option>
                                                    <option value="substitute">بديل</option>

                                            <select/>
                                        </div>
                         
                                     
                                        </div>
                                       




                                        <div style="display: flex; justify-content: center;">




                                            <button type="submit" class="btn btn-primary" style="border-radius: 20px; background-color: #777; color: white; padding: 10px 10px; border: none;font-size:13px;">
                                                Add Donor
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
                <!-- /.row -->
            </div>
            <!-- /.containerfluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    // <script>
        // function myFunction() {
        // var x = document.getElementById("myInput");
        // if (x.type === "password") {
        //  x.type = "text";
        //} else {
        //x.type = "password";
        //}
        // }
        // 
    </script>
    <script> function calculateAge() { const birthDateInput = document.querySelector('input[name="birth_date"]'); const ageInput = document.querySelector('input[name="age"]'); if (birthDateInput.value) { const birthDate = new Date(birthDateInput.value); const today = new Date(); let age = today.getFullYear() - birthDate.getFullYear(); const monthDiff = today.getMonth() - birthDate.getMonth(); if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) { age--; } ageInput.value = age; } else { ageInput.value = ''; } } </script>

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