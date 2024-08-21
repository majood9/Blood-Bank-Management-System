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
            transform: scale(1.6);
            /* زيادة حجم العلامة بنسبة معينة */
            margin-right: 5px;
            /* تحديد المسافة بين العلامة والنص */
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
            margin-bottom: 20px;
            /* زيادة المسافة بين الفورمات */
        }
    </style>


</head>

<body>



    <div id="wrapper">
        <?php include 'includes/nav.php' ?>

        <?php
        include "dbconnect.php";


        $qrData = $_GET['qrData'];

        // قم بتفكيك بيانات QR code إلى مصفوفة
        $data = explode(":", $qrData);

        // $Id = $data[5];
        $Unit_Number = $data[0];

        $qry = "select * from Blood_Stock join blood on Blood_Stock.Donation_Number = blood.Donation_Number where Unit_Number = '$Unit_Number' ";
        $result = mysqli_query($conn, $qry);





        if ($result->num_rows > 0) {

            if ($row = mysqli_fetch_array($result)) {
                if($row['Expiry_Date'] <= date('Y-m-d')){
                $Unit_Number = $row["Unit_Number"];
                $Donation_Number = $row["Donation_Number"];
                $Unit_Type = $row["Unit_Type"];
                $Blood_Group = $row["Blood_Group"];
                $Donation_Date = $row["Donation_Date"];
                $Amount_Blood = $row["Amount_Blood"];
                $Expiry_Date = $row['Expiry_Date'];


        ?>



                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-12" style="display: flex; justify-content: space-between; align-items: center;padding-top:20px;padding-bottom:20px">
                                <h1 class="page-header" style="color: #777; margin: 0; margin-left: auto; margin-right: auto;">Release Units</h1>
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



                                    <div class="panel-body">
                                        <div class="row">
                                            <form role="form" action="Added_Release_Blood.php" method="post">
                                                <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                    <label style="flex: 1; padding: 7px;" hidden>national</label>
                                                    <input style="flex: 1; margin-left: 500px;" class="form-control" name="national_id" type="hidden" value="<?php echo $id ?>" readonly>
                                                </div><br>


                                                <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                    <label style="flex: 1; padding: 7px;margin-right:35px;">كود الوحدة <span style="color: red;">*</span></label> <?php ?>
                                                    <input placeholder="كود الوحدة" style="text-align: center;flex: 1; margin-left: 465px; color:darkred;" class="form-control" ; name="Unit_Number" ; value="<?php echo $Unit_Number; ?>" type="text" required><br><br>

                                                    </input>
                                                </div><br>
                                                <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                    <label style="flex: 1; padding: 7px;margin-right:35px;">كود مكون الدم <span style="color: red;">*</span></label>
                                                    <input placeholder="كود مكون الدم" style="text-align: center;flex: 1; margin-left: 465px; color:darkred;" class="form-control" ; name="Donation_Number" ; type="text" value="<?php echo $Donation_Number; ?>" required><br><br>

                                                    </input>
                                                </div><br>















                                                <div id="line">
                                                    <hr><br>




                                                </div><br>











                                        </div>

                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">


                                            <thead>
                                                <tr style="background-color:#777;">
                                                    <th style="text-align:center;color: white;">تاريخ الصلاحية</th>
                                                    <th style="text-align:center;color: white;">الكمية</th>
                                                    <th style="text-align:center;color: white;">مكون الدم</th>
                                                    <th style="text-align:center;color: white;">زمرة الدم</th>
                                                    <th style="text-align:center;color: white;">كود مكون الدم</th>
                                                    <th style="text-align:center;color: white;">كود الوحدة</th>



                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="text-align:center;color:darkred;">

                                                    <td name="Expiry_Date" value="<?php echo $Expiry_Date; ?>"><?php echo $Expiry_Date; ?></td>
                                                    <td name="Blood_Amount" value="<?php echo $Amount_Blood; ?>"><?php echo $Amount_Blood; ?></td>
                                                    <td name="Unit_Type" value="<?php echo $Unit_Type; ?>"><?php echo $Unit_Type; ?></td>
                                                    <td name="Blood_Group" value="<?php echo $Blood_Group; ?>"><?php echo $Blood_Group; ?></td>
                                                    <td name="Unit_Number" value="<?php echo $Unit_Number; ?>"><?php echo $Unit_Number; ?></td>
                                                    <td name="Donation_Number" value="<?php echo $Donation_Number; ?>"><?php echo $Donation_Number; ?></td>

                                                </tr>
                                            <tbody>
                                        </table><br>



                                        <div style="display: flex; justify-content: center;">
                                            <button type="submit" class="btn btn-primary" style="border-radius: 7px; margin-top: 100px; background-color: #777; color: white; padding: 8px 100px; border: none; font-size: 16px;">
                                                إفراج
                                            </button>
                                        </div>
                                        <label style="flex: 1; padding: 7px;" hidden>national</label>
                                        <input style="flex: 1; margin-left: 500px;" class="form-control" name="Expiry_Date" type="hidden" value="<?php echo $Expiry_Date ?>" readonly>
                                        <label style="flex: 1; padding: 7px;" hidden>national</label>
                                        <input style="flex: 1; margin-left: 500px;" class="form-control" name="Blood_Amount" type="hidden" value="<?php echo $Amount_Blood ?>" readonly>
                                        <label style="flex: 1; padding: 7px;" hidden>national</label>
                                        <input style="flex: 1; margin-left: 500px;" class="form-control" name="Unit_Type" type="hidden" value="<?php echo $Unit_Type ?>" readonly>
                                        <label style="flex: 1; padding: 7px;" hidden>national</label>
                                        <input style="flex: 1; margin-left: 500px;" class="form-control" name="Blood_Group" type="hidden" value="<?php echo $Blood_Group ?>" readonly>
                                        <label style="flex: 1; padding: 7px;" hidden>national</label>
                                        <input style="flex: 1; margin-left: 500px;" class="form-control" name="Unit_Number" type="hidden" value="<?php echo $Unit_Number ?>" readonly>
                                        <label style="flex: 1; padding: 7px;" hidden>national</label>
                                        <input style="flex: 1; margin-left: 500px;" class="form-control" name="Donation_Number" type="hidden" value="<?php echo $Donation_Number ?>" readonly>
                                        <label style="flex: 1; padding: 7px;" hidden>national</label>
                                        <input style="flex: 1; margin-left: 500px;" class="form-control" name="Release_Date" type="hidden" value="<?php echo date('Y-m-d'); ?>" readonly>




                                        </form>



                                    <?php }else{ ?>
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
                                                                    echo "<div style='text-align: center'><h4>SUBMITTED FAILED (<span style='color:blue;'>$Unit_Type</span>), This Unit Is Not Expired  </h4>";
                                                                    echo '<h5><a href="Add_Release_By_QR Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
                                                                
                                    }
                            } }else { ?>
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
                                                                    echo "<div style='text-align: center'><h4>SUBMITTED FAILED (<span style='color:blue;'>$Unit_Type</span>), This Unit Is Not Found IN Database  </h4>";
                                                                    echo '<h5><a href="Add_Release_By_QR Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
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

                                <?php  } ?>


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