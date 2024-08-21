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



                        <h1 class="page-header">Bloods Stock Detail</h1>

                    </div>
                </div>



                <div class="row">

                    <div class=".col-lg-12">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                Total Records of available Bloods Stock


                                <form action="View_Blood_Stock.php" method="" style="display:inline;">
                                    <!-- <div class="form-group" style="display: flex; flex-direction: row; direction: rtl;">
										<label style="flex: 1;margin-right: 605px; padding: 7px;">سبب التبرع</label>
										<select style="text-align: center;flex: 4; " class="form-control" name="donation_reason" >
											<option value=""></option>

											 <option value="Total">Total</option> 
											<option value="Patients">مرضي</option>
											<option value="Voluntary">متطوع</option>
											<option value="substitute">بديل</option>

										</select>
										
										

									</div> -->

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




                                        
                                        // if (isset($_GET['search'])) {


                                        //     $filtervalues = $_GET['search'];
                                        //     $qry = "SELECT * FROM Blood_Drainage WHERE CONCAT(Unit_Type) LIKE '$filtervalues%' ";
                                        //     $result = mysqli_query($conn, $qry);


                                        //     while ($row = mysqli_fetch_array($result)) {
                                        //         echo "<tbody>
                                        //         <tr>
                                        //                   <td>" . $row['Request_Number'] . "</td>
                                        //                   <td>" . $row['Stock_id'] . "</td>

                                        //         <td>" . $row['Request_Party'] . "</td>
                                        //         <td>" . $row['Request_Date'] . "</td>
                                        //         <td>" . $row['Financier'] . "</td>
                                        //         <td>" . $row['Priority'] . "</td>
                                        //         <td>" . $row['Recipient_Name'] . "</td>
                                        //         <td>" . $row['Unit_Type'] . "</td>
                                        //         <td>" . $row['Blood_Group'] . "</td>
                                        //         <td>" . $row['Amount_Blood'] . "</td>
                                        //         <td>" . '<a href="upload.php?Unit_Number=' . $row['Unit_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>


                                        //       </tr>
                                        //       <tbody>
                                        //       ";
                                        //     }
                                        // } else {





                                        if ($_POST['Search'] == 'Supplied Units') {
                                            echo "
						<thead>
						<tr>
							
							<th>Request Number</th>
							<th>Stock Number</th>
							<th>Request Party</th>
							<th>Request Date</th>
							<th>Financier</th>
							<th>Priority</th>
							<th>Recipient Name</th>
							<th>Unit Type</th>
							<th>Blood Group</th>
							<th>Amount Blood</th>
							<th>QR Code</th>


						</tr>
						</thead>";
                                            if($_POST['Requesting_Party'] != 'Total' && $_POST['Unit_Type'] != 'Total' && $_POST['Priority'] != 'Total'){
                                            $qry = "select * from Blood_Drainage where Requesting_Party = '{$_POST['Requesting_Party']}' and Unit_Type = '{$_POST['Unit_Type']}' and Priority = '{$_POST['Priority']}'  ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {
                                                if ($row['Request_Date'] >= $_POST['From'] && $row['Request_Date'] <= $_POST['To']) {

                                                    echo "<tbody>
                                                <tr>
                                                          <td>" . $row['Request_Number'] . "</td>
                                                          <td>" . $row['Stock_id'] . "</td>
                                      
                                                <td>" . $row['Requesting_Party'] . "</td>
                                                <td>" . $row['Request_Date'] . "</td>
                                                <td>" . $row['Financier'] . "</td>
                                                <td>" . $row['Priority'] . "</td>
                                                <td>" . $row['Recipient_Name'] . "</td>
                                                <td>" . $row['Unit_Type'] . "</td>
                                                <td>" . $row['Blood_Group'] . "</td>
                                                <td>" . $row['Amount_Blood'] . "</td>
                                                <td>" . '<a href="upload.php?Unit_Number=' . $row['Unit_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                      
                                      
                                              </tr>
                                              <tbody>
                                              ";
                                                }
                                            }
                                        }
                                            elseif($_POST['Requesting_Party'] != 'Total' && $_POST['Unit_Type'] != 'Total' && $_POST['Priority'] == 'Total'){
                                            $qry = "select * from Blood_Drainage where Requesting_Party = '{$_POST['Requesting_Party']}' and Unit_Type = '{$_POST['Unit_Type']}'   ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {
                                                if ($row['Request_Date'] >= $_POST['From'] && $row['Request_Date'] <= $_POST['To']) {

                                                    echo "<tbody>
                                                <tr>
                                                          <td>" . $row['Request_Number'] . "</td>
                                                          <td>" . $row['Stock_id'] . "</td>
                                      
                                                <td>" . $row['Requesting_Party'] . "</td>
                                                <td>" . $row['Request_Date'] . "</td>
                                                <td>" . $row['Financier'] . "</td>
                                                <td>" . $row['Priority'] . "</td>
                                                <td>" . $row['Recipient_Name'] . "</td>
                                                <td>" . $row['Unit_Type'] . "</td>
                                                <td>" . $row['Blood_Group'] . "</td>
                                                <td>" . $row['Amount_Blood'] . "</td>
                                                <td>" . '<a href="upload.php?Unit_Number=' . $row['Unit_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                      
                                      
                                              </tr>
                                              <tbody>
                                              ";
                                                }
                                            }
                                        }
                                            elseif($_POST['Requesting_Party'] != 'Total' && $_POST['Unit_Type'] == 'Total' && $_POST['Priority'] != 'Total'){
                                            $qry = "select * from Blood_Drainage where Requesting_Party = '{$_POST['Requesting_Party']}' and Priority = '{$_POST['Priority']}'   ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {
                                                if ($row['Request_Date'] >= $_POST['From'] && $row['Request_Date'] <= $_POST['To']) {

                                                    echo "<tbody>
                                                <tr>
                                                          <td>" . $row['Request_Number'] . "</td>
                                                          <td>" . $row['Stock_id'] . "</td>
                                      
                                                <td>" . $row['Requesting_Party'] . "</td>
                                                <td>" . $row['Request_Date'] . "</td>
                                                <td>" . $row['Financier'] . "</td>
                                                <td>" . $row['Priority'] . "</td>
                                                <td>" . $row['Recipient_Name'] . "</td>
                                                <td>" . $row['Unit_Type'] . "</td>
                                                <td>" . $row['Blood_Group'] . "</td>
                                                <td>" . $row['Amount_Blood'] . "</td>
                                                <td>" . '<a href="upload.php?Unit_Number=' . $row['Unit_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                      
                                      
                                              </tr>
                                              <tbody>
                                              ";
                                                }
                                            }
                                        }
                                            elseif($_POST['Requesting_Party'] == 'Total' && $_POST['Unit_Type'] != 'Total' && $_POST['Priority'] != 'Total'){
                                            $qry = "select * from Blood_Drainage where Unit_Type = '{$_POST['Unit_Type']}' and Priority = '{$_POST['Priority']}'   ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {
                                                if ($row['Request_Date'] >= $_POST['From'] && $row['Request_Date'] <= $_POST['To']) {

                                                    echo "<tbody>
                                                <tr>
                                                          <td>" . $row['Request_Number'] . "</td>
                                                          <td>" . $row['Stock_id'] . "</td>
                                      
                                                <td>" . $row['Requesting_Party'] . "</td>
                                                <td>" . $row['Request_Date'] . "</td>
                                                <td>" . $row['Financier'] . "</td>
                                                <td>" . $row['Priority'] . "</td>
                                                <td>" . $row['Recipient_Name'] . "</td>
                                                <td>" . $row['Unit_Type'] . "</td>
                                                <td>" . $row['Blood_Group'] . "</td>
                                                <td>" . $row['Amount_Blood'] . "</td>
                                                <td>" . '<a href="upload.php?Unit_Number=' . $row['Unit_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                      
                                      
                                              </tr>
                                              <tbody>
                                              ";
                                                }
                                            }
                                        }
                                            elseif($_POST['Requesting_Party'] == 'Total' && $_POST['Unit_Type'] == 'Total' && $_POST['Priority'] != 'Total'){
                                            $qry = "select * from Blood_Drainage where  Priority = '{$_POST['Priority']}'   ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {
                                                if ($row['Request_Date'] >= $_POST['From'] && $row['Request_Date'] <= $_POST['To']) {

                                                    echo "<tbody>
                                                <tr>
                                                          <td>" . $row['Request_Number'] . "</td>
                                                          <td>" . $row['Stock_id'] . "</td>
                                      
                                                <td>" . $row['Requesting_Party'] . "</td>
                                                <td>" . $row['Request_Date'] . "</td>
                                                <td>" . $row['Financier'] . "</td>
                                                <td>" . $row['Priority'] . "</td>
                                                <td>" . $row['Recipient_Name'] . "</td>
                                                <td>" . $row['Unit_Type'] . "</td>
                                                <td>" . $row['Blood_Group'] . "</td>
                                                <td>" . $row['Amount_Blood'] . "</td>
                                                <td>" . '<a href="upload.php?Unit_Number=' . $row['Unit_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                      
                                      
                                              </tr>
                                              <tbody>
                                              ";
                                                }
                                            }
                                        }
                                            elseif($_POST['Requesting_Party'] == 'Total' && $_POST['Unit_Type'] != 'Total' && $_POST['Priority'] == 'Total'){
                                            $qry = "select * from Blood_Drainage where  Unit_Type = '{$_POST['Unit_Type']}'   ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {
                                                if ($row['Request_Date'] >= $_POST['From'] && $row['Request_Date'] <= $_POST['To']) {

                                                    echo "<tbody>
                                                <tr>
                                                          <td>" . $row['Request_Number'] . "</td>
                                                          <td>" . $row['Stock_id'] . "</td>
                                      
                                                <td>" . $row['Requesting_Party'] . "</td>
                                                <td>" . $row['Request_Date'] . "</td>
                                                <td>" . $row['Financier'] . "</td>
                                                <td>" . $row['Priority'] . "</td>
                                                <td>" . $row['Recipient_Name'] . "</td>
                                                <td>" . $row['Unit_Type'] . "</td>
                                                <td>" . $row['Blood_Group'] . "</td>
                                                <td>" . $row['Amount_Blood'] . "</td>
                                                <td>" . '<a href="upload.php?Unit_Number=' . $row['Unit_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                      
                                      
                                              </tr>
                                              <tbody>
                                              ";
                                                }
                                            }
                                        }
                                            elseif($_POST['Requesting_Party'] != 'Total' && $_POST['Unit_Type'] == 'Total' && $_POST['Priority'] == 'Total'){
                                            $qry = "select * from Blood_Drainage where  Requesting_Party = '{$_POST['Requesting_Party']}'   ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {
                                                if ($row['Request_Date'] >= $_POST['From'] && $row['Request_Date'] <= $_POST['To']) {

                                                    echo "<tbody>
                                                <tr>
                                                          <td>" . $row['Request_Number'] . "</td>
                                                          <td>" . $row['Stock_id'] . "</td>
                                      
                                                <td>" . $row['Requesting_Party'] . "</td>
                                                <td>" . $row['Request_Date'] . "</td>
                                                <td>" . $row['Financier'] . "</td>
                                                <td>" . $row['Priority'] . "</td>
                                                <td>" . $row['Recipient_Name'] . "</td>
                                                <td>" . $row['Unit_Type'] . "</td>
                                                <td>" . $row['Blood_Group'] . "</td>
                                                <td>" . $row['Amount_Blood'] . "</td>
                                                <td>" . '<a href="upload.php?Unit_Number=' . $row['Unit_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                      
                                      
                                              </tr>
                                              <tbody>
                                              ";
                                                }
                                            }
                                        }
                                            elseif($_POST['Requesting_Party'] == 'Total' && $_POST['Unit_Type'] == 'Total' && $_POST['Priority'] == 'Total'){
                                            $qry = "select * from Blood_Drainage    ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {
                                                if ($row['Request_Date'] >= $_POST['From'] && $row['Request_Date'] <= $_POST['To']) {

                                                    echo "<tbody>
                                                <tr>
                                                          <td>" . $row['Request_Number'] . "</td>
                                                          <td>" . $row['Stock_id'] . "</td>
                                      
                                                <td>" . $row['Requesting_Party'] . "</td>
                                                <td>" . $row['Request_Date'] . "</td>
                                                <td>" . $row['Financier'] . "</td>
                                                <td>" . $row['Priority'] . "</td>
                                                <td>" . $row['Recipient_Name'] . "</td>
                                                <td>" . $row['Unit_Type'] . "</td>
                                                <td>" . $row['Blood_Group'] . "</td>
                                                <td>" . $row['Amount_Blood'] . "</td>
                                                <td>" . '<a href="upload.php?Unit_Number=' . $row['Unit_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                      
                                      
                                              </tr>
                                              <tbody>
                                              ";
                                                }
                                            }
                                        }

                                        } else {
                                            echo "
						<thead>
						<tr>
							
							<th>Stock Number</th>
							<th>Financier</th>
							<th>Priority</th>
							<th>Donation Date</th>
							<th>Unit Type</th>
							<th>Blood Group</th>
							<th>Amount Blood</th>
							<th>QR Code</th>


						</tr>
						</thead>";
                                            if($_POST['Unit_Type'] != 'Total'){
                                            $qry = "select * from Blood_Stock where Unit_Type = '{$_POST['Unit_Type']}'   ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {
                                                if ($row['Donation_Date'] >= $_POST['From'] && $row['Donation_Date'] <= $_POST['To']) {

                                                    echo "<tbody>
                                                <tr>
                                                          <td>" . $row['Stock_id'] . "</td>
                                      
                                                <td>" . $_POST['Financier'] . "</td>
                                               <td>" . $_POST['Priority'] . "</td>
                                               <td>" . $row['Donation_Date'] . "</td>
                                                <td>" . $row['Unit_Type'] . "</td>
                                                <td>" . $row['Blood_Group'] . "</td>
                                                <td>" . $row['Amount_Blood'] . "</td>
                                                <td>" . '<a href="upload.php?Unit_Number=' . $row['Unit_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                      
                                      
                                              </tr>
                                              <tbody>
                                              ";
                                                }
                                            }
                                        }
                                            elseif($_POST['Unit_Type'] == 'Total'){
                                            $qry = "select * from Blood_Stock    ";
                                            $result = mysqli_query($conn, $qry);






                                            while ($row = mysqli_fetch_array($result)) {
                                                if ($row['Donation_Date'] >= $_POST['From'] && $row['Donation_Date'] <= $_POST['To']) {

                                                    echo "<tbody>
                                                <tr>
                                                          <td>" . $row['Stock_id'] . "</td>
                                      
                                                <td>" . $_POST['Financier'] . "</td>
                                               <td>" . $_POST['Priority'] . "</td>
                                               <td>" . $row['Donation_Date'] . "</td>
                                                <td>" . $row['Unit_Type'] . "</td>
                                                <td>" . $row['Blood_Group'] . "</td>
                                                <td>" . $row['Amount_Blood'] . "</td>
                                                <td>" . '<a href="upload.php?Unit_Number=' . $row['Unit_Number'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                      
                                      
                                              </tr>
                                              <tbody>
                                              ";
                                                }
                                            }
                                        }
                                    }
                                        // }

                                        ?>
                                    </table>
                                    
                                              <!-- <button style="margin-left:500px;" type="submit" class="btn btn-primary"><a href="Print_By_Destination.php" style="color: white; text-decoration: none;">Print?</a></button> -->


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