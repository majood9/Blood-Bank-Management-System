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
        <?php
        include "dbconnect.php";


        $qrData = $_GET['qrData'];

        // قم بتفكيك بيانات QR code إلى مصفوفة
        $data = explode(":", $qrData);

        // $Id = $data[5];

        $Donation_code = $data[0];
        $national = $data[1];
        $name = $data[2];
        $name_father = $data[3];
        $name_mother = $data[4];
        $name_family = $data[5];
        $address = $data[6];
        $dob = $data[7];
        $gender = $data[8];
        $date_view = $data[9];
        $phone_number = $data[12];


        if (strlen((string)$Donation_code) == 6) {
            $qry = "select * from donor where national = '$national' ";
            $result = mysqli_query($conn, $qry);
            $row = $result->fetch_assoc();

            $qry1 = "select * from Test where national_id = '$national' ";
            $result1 = mysqli_query($conn, $qry1);
            $row1 = $result1->fetch_assoc();


            if ($result->num_rows == 0 || ($result->num_rows == 1 && date('Y-m-d') - $row['date_view'] >= 90) || ($result->num_rows == 1 && date('Y-m-d') - $row['date_view'] >= 1 && $row1['status'] == 'No') || ($result->num_rows == 1 && date('Y-m-d') - $row['date_view'] >= 120 && $row1['eligible'] == 'Yes')) {







                // $qry = "select * from donor join status on donor.national = status.national where donor.national = '$national' and status.Donation_Code = '$Donation_code' ";
                // $result = mysqli_query($conn, $qry);





                // if ($result->num_rows <= 0) {





        ?>



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
                                            <form role="form" action="Added_Donor.php" method="post" style=" margin-right: 20px; ">


                                                <div class="form-group" style="display: flex; flex-direction: row; direction: rtl; margin-top: 20px;">
                                                    <label style="flex: 1; padding: 7px;">تاريخ العرض</label>
                                                    <input style="text-align: center; color:darkred;flex: 1; margin-left: 470px;" class="form-control" name="date_view" type="text" value="<?php echo date('Y-m-d'); ?>">
                                                </div>


                                                <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                    <label style="flex: 1; padding: 7px;">civil id</label>
                                                    <input style="text-align: center;flex: 1; margin-left: 470px;" class="form-control" name="national" value="<?php echo $national; ?>" required>

                                                    </input>
                                                </div>



                                                <div class="form-group" style="margin-left: 150px; display: flex; flex-direction: row; direction: rtl;">
                                                    <label style="flex: 0.5; padding: 7px;">الاسم<span style="color: red;">*</span></label>
                                                    <input style="text-align: center;flex: 1.05;  margin-left: 95px; width: 50%;" class="form-control" name="name" type="text" value="<?php echo $name; ?>" required>

                                                    <label style="padding: 7px;">النسبة<span style="color: red;">*</span></label>
                                                    <input style="text-align: center;flex: 1.05; width: 50%;" class="form-control" name="name_family" type="text" value="<?php echo $name_family; ?>" required>
                                                </div>
                                                <div class="form-group" style="margin-left: 150px; display: flex; flex-direction: row; direction: rtl;">
                                                    <label style="flex: 0.5; padding: 7px;">اسم الأب<span style="color: red;">*</span></label>
                                                    <input style="text-align: center;flex: 1.05;  margin-left: 60px; width: 50%;" class="form-control" name="name_father" type="text" value="<?php echo $name_father; ?>" required>

                                                    <label style=" padding: 7px;">اسم ونسبة الأم<span style="color: red;">*</span></label>
                                                    <input style="text-align: center;flex: 1.05; width: 50%;" class="form-control" name="name_mother" value="<?php echo $name_mother; ?>" type=" text" required>
                                                </div>

                                                <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                    <label style="flex: 1; padding: 7px;">تاريخ الميلاد<span style="color: red;">*</span></label>
                                                    <input style="text-align: center;flex: 2.1; margin-left: 470px;" class="form-control" name="dob" type="date" value="<?php echo $dob; ?>" required>
                                                </div>

                                                <div class="form-group" style="margin-left: 150px; display: flex; flex-direction: row; direction: rtl;">
                                                    <label style="flex: 0.5; padding: 7px;">السن<span style="color: red;">*</span></label>
                                                    <input style="text-align: center;flex: 1.05; margin-left: 95px; width: 50%;" class="form-control" name="age" type="number" min="0" max="120" value="<?php echo  date('Y-m-d') - $dob; ?>" readonly required>

                                                    <label style="padding: 7px;">الجنس<span style="color: red;">*</span></label>
                                                    <select style="text-align: center;flex: 1.05; width: 50%;" class="form-control" name="gender" type="text" value="<?php echo $gender; ?>" required>
                                                        <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>

                                                        <option value=" "></option>
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
                                                    <input style="text-align: center;flex: 1; margin-left: 470px;" class="form-control" name="address" value="<?php echo $address; ?>" required>

                                                    </input>
                                                </div>

                                                <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                    <label style="flex: 1; padding: 7px;">هاتف جوال</label>
                                                    <input style="text-align: center;flex: 1; margin-left: 470px;" class="form-control" value="<?php echo $phone_number; ?>" name="phone_number">

                                                    </input>
                                                </div>
                                                <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                    <label style="flex: 1; padding: 7px;">سبب التبرع<span style="color: red;">*</span></label>
                                                    <select style="text-align: center;flex: 2.1; margin-left: 470px;" class="form-control" name="donation_reason" required>
                                                        <option value=""></option>

                                                        <option value="Patients">مرضي</option>
                                                        <option value="Voluntary">متطوع</option>
                                                        <option value="substitute">بديل</option>

                                                    </select>
                                                </div>


                                        </div>





                                        <div style="display: flex; justify-content: center;">




                                            <button type="submit" class="btn btn-primary" style="border-radius: 20px; background-color: #777; color: white; padding: 10px 10px; border: none;font-size:13px;">
                                                Add Donor
                                            </button>
                                        </div>




                                        </form>



                                    <?php } elseif ($result->num_rows == 1 && date('Y-m-d') - $row['date_view'] < 90 && $row1['eligible'] == 'Yes' && $row1['status'] == 'Yes') { ?>
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
                                                                        $f = date('Y-m-d', strtotime('+3 months', strtotime($row['date_view'])));
                                                                        echo "<div style='text-align: center'><h4>SUBMITTED FAILED, This Donor Donation On: <span style='color: red;'>{$row['date_view']}</span>  </h4>";
                                                                        echo "<div style='text-align: center'><h4>Next Donation Date: <span style='color: red;'>{$f}</span>  </h4>";
                                                                        echo '<h5><a href="Add_Donor_By_QR_Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
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

                                    <?php } elseif ($result->num_rows == 1 && date('Y-m-d') - $row['date_view'] < 1 && $row1['status'] == 'No' && $row1['eligible'] == 'Yes') { ?>
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
                                                                        $f = date('Y-m-d', strtotime('+1 days', strtotime($row['date_view'])));
                                                                        echo "<div style='text-align: center'><h4>SUBMITTED FAILED, This Donor Tested On: <span style='color:red;'>{$row['date_view']}</span>   </h4>";
                                                                        echo "<div style='text-align: center'><h4>Next Admission date: <span style='color:red;'>{$f}</span>   </h4>";
                                                                        echo '<h5><a href="Add_Donor_By_QR_Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
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

                                    <?php } elseif ($result->num_rows == 1 && date('Y-m-d') - $row['date_view'] < 120 && $row1['eligible'] == 'No') { ?>
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
                                                                        $f = date('Y-m-d', strtotime('+6 months', strtotime($row['date_view'])));
                                                                        echo "<div style='text-align: center'><h4>SUBMITTED FAILED, This Donor Tested On: <span style='color:red;'>{$row['date_view']}</span> </h4>";
                                                                        echo "<div style='text-align: center'><h4>Next Admission date: <span style='color:red;'>{$f}</span> </h4>";
                                                                        echo '<h5><a href="Add_Donor_By_QR_Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
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

                                    <?php } elseif ($result->num_rows == 1 && date('Y-m-d') - $row['date_view'] < 120 && $row1['eligible'] == 'Yes') { ?>
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
                                                                        echo "<div style='text-align: center'><h4>SUBMITTED FAILED (<span style='color:blue;'>{$row['date_view']}</span>), This QR Code Is Invalid  </h4>";
                                                                        echo '<h5><a href="Add_Donor_By_QR_Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
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

                                    <?php }
                            } else { ?>

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
                                                                    echo "<div style='text-align: center'><h4>SUBMITTED FAILED (<span style='color:blue;'>$Unit_Type</span>), This QR Code Is Invalid  </h4>";
                                                                    echo '<h5><a href="Add_Donor_By_QR_Code.php" style="color: red; text-decoration: none;">Enter QR Code Again?</a></h5> ';
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