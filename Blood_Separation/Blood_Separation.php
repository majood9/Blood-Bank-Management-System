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
        #myCheckbox0 {
            transform: scale(1.6);
            /* زيادة حجم العلامة بنسبة معينة */
            margin-right: 5px;
            /* تحديد المسافة بين العلامة والنص */
        }

        #myCheckbox1 {
            transform: scale(1.6);
            /* زيادة حجم العلامة بنسبة معينة */
            margin-right: 5px;
            /* تحديد المسافة بين العلامة والنص */
        }

        #myCheckbox2 {
            transform: scale(1.6);
            /* زيادة حجم العلامة بنسبة معينة */
            margin-right: 5px;
            /* تحديد المسافة بين العلامة والنص */
        }
        #myCheckbox3 {
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

    <script>
        function updateFields(BagtypeValue) {
            if (BagtypeValue === 'QUAD') {
                document.getElementById('BagtypeYesFields').style.display = 'block';
                document.getElementById('BagtypeNoFields').style.display = 'none';
            } else {
                document.getElementById('BagtypeYesFields').style.display = 'none';
                document.getElementById('BagtypeNoFields').style.display = 'block';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('Bagtype').addEventListener('change', function() {
                updateFields(this.value);
            });
            updateFields(document.getElementById('Bagtype').value);
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
    $Test_Number = $data[0];

    $qry = "select * from Blood_Separation  where Test_Number = '$Test_Number' ";
    $result = mysqli_query($conn, $qry);
    if($result->num_rows == 0 ){
    $qry = "select * from Blood_Test join blood on Blood_Test.Donation_Number = blood.Donation_Number where Test_Number = '$Test_Number' ";
    $result = mysqli_query($conn, $qry);





    if ($result->num_rows > 0) {

        if ($row = mysqli_fetch_array($result)) {
            $Test_Number = $row["Test_Number"];
            $Donation_Number = $row["Donation_Number"];
            $Amount_Blood = $row["Amount_Blood"];
            $Donation_Date = $row["Donation_Date"];
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
                                <h1 class="page-header" style="color: #98b8d4; margin: 0; margin-left: auto; margin-right: auto;">Blood Separation</h1>
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
                                            <form role="form" action="Added_Blood_Separation.php" method="post">
                                                <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                    <label style="flex: 1; padding: 7px;" hidden>national</label>
                                                    <input style="flex: 1; margin-left: 500px;" class="form-control" name="Test_Number" type="hidden" value="<?php echo $Test_Number ?>" readonly>
                                                </div>

                                                <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                    <label style="flex: 1; padding: 7px;margin-right:35px;">تاريخ الفصل</label>
                                                    <input style="text-align: center; color:blue;flex: 1; margin-left: 462px;" class="form-control" name="Separation_Date" ; type="text" ; value="<?php echo date('Y-m-d'); ?> " readonly><br><br>
                                                </div>


                                                <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                    <label style="flex: 1; padding: 7px;margin-right:35px;">نوع الكيس<span style="color: red;">*</span></label>
                                                    <select id="Bagtype" style="flex: 1; margin-left: 500px;" class="form-control" ; name="Picking_Type" ; required>
                                                        <option value="QUAD">QUAD</option>
                                                        <option value="SINGLE">SINGLE</option>
                                                    </select>
                                                </div><br>




                                                <div id="BagtypeYesFields">

                                                    <div style="text-align:center;">
                                                        <!-- <div>
    <input type="checkbox" id="myCheckbox" name="RED BLOOD CELLS" value="RED BLOOD CELLS">
    <label for="myCheckbox">ml <input style="width: 50px; height: 24px;color:blue; text-align: center;" name="volume"; type="number"; min="200";max="300">  300-200 RED BLOOD CELLS (<span style="color:blue;">RBC</span>)</label>
</div><br> -->
                                                        <div class="checkbox-container0">
                                                            <input type="checkbox" id="myCheckbox0" name="RED BLOOD CELLS" value="RED BLOOD CELLS SELECTED">
                                                            <label for="myCheckbox0">
                                                                ml <input style="width: 50px; height: 24px; color:blue; text-align: center;" name="volume0" type="number" min="200" max="300" :value="myCheckboxChecked0 ? '200' : ''" :disabled="!myCheckboxChecked0"> 300-200 RED BLOOD CELLS (<span style="color:blue;">RBC</span>)
                                                            </label>
                                                        </div><br>

                                                        <script>
                                                            const myCheckbox0 = document.getElementById('myCheckbox0');
                                                            const volumeInput0 = document.querySelector('.checkbox-container0 input[name="volume0"]');

                                                            let myCheckboxChecked0 = false;

                                                            myCheckbox0.addEventListener('change', () => {
                                                                myCheckboxChecked0 = myCheckbox0.checked;
                                                                myCheckbox0.value = myCheckboxChecked0 ? 'RED BLOOD CELLS SELECTED' : 'RED BLOOD CELLS';
                                                                volumeInput0.disabled = !myCheckboxChecked0;
                                                                volumeInput0.value = myCheckboxChecked0 ? '200' : '';
                                                            });
                                                        </script>



                                                        <div class="checkbox-container1" style="margin-left:33px;">
                                                            <input type="checkbox" id="myCheckbox1" name="FRESH_FROZEN_PLASMA" value="FRESH FROZEN PLASMA SELECTED">
                                                            <label for="myCheckbox1">
                                                                ml <input style="width: 50px; height: 24px; color:blue; text-align: center;" name="volume1" type="number" min="150" max="250" :value="myCheckboxChecked1 ? '150' : ''" :disabled="!myCheckboxChecked1"> 250-150 FRESH FROZEN PLASMA (<span style="color:blue;">FFP</span>)
                                                            </label>
                                                        </div><br>

                                                        <script>
                                                            const myCheckbox1 = document.getElementById('myCheckbox1');
                                                            const volumeInput1 = document.querySelector('.checkbox-container1 input[name="volume1"]');

                                                            let myCheckboxChecked1 = false;

                                                            myCheckbox1.addEventListener('change', () => {
                                                                myCheckboxChecked1 = myCheckbox1.checked;
                                                                myCheckbox1.value = myCheckboxChecked1 ? 'RED BLOOD CELLS SELECTED' : 'RED BLOOD CELLS';
                                                                volumeInput1.disabled = !myCheckboxChecked1;
                                                                volumeInput1.value = myCheckboxChecked1 ? '150' : '';
                                                            });
                                                        </script>



                                                        <div class="checkbox-container2" style="margin-right:52px;">
                                                            <input type="checkbox" id="myCheckbox2" name="PLATELET UNIT" value="PLATELET UNIT SELECTED">
                                                            <label for="myCheckbox2">
                                                                ml <input style="width: 50px; height: 24px; color:blue; text-align: center;" name="volume2" type="number" min="30" max="60" :value="myCheckboxChecked2 ? '30' : ''" :disabled="!myCheckboxChecked2"> 60-30 PLATELET UNIT (<span style="color:blue;">PU</span>)
                                                            </label>
                                                        </div>


                                                        <script>
                                                            const myCheckbox2 = document.getElementById('myCheckbox2');
                                                            const volumeInput2 = document.querySelector('.checkbox-container2 input[name="volume2"]');

                                                            let myCheckboxChecked2 = false;

                                                            myCheckbox2.addEventListener('change', () => {
                                                                myCheckboxChecked2 = myCheckbox2.checked;
                                                                myCheckbox2.value = myCheckboxChecked2 ? 'RED BLOOD CELLS SELECTED' : 'RED BLOOD CELLS';
                                                                volumeInput2.disabled = !myCheckboxChecked2;
                                                                volumeInput2.value = myCheckboxChecked2 ? '30' : '';
                                                            });
                                                        </script>


                                                    </div>
                                                </div>

                                                <div id="BagtypeNoFields" >
                                                    <!-- <div style="text-align:center;" id="checkbox-container3">
                                                        <div>
                                                            <input type="checkbox" id="myCheckbox3" name="WHOLE BLOOD" value="WHOLE_BLOOD">
                                                            <label for="myCheckbox3">
                                                                ml <input style="width: 50px; height: 24px;color:blue; text-align: center;" name="volume3" id="volumeInput3" type="text" min="400" max="500"> 400-500 WHOLE BLOOD (<span style="color:blue;">WB</span>)
                                                            </label>
                                                        </div><br> -->
                                                    <!-- </div> -->
                                                    <div class="checkbox-container3" style="margin-left:215px;">
                                                            <input type="checkbox" id="myCheckbox3" name="PLATELET UNIT" value="PLATELET UNIT SELECTED">
                                                            <label for="myCheckbox3">
                                                                ml <input style="width: 50px; height: 24px; color:blue; text-align: center;" name="volume3" type="number" min="400" max="500" :value="myCheckboxChecked3 ? '400' : ''" :disabled="!myCheckboxChecked3"> 400-500 WHOLE BLOOD (<span style="color:blue;">WB</span>)
                                                            </label>
                                                        </div>
                                                </div>

                                                <script>
                                                            const myCheckbox3 = document.getElementById('myCheckbox3');
                                                            const volumeInput3 = document.querySelector('.checkbox-container3 input[name="volume3"]');

                                                            let myCheckboxChecked3 = false;

                                                            myCheckbox3.addEventListener('change', () => {
                                                                myCheckboxChecked3 = myCheckbox3.checked;
                                                                myCheckbox3.value = myCheckboxChecked3 ? 'RED BLOOD CELLS SELECTED' : 'RED BLOOD CELLS';
                                                                volumeInput3.disabled = !myCheckboxChecked3;
                                                                volumeInput3.value = myCheckboxChecked3 ? '400' : '';
                                                            });
                                                        </script>


                                                <div id="line">
                                                    <hr>
                                                    <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
                                                        <label style="flex: 1; padding: 7px;margin-right:35px;">رقم التبرع <span style="color: red;">*</span></label>
                                                        <input style="text-align: center;flex: 1; margin-left: 465px; color:blue;" class="form-control"  value=<?php echo $Donation_Number; ?> name="Donation_Number" ; type="text" required><br><br>

                                                        </input>
                                                    </div>
                                                </div>











                                        </div>
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">


                                            <thead>
                                                <tr style="background-color:#98b8d4;">
                                                    <th style="text-align:center;color: white;">تاريخ التبرع</th>
                                                    <th style="text-align:center;color: white;">نوع الكيس</th>
                                                    <th style="text-align:center;color: white;">الكمية</th>
                                                    <th style="text-align:center;color: white;">كود الوحدة</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="text-align:center;color:blue;">
                                                    <td><?php echo $Donation_Date ?></td>
                                                    <td><?php echo $Picking_Type ?></td>
                                                    <td><?php echo $Amount_Blood; ?></td>
                                                    <td><?php echo $Donation_Number; ?></td>

                                                </tr>
                                            <tbody>
                                        </table><br>



                                        <div style="display: flex; justify-content: center;">
                                            <button type="submit" class="btn btn-primary" style="border-radius: 7px; margin-top: 30px; background-color: #98b8d4; color: white; padding: 6px 40px; border: none; font-size: 18px;">
                                                حفظ
                                            </button>
                                        </div>




                                        </form>


                                <?php }
                        } else{
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
                                                           <h4>The <span style="color:red;">QR Code </span>Already Exist, Please enter a valid <span style="color:blue;">QR Code.. </span></h4> 
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