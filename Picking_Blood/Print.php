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
<h5 style=" margin-left: 39%; margin-top: 200px; ">Dep: <span style="color: blue;" >Picking Blood</span> &nbsp; &nbsp; &nbsp; &nbsp; Date: <span style="color: red;" ><?php echo date('Y-m-d'); ?></span> </h5>

<div style="margin-left: 5%; margin-top: -30px;">
        <?php
        include "dbconnect.php";

        $id = $_GET['Donation_Number'];

        $qry = "select * from Blood where Donation_Number='$id' ";
        $result = mysqli_query($conn, $qry);

        while ($row = mysqli_fetch_array($result)) {
            $Donation_Number = $row["Donation_Number"];
            $Donor_Number = $row["Donor_Number"];
            $national = $row["national"];
            $Donation_Date = $row["Donation_Date"];
            $Blood_Group = $row["Blood_Group"];
            $Amount_Blood = $row["Amount_Blood"];
            $Picking_Type = $row["Picking_Type"];

            // include 'barcode128.php';
            // $product = $_POST['product'];
            // $product_id = $_POST['product_id'];
            // $rate = $_POST['rate'];

            // for ($i = 1; $i <= 2; $i++) {
            echo ' <img style="width:250px; height:250px; margin-left:35%; margin-top:1% " src="data:QR/png;base64,' . $row['QR'] . '" alt="QR Code">';
            echo  '<h3 style="width:250px; height:250px; margin-left:40%; margin-top:0%">'.$Donation_Number.'</h3>';
            //echo  '<img style="width:50px; height:50px" src="data:QR/png;base64,' . $_GET['QR'] . '" alt="QR Code">';
            // }
        }
        ?>
    </div>
</body>

</html>