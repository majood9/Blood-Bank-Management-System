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
<h5 style=" margin-left: 39%; margin-top: 200px; ">Dep: <span style="color: blue;" >Separation</span> &nbsp; &nbsp; &nbsp; &nbsp; Date: <span style="color: red;" ><?php echo date('Y-m-d'); ?></span> </h5>

<div style="margin-left: 5%; margin-top: -20px;">
        <?php
        include "dbconnect.php";

        $id = $_GET['Unit_Number'];

        $qry = "select * from Blood_Separation where Unit_Number='$id' ";
        $result = mysqli_query($conn, $qry);

        while ($row = mysqli_fetch_array($result)) {
            $Unit_Number = $row["Unit_Number"];
            


           
            echo ' <img style="width:250px; height:250px; margin-left:35%; margin-top:1% " src="data:QR/png;base64,' . $row['QR'] . '" alt="QR Code">';
            echo  '<h3 style="width:250px; height:250px; margin-left:41%; margin-top:0%">'.$Unit_Number.'</h3>';
            
        }
        ?>
    </div>
</body>

</html>