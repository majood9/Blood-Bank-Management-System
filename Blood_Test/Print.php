<html>

<head>
    <style>
        p.inline {
            display: inline-block;
        }

        span {
            font-size: 13px;
        }
    </style>
    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0mm;
            /* this affects the margin in the printer settings */

        }
    </style>
</head>

<body onload="window.print();">
<h5 style=" margin-left: 39.5%; margin-top: 200px; ">Dep: <span style="color: blue;" >Reception</span> &nbsp; &nbsp; &nbsp; &nbsp; Date: <span style="color: red;" ><?php echo date('Y-m-d'); ?></span> </h5>

<div style="margin-left: 5%; margin-top: -20px;">
        <?php
        include "dbconnect.php";

        $id = $_GET['Test_Number'];

        $qry = "select * from Blood_Test where Test_Number='$id' ";
        $result = mysqli_query($conn, $qry);

        while ($row = mysqli_fetch_array($result)) {
            $Test_Number = $row["Test_Number"];
            $Donation_Number = $row["Donation_Number"];
            $Test_Date = $row["Test_Date"];
            $Test_HBsAg = $row["Test_HBsAg"];
            $Test_HCV_Ab_IgG = $row["Test_HCV_Ab_IgG"];
            $Test_HIV_1_2_Ag_Ab = $row["Test_HIV_1_2_Ag_Ab"];
            $Test_Syphilis_Ab = $row["Test_Syphilis_Ab"];
            $Stereotyping_Capital_C = $row["Stereotyping_Capital_C"];
            $Stereotyping_Capital_E = $row["Stereotyping_Capital_E"];
            $Stereotyping_Small_c = $row["Stereotyping_Small_c"];
            $Stereotyping_Small_e = $row["Stereotyping_Small_e"];
            $Stereotyping_Capital_K = $row["Stereotyping_Capital_K"];


            // include 'barcode128.php';
            // $product = $_POST['product'];
            // $product_id = $_POST['product_id'];
            // $rate = $_POST['rate'];

            // for ($i = 1; $i <= 2; $i++) {
            echo ' <img style="width:250px; height:250px; margin-left:35%; margin-top:1% " src="data:QR/png;base64,' . $row['QR'] . '" alt="QR Code">';
            echo  '<h3 style="width:250px; height:250px; margin-left:41%; margin-top:0%">'.$Test_Number.'</h3>';
            //echo  '<img style="width:50px; height:50px" src="data:QR/png;base64,' . $_GET['QR'] . '" alt="QR Code">';
            // }
        }
        ?>
        
    </div>
    <!-- <h4 style=" margin-left: 41.5%; ">RE<?php echo $id ; ?> </h4> -->

</body>

</html>