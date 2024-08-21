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


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
    .additional-content {
        width: 350px; /* زيادة العرض */
        height: 490px;
        position:fixed;
        margin-top:25px;
        top: 46.4%; /* تم رفع قيمة الـ top إلى 40% */
        right: 20px;
        transform: translateY(-50%);
        z-index: 999;
        background-color: white;
        padding: 70px;
        box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        border: 0.5px solid #ccc; /* إضافة إطار خفيف */
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: flex-start;
    }
    
     .additional-content-text {
        
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: flex-start;
padding:8px;
    }
     .additional-content-text1 {
        
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: flex-end;
        margin-right: 60px;
        margin-top: -73px;

        
    }
</style>
<style>
    .form-group {
        margin-bottom: 20px; /* زيادة المسافة بين الفورمات */
    }
</style>
</head>

<body>
<div class="additional-content">

  <div class="additional-content-text1" >
   
<span style='font-size: 80px; '>👤</span>
<span style='font-size: 20px;color:blue; '>Full Name</span>


   </div>
    
    <div class="additional-content-text" style="margin-top:35px;">
   

 <div>

 <span style='font-size: larger;color:black; '>الرقم الوطني </span>
  <span style='font-size: larger;color:black; '>:</span>

  <span style='font-size: 14px;color:blue; margin-right:4px;'>0900000000</span>
   <span style='font-size: larger;color:black; '>🌐</span>


 
 </div><br>
<div>


  <span style='font-size: larger;color:blue; margin-right:4px; '>F | M</span>
  <span style='font-size: larger;color:black; '>:</span>

  <span style='font-size: larger;color:black; '> الجنس</span>

   <span style='font-size: larger;color:black; '>⚧️</span>


 
 </div><br>
 <div>

 <span style='font-size: larger;color:black; '>تاريخ التولد</span>
  <span style='font-size: larger;color:black; '>:</span>

  <span style='font-size: larger;color:blue; margin-right:4px;'>1/1/2024</span>
   <span style='font-size: larger;color:black; '>📅</span>


 
 </div><br>
  <div>


  <span style='font-size: larger;color:blue; margin-right:4px; '>Damascus</span>
  <span style='font-size: larger;color:black; '>:</span>

  <span style='font-size: larger;color:black; '>العنوان</span>

   <span style='font-size: larger;color:black; '>📌</span>


 
 </div><br>
  <div hidden>

  <video id="qr-video" style="display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: flex-end;
        margin-right: -50px;
        margin-top: -13px; " type="hidden" width="300px" height="140px"></video>
                                            <script src="https://cdn.rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
                                            <script>
                                                let scanner = new Instascan.Scanner({
                                                    video: document.getElementById('qr-video')
                                                });
                                                scanner.addListener('scan', function(content) {
                                                    fetch('fetchData.php?qrData=')
                                                        .then(response => response.text())
                                                        .then(data => {
                                                            window.location.href = "QR_FetchData.php?qrData=" + content;
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

 
 </div><br>


   </div>
 </div>


    <div id="wrapper"> 


        <?php include 'includes/nav.php' ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12" style="display: flex; justify-content: space-between; align-items: center;padding-top:20px;padding-bottom:20px">
                        <h1 class="page-header" style="color: red; margin: 0; margin-left: auto; margin-right: auto;">PICKING BLOOD</h1>
                        <form action="user2dashboard.php" method="post" style="margin: 0;">
                            <button type="submit" class="btn btn-primary" style="border-radius: 20px; border-radius: 20px; background-color: #2ECC71; color: white; padding: 5px 15px; border: none; text-transform: uppercase; font-weight: bold;">
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
                                    <form role="form" action="addtest.php" method="post">
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;" hidden>national</label>
                                            <input style="flex: 1; margin-left: 500px;" class="form-control" name="national_id" type="hidden" value="<?php echo $id ?>" readonly><br><br>
                                        </div>
 
                                         <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                          <label style="flex: 1; padding: 7px;margin-right:35px;">رقم المتبرع <span style="color: red;">*</span></label> 
                                            <input  style="text-align: center;flex: 1; margin-left: 440px;" class="form-control" name="national" required><br><br>
                                              
                                            </input>
                                        </div>
                                                                               <?php
                                                                                // Generate a random and unique ID of 5 digits
                                                                                $uniqueId = sprintf("SDAU%007d", mt_rand(1, 99999));
                                                                                ?>

                                         <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                          <label style="flex: 1; padding: 7px;margin-right:35px;">رقم التبرع </label> 
                                            <input  style="text-align: center;flex: 1; margin-left: 440px; color:blue;" class="form-control" name="national" value="<?php echo $uniqueId; ?>" readonly><br><br>
                                              
                                            </input>
                                        </div>

                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;margin-right:35px;">تاريخ التبرع</label>
                                            <input style="text-align: center; color:blue;flex: 1; margin-left: 440px;" class="form-control" name="date_view" type="text" value="<?php echo date('Y-m-d'); ?> "readonly><br><br>
                                        </div>
                                      

                                        


                             <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                          <!-- <label style="flex: 0.5; padding: 7px;margin-right:35px;">زمرة الدم <span style="color: red;">*</span></label> 
                                            <input  style="text-align: center;flex: 1.8; margin-left: 55px;" class="form-control" name="national" type="text" required><br><br> -->
                                            <label style="flex: 0.6; padding: 7px;margin-right:35px;">زمرة الدم <span style="color: red;">*</span></label> 
                                            <input  style="text-align: center;flex: 1; margin-left: 55px;" class="form-control" value="<?php echo $row['Blood_Group']; ?>" name="Blood_Group" type="text" required readonly><br><br>
                                                                                 


                                          <label style="flex: 0.5; padding: 7px;margin-right:35px;">نوع الكيس <span style="color: red;">*</span></label> 
                                            <input  style="text-align: center;flex: 1; margin-left: 80px;margin-top: 2px;" class="form-control" name="national" type="text" required><br><br>
                                                                            

                                        </div>
                                         <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                          <label style="flex: 1; padding: 7px;margin-right:35px;">  كمية الدم  <span style="color: red;">*</span></label> 
                                            <input  style="text-align: center;flex: 1; margin-left: 440px;" class="form-control" name="national type: Number;" required><br><br>
                                              
                                            </input>
                                        </div>
                                          
       

                                         
                                            

                                           
                                            
                                          
                         
                                     
                                        </div>
                                       




                                        <div style="display: flex; justify-content: center;">




                                            <button type="submit" class="btn btn-primary" style="border-radius: 20px; margin-top:60px; background-color: #2ECC71; color: white; padding: 10px 10px; border: none;font-size:13px;">
                                                Add Donation
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