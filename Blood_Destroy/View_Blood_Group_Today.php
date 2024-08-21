<html>


<head>


    <title>BDMS</title>

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

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">


                    <div class=".col-lg-12">



                        <h1 class="page-header">Destroy Bloods Group Detail</h1>

                    </div>
                </div>



                <div class="row">

                    <div class=".col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                Total Records of available Bloods Group


                                <form action="View_Blood_Stock.php" method="" style="display:inline;">

                                    <div class="input-group mb-3" style="margin-left:75%; margin-top:-22px; display: flex;">
                                        <input type="text" name="search" value="<?php if (isset($_GET['search'])) {
                                                                                    echo $_GET['search'];
                                                                                } ?>" class="form-control" placeholder="Search data">
                                        <button style="margin-left:-2px;" type="submit" class="btn btn-primary">Search</button>


                                    </div>
                                </form>
                            </div>


                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                        <?php

                                        include "dbconnect.php";
                                        $d = date('Y-m-d');




                                        echo "
						<thead>
						<tr>
							
							<th>Destruction Number</th>
							<th>Donation Number</th>
							<th>Destruction Date</th>
							<th>First Reason</th>
							<th>Second Reason</th>
							<th>Blood Group</th>
							<th>Amount Blood</th>
							<th>Donation Date</th>
							


						</tr>
						</thead>";
                                        

                                            if (isset($_GET['search'])) {


                                                $filtervalues = $_GET['search'];
                                                $qry = "SELECT * FROM Destroy_Blood_Group WHERE Destruction_Date = '$d' and CONCAT(Unit_Type) LIKE '$filtervalues%' ";
                                                $result = mysqli_query($conn, $qry);


                                                while ($row = mysqli_fetch_array($result)) {
                                                    // if ($row['Expiry_Date'] >= date('Y-m-d')) { ?>
                                                        <!-- <script>
                                                            // دالة لإظهار الإشعار المنبثق
                                                            function showNotification() {
                                                                alert("The Unit That is Stocked_id: <?php echo $row['Stock_id']; ?> Expiry..");
                                                                window.location.href = "View_Blood_Stock.php?qrData=" + content;

                                                            }
                                                        </script>
                                                        <script>
                                                            // استدعاء الدالة لإظهار الإشعار المنبثق
                                                            showNotification();
                                                        </script> -->
                                                    <?php

                                                        echo "<tbody style='color:red;'>
                                                <tr>
                                                          <td>" . $row['B_Destruction_Number'] . "</td>
                                                          <td>" . $row['Donation_Number'] . "</td>
                                                          <td>" . $row['B_Destruction_Date'] . "</td>
                                                          <td>" . $row['B_First_Reason'] . "</td>
                                                          <td>" . $row['B_Second_Reason'] . "</td>
                                                <td>" . $row['B_Blood_Group'] . "</td>
                                                <td>" . $row['B_Amount_Blood'] . "</td>
                                                <td>" . $row['Donation_Date'] . "</td>
                                      
                                              </tr>
                                              <tbody>
                                              ";
                                            //         } elseif ($row['Expiry_Date'] < date('Y-m-d')) {

                                            //             echo "<tbody style='color:red;'>
                                            //     <tr>
                                            //               <td>" . $row['B_Destruction_Number'] . "</td>
                                            //               <td>" . $row['Donation_Number'] . "</td>
                                            //               <td>" . $row['B_Destruction_Date'] . "</td>
                                            //               <td>" . $row['B_First_Reason'] . "</td>
                                            //               <td>" . $row['B_Second_Reason'] . "</td>
                                            //     <td>" . $row['B_Blood_Group'] . "</td>
                                            //     <td>" . $row['B_Amount_Blood'] . "</td>
                                            //     <td>" . $row['Donation_Date'] . "</td>
                                      
                                            //   </tr>
                                            //   <tbody>
                                            //   ";
                                            //         }
                                            //     }
                                            





                                                }
                                            }
                                            else{

                                                $qry = "select * from Destroy_Blood_Group where B_Destruction_Date = '$d'  ";
                                                $result = mysqli_query($conn, $qry);






                                                while ($row = mysqli_fetch_array($result)) {
                                                       
                                        

                                                    echo "<tbody style='color:red;'>
                                                    <tr>
                                                              <td>" . $row['B_Destruction_Number'] . "</td>
                                                              <td>" . $row['Donation_Number'] . "</td>
                                                              <td>" . $row['B_Destruction_Date'] . "</td>
                                                              <td>" . $row['B_First_Reason'] . "</td>
                                                              <td>" . $row['B_Second_Reason'] . "</td>
                                                    <td>" . $row['B_Blood_Group'] . "</td>
                                                    <td>" . $row['B_Amount_Blood'] . "</td>
                                                    <td>" . $row['Donation_Date'] . "</td>
                                          
                                                  </tr>
                                                  <tbody>
                                                  ";
                                                  
                                            }
                                        }
                                    
                                
                                        


                                        ?>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

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