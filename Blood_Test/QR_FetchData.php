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
    #myCheckbox {
        transform: scale(1.6); /* زيادة حجم العلامة بنسبة معينة */
        margin-right: 5px; /* تحديد المسافة بين العلامة والنص */
    }
</style>


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
    .form-group {
        margin-bottom: 20px; /* زيادة المسافة بين الفورمات */
    }
</style>

<script>
    // تابع لتحديث إظهار / إخفاء الجزء الأخير بناءً على تحديد الـ checkbox
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('showHideCheckbox').addEventListener('change', function() {
            var hiddenSection = document.getElementById('hiddenSection');
            if (this.checked) {
                hiddenSection.style.display = 'block';
            } else {
                hiddenSection.style.display = 'none';
                // يمكنك إضافة معالجة إضافية هنا إذا لزم الأمر
            }
        });
    });
</script>
</head>

<body>

<?php

include "dbconnect.php";

// if (isset($_GET['qrData'])) {
$qrData = $_GET['qrData'];

// قم بتفكيك بيانات QR code إلى مصفوفة
$data = explode(":", $qrData);

// $Id = $data[5];
$Donation_Number = $data[0];
// $bloodQuantity = $data[2];
// $collectionDate = $data[3];

// قم بتخزين البيانات في جلسة
//     session_start();
//     $_SESSION['bloodId'] = $bloodId;
//     $_SESSION['bloodGroup'] = $bloodGroup;
//     $_SESSION['bloodQuantity'] = $bloodQuantity;
//     $_SESSION['collectionDate'] = $collectionDate;

//     // قم بإعادة توجيه المستخدم إلى صفحة "display.php"
//     header("Location: display.php");
//     exit;
// } else {
//     echo "No QR data provided";
// }
$qry = "select * from Blood_Test where Donation_Number='$Donation_Number' ";
$result = mysqli_query($conn, $qry);
if($result->num_rows == 0){

$qry = "select * from Blood where Donation_Number='$Donation_Number' ";
$result = mysqli_query($conn, $qry);





if($result->num_rows > 0){

if ($row = mysqli_fetch_array($result)) {
    $Donation_Number = $row["Donation_Number"];
    $Donation_Date = $row["Donation_Date"];
    $Blood_Group = $row["Blood_Group"];
    $Amount_Blood = $row["Amount_Blood"];
    $Picking_Type = $row["Picking_Type"];
    $QR = $row["QR"];
    $national = $row["national"];
    $Donor_Number = $row["Donor_Number"];




?>




    <div id="wrapper"> 


        <?php include 'includes/nav.php' ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12" style="display: flex; justify-content: space-between; align-items: center;padding-top:20px;padding-bottom:20px">
                        <h1 class="page-header" style="color: #98b8d4; margin: 0; margin-left: auto; margin-right: auto;">Blood test</h1>
                        <form action="#" method="post" style="margin: 0;">
                            <button type="submit" class="btn btn-primary" style="border-radius: 20px; border-radius: 20px; background-color: #98b8d4; color: white; padding: 5px 15px; border: none; text-transform: uppercase; font-weight: bold;">
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
                                    <form role="form" action="added_blood_test.php" method="post">
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;" hidden>national</label>
                                            <input style="flex: 1; margin-left: 500px;" class="form-control" name="national" type="hidden" value="<?php echo $national ?>" readonly>
                                        </div>
 
                                       <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;margin-right:35px;">تاريخ الفحص</label>
                                            <input style="text-align: center; color:blue;flex: 1; margin-left: 462px;" class="form-control" name="Test_Date"; type="text"; value="<?php echo date('Y-m-d'); ?> "readonly><br><br>
                                        </div>
     <?php
     // Generate a random and unique ID of 5 digits
     $uniqueId = sprintf("TE%08d", mt_rand(1, 99999));
     ?>
                                         <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                            <label style="flex: 1; padding: 7px;margin-right:35px;">رقم الفحص</label>
                                            <input style="text-align: center; color:blue;flex: 1; margin-left: 462px;" class="form-control" name="Test_Number"; type="text"; value="<?php echo $uniqueId; ?>"readonly><br><br>
                                        </div>
                                        <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                          <label style="flex: 1; padding: 7px;margin-right:35px;">رقم التبرع <span style="color: red;">*</span></label> 
                                            <input  style="text-align: center;flex: 1; margin-left: 463px; color:blue;" class="form-control"; name="Donation_Number"; value="<?php echo $Donation_Number ?>" type="text"  required><br><br>
                                              
                                            </input>
                                        </div>
                                                                              

                                        

                                       
                                        <div style="margin-top:30px;">
                                                    <!-- <span style="color: blue; margin-left:19%;">Donation_Date:<span style="color:red;"> <?php echo $Donation_Date ?> </span> &nbsp&nbsp&nbsp&nbsp Blood_Group: <span style="color:red;"><?php echo $Blood_Group ?></span> &nbsp&nbsp&nbsp&nbsp Picking_Type: <span style="color:red;"><?php echo $Picking_Type ?></span> </span> -->
                                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
<?php 

$qry = "select * from Blood where Donation_Number='$Donation_Number' ";
$result = mysqli_query($conn, $qry);





if($result->num_rows > 0){

if ($row = mysqli_fetch_array($result)) {
    $Donation_Number = $row["Donation_Number"];
    $Donation_Date = $row["Donation_Date"];
    $Blood_Group = $row["Blood_Group"];
    $Amount_Blood = $row["Amount_Blood"];
    $Picking_Type = $row["Picking_Type"];
    $QR = $row["QR"];
    $national = $row["national"];
    $Donor_Number = $row["Donor_Number"];
?>

<thead>
      <tr style="background-color:#98b8d4;" >
       <th style="text-align:center;color: white;">تاريخ التبرع</th>
       <th style="text-align:center;color: white;">زمرة الدم</th>
       <th style="text-align:center;color: white;">نوع القطف</th>

      </tr>
      </thead>
                        <tbody>
                         <tr style="text-align:center;color:blue;">
        <td><?php echo $Donation_Date ?></td>
        <td><?php echo $Blood_Group ?></td>
        <td><?php echo $Picking_Type ?></td>

      </tr><tbody>
                              </table>
                                                </div>
                                                
<?php }}


?>


  

                                        

    <hr style="margin-top: 4px;" >
    <div style="text-align:center;">
<div style="margin-right:349px;">
    <label style= "font-size:17px;"> <select style="font-size:12px; color:red; border-radius:8px; width: 90px; height: 30px; text-align: center;" name="Test_HBsAg"; type="text"; required >
                                                    <option value=""></option>
                                                    <option  value="negative">negative</option>
                                                    <option value="positive">positive</option> </select>  Hepatitis B surface Antigen (<span style="color:blue;">HBsAg</span>)</label>
</div><br>
<div style="margin-right:206px;">
    <label style= "font-size:17px;"> <select style="font-size:12px; color:red; border-radius:8px; width: 90px; height: 30px; text-align: center;" name="Test_HCV_Ab_IgG"; type="text"; required >
                                                    <option value=""></option>
                                                    <option value="negative">negative</option>
                                                    <option value="positive">positive</option> </select>  Hepatitis C Virus & Immuno globulin G (<span style="color:blue;">HCV Ab & IgG</span>)</label>
</div><br>
<div style="margin-right:52px;">
    <label style= "font-size:17px;"> <select style="font-size:12px; color:red; border-radius:8px; width: 90px; height: 30px; text-align: center;" name="Test_HIV_1_2_Ag_Ab"; type="text"; required >
                                                    <option value=""></option>
                                                    <option value="negative">negative</option>
                                                    <option value="positive">positive</option> </select>  Human Immunodefciency Virus 1/2 Antigen & Antibodies (<span style="color:blue;">HIV 1/2 Ag&Ab</span>)</label>
</div><br>
<div style="margin-right:385px;">
    <label style= "font-size:17px;"> <select style="font-size:12px; color:red; border-radius:8px; width: 90px; height: 30px; text-align: center;" name="Test_Syphilis_Ab"; type="text"; required >
                                                    <option value=""></option>
                                                    <option value="negative">negative</option>
                                                    <option value="positive">positive</option> </select>  Syphilis Antibodies (<span style="color:blue;">Syphilis Ab</span>)</label>
</div>

<hr>
<div style="text-align:center;">
    <input type="checkbox" id="showHideCheckbox" name="showHideCheckbox" value="checkbox">
    <label style="font-size:16px;" for="showHideCheckbox">تنميط بحسب تبرع العينة</label>
</div><br>
<div id="hiddenSection" style="display: none;">
  <div style="text-align:left;margin-left:37px;">
    <label style= "font-size:17px;"> <select style="font-size:12px; color:red; border-radius:8px; width: 90px; height: 30px; text-align: center;" name="Stereotyping_Capital_C"; type="text"; >
                                                    <option value=""></option>
                                                    <option value="C+">C+</option>
                                                    <option value="C-">C-</option> </select><span style= "margin-left:17px;">C</span></label>
</div><br>
<div style="text-align:left;margin-left:37px;">
    <label style= "font-size:17px;"> <select style="font-size:12px; color:red; border-radius:8px; width: 90px; height: 30px; text-align: center;" name="Stereotyping_Capital_E"; type="text"; >
                                                    <option value=""></option>
                                                    <option value="E+">E+</option>
                                                    <option value="E-">E-</option> </select><span style= "margin-left:17px;">E</span></label>
</div><br>
<div style="text-align:left;margin-left:37px;">
    <label style= "font-size:17px;"> <select style="font-size:12px; color:red; border-radius:8px; width: 90px; height: 30px; text-align: center;" name="Stereotyping_Small_c"; type="text"; >
                                                    <option value=""></option>
                                                    <option value="c+">c+</option>
                                                    <option value="c-">c-</option> </select><span style= "margin-left:17px;">c</span></label>
</div><br>
<div style="text-align:left;margin-left:37px;">
    <label style= "font-size:17px;"> <select style="font-size:12px; color:red; border-radius:8px; width: 90px; height: 30px; text-align: center;" name="Stereotyping_Small_e"; type="text"; >
                                                    <option value=""></option>
                                                    <option value="e+">e+</option>
                                                    <option value="e-">e-</option> </select><span style= "margin-left:17px;">e</span></label>
</div><br>
<div style="text-align:left;margin-left:37px;">
    <label style= "font-size:17px;"> <select style="font-size:12px; color:red; border-radius:8px; width: 90px; height: 30px; text-align: center;" name="Stereotyping_Capital_K"; type="text"; >
                                                    <option value=""></option>
                                                    <option value="K+">K+</option>
                                                    <option value="K-">K-</option> </select><span style= "margin-left:17px;">K</span></label>
</div><br>
</div>
</div>
                                          
       

                                         
                                            

                                           
                                            
                                          
                         
                                     
                                        </div>
                                       




                                        <div style="display: flex; justify-content: center;">




                                            <button type="submit" class="btn btn-primary" style="border-radius: 15px; margin-top:60px; background-color: #98b8d4; color: white; padding: 8px 10px; border: none;font-size:13px;">
                                                SAVE
                                            </button>
                                        </div>




                                    </form>

<?php }} else{
    ?><div id="wrapper">
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
                                   <h4>The <span style="color:red;">QR Code </span>entered is invalid, Please enter a valid <span style="color:blue;">QR Code.. </span></h4> 
                                </div>
                    <?php 
}}else{
    ?><div id="wrapper">
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
                                   <h4>The <span style="color:red;">QR Code </span>Already Exist , Please enter a valid <span style="color:blue;">QR Code.. </span></h4> 
                                </div>
                    <?php 
}

?>





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