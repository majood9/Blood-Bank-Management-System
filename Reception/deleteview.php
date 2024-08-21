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

        <?php include 'includes/nav.php'?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class=".col-lg-12">
                        <h1 class="page-header">Delete Donors Detail</h1>
                    </div>
                </div>  

                <div class="row">
                    <div class=".col-lg-12">
                        <div class="panel panel-default">
                           <div class="panel-heading">
                                <!-- عنوان اللوحة -->
                                Total Records of available donors
                                <form action="" method="GET">
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
                                        // توصيل قاعدة البيانات
                                        include "dbconnect.php";

                                        // استعلام لاسترداد بيانات المتبرعين
                                        $qry = "SELECT * FROM donor";
                                        $result = mysqli_query($conn, $qry);

                                        echo "
						<thead>
						<tr>
							
							<th>The National Number</th>

							<th>Donation_Code</th>
							<th>Name</th>
							<th>Name_Father</th>
							<th>Name_Mother</th>
							<th>Name_Family</th>
							<th>Address</th>
							<th>D.O.B</th>
							<th>Gender</th>
							<th>Age</th>
							<th>Date_View</th>
							<th>Donation_Reason</th>
							<th>Phone_Number</th>
							<th>QR Code</th>


						</tr>
						</thead>";

                                            if (isset($_GET['search'])) {


                                                $filtervalues = $_GET['search'];
                                                $qry = "SELECT * FROM donor,status WHERE donor.national=status.national  and CONCAT(donor.name) LIKE '$filtervalues%' ";
                                                $result = mysqli_query($conn, $qry);
                    
                    
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo "<tbody>
                                                    <tr>
                                                                                                        <td>" . $row['national'] . "</td>

                                                    <td>" . $row['Donation_code'] . "</td>
                                                    <td>" . $row['name'] . "</td>
                                                    <td>" . $row['name_father'] . "</td>
                                                    <td>" . $row['name_mother'] . "</td>
                                                    <td>" . $row['name_family'] . "</td>
                                                    <td>" . $row['address'] . "</td>
                                                    <td>" . $row['dob'] . "</td>
                                                    <td>" . $row['gender'] . "</td>
                                                    <td>" . $row['age'] . "</td>
                                                    <td>" . $row['date_view'] . "</td>
                                                    <td>" . $row['donation_reason'] . "</td>
                                                    <td>" . $row['phone_number'] . "</td>
                                                    <td>" . '<a href="delete.php?national=' . $row['national'] . '"> <img style="width:50px; height:50px" src="data:QR/png;base64,' . $row['QR'] . '"" alt="QR Code"> </a>' . "</td>
                                          
                                          
                                                  </tr>
                                                  <tbody>
                                                  ";
                                                }
                                            }


                                            else{
                                                $qry = "SELECT * FROM donor,status WHERE donor.national=status.national  ";
                                                $result = mysqli_query($conn, $qry);

                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "
                                            <tbody>
                                              <tr>
                                                    <td>" . $row['national'] . "</td>

                                                 <td>" . $row['Donation_code'] . "</td>
                                                    <td>" . $row['name'] . "</td>
                                                    <td>" . $row['name_father'] . "</td>
                                                    <td>" . $row['name_mother'] . "</td>
                                                    <td>" . $row['name_family'] . "</td>
                                                    <td>" . $row['address'] . "</td>
                                                    <td>" . $row['dob'] . "</td>
                                                    <td>" . $row['gender'] . "</td>
                                                    <td>" . $row['age'] . "</td>
                                                                                                                                                      <td>" . $row['date_view'] . "</td>

                                                    <td>" . $row['donation_reason'] . "</td>
                                                    <td>" . $row['phone_number'] . "</td>
                                                <td><a href='delete.php?national=".$row['national']."'><i class='fa fa-trash' style='color:red'></i></a></td>
                                              </tr>
                                            </tbody>";
                                        }}

                                        ?>
                                    </table>

                                </div>
                            </div>
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