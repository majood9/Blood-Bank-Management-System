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
<h5 style=" margin-left: 39.5%; margin-top: 200px; ">Dep: <span style="color: blue;" >Doctor</span> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Date: <span style="color: red;" ><?php echo date('Y-m-d'); ?></span> </h5>

<div style="margin-left: 5%; margin-top: -280px;">
        <?php
        include "dbconnect.php";

        $id = $_GET['national'];

        $qry = "select * from donor where national='$id' ";
        $result = mysqli_query($conn, $qry);

        while ($row = mysqli_fetch_array($result)) {
            // $Donation_code = $row["Donation_code"];
            // $name = $row["name"];
            // $name_father = $row["name_father"];
            // $name_mother = $row["name_mother"];
            // $name_family = $row["name_family"];
            // $national = $row["national"];
            // $address = $row["address"];
            // $dob = $row["dob"];
            // $gender = $row["gender"];
            // $age = $row["age"];
            // $date_view = $row["date_view"];
            // $donation_reason = $row["donation_reason"];
            // $phone_number = $row["phone_number"];

            // include 'barcode128.php';
            // $product = $_POST['product'];
            // $product_id = $_POST['product_id'];
            // $rate = $_POST['rate'];

            // for ($i = 1; $i <= 2; $i++) {
            echo ' <img style="width:250px; height:250px; margin-left:35%; margin-top:20% " src="data:QR/png;base64,' . $row['QR'] . '" alt="QR Code"> ';
            //echo  '<img style="width:50px; height:50px" src="data:QR/png;base64,' . $_GET['QR'] . '" alt="QR Code">';
            // }
        } 
        ?>
        <h4 style=" margin-left: 41.5%; ">DO<?php echo $id ; ?> </h4>

        
    </div>
</body>

</html>