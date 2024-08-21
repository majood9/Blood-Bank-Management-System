<?php session_start(); ?>
<?php include('dbcon.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BDMS - Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/metismenu/dist/metisMenu.min.css">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <link rel="stylesheet" href="/bloodbank se/icofont/icofont.min.css">

    <!-- Custom Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/fontawesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body style=" background-image: url(img/pexels-karolina-grabowska-4047146.jpg); background-size: 100%  ; background-clip: content-box;  ;background-repeat: no-repeat; " >

                

    <nav class="navbar navbar-inverse" style=" border-radius: 0px; ">
        <div class="container-fluid">
            <div class="navbar-header">
                <a style="color: aliceblue;" class="navbar-brand" href="index.php"><i class="icofont-blood-drop" style='color:red'></i><span style=" color: red; ">B</span>lood <span style=" color: red; ">B</span>ank <span style=" color: red; ">M</span>anagement
                <span style=" color: red; ">S</span>ystem</a>
            </div>



            




        </div>
    </nav>

    <div class="container" style="margin-top: 70px;" >
        <form action="#" method="post">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <center>Panel Login</center>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="user" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" class="btn btn-info btn-block" style="border-radius:0%;" title="Log In" name="login" value="Login"></input>
                                </fieldset>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </form>

        <?php
        if (isset($_POST['login'])) {
            $username = mysqli_real_escape_string($con, $_POST['user']);
            $password = mysqli_real_escape_string($con, $_POST['pass']);

            // $query         = mysqli_query($con, "SELECT * FROM admin WHERE  password='$password' and username='$username'");
            // $row        = mysqli_fetch_array($query);
            // $num_row     = mysqli_num_rows($query);

            // $query1         = mysqli_query($con, "SELECT * FROM users WHERE  password='$password' and username='$username'");
            // $row1        = mysqli_fetch_array($query1);
            // $num_row1     = mysqli_num_rows($query1);

            $query2         = mysqli_query($con, "SELECT * FROM Reception WHERE  password='$password' and username='$username'");
            $row2        = mysqli_fetch_array($query2);
            $num_row2     = mysqli_num_rows($query2);

            $query3         = mysqli_query($con, "SELECT * FROM Doctor WHERE  password='$password' and username='$username'");
            $row3        = mysqli_fetch_array($query3);
            $num_row3     = mysqli_num_rows($query3);

            $query4         = mysqli_query($con, "SELECT * FROM Picking_Blood_Emp WHERE  password='$password' and username='$username'");
            $row4        = mysqli_fetch_array($query4);
            $num_row4     = mysqli_num_rows($query4);

            $query5         = mysqli_query($con, "SELECT * FROM Blood_Test_Emp WHERE  password='$password' and username='$username'");
            $row5        = mysqli_fetch_array($query5);
            $num_row5     = mysqli_num_rows($query5);

            $query6         = mysqli_query($con, "SELECT * FROM Blood_Separation_Emp WHERE  password='$password' and username='$username'");
            $row6        = mysqli_fetch_array($query6);
            $num_row6     = mysqli_num_rows($query6);

            $query7         = mysqli_query($con, "SELECT * FROM Blood_Stock_Emp WHERE  password='$password' and username='$username'");
            $row7        = mysqli_fetch_array($query7);
            $num_row7     = mysqli_num_rows($query7);

            $query8         = mysqli_query($con, "SELECT * FROM Blood_Destroy_Emp WHERE  password='$password' and username='$username'");
            $row8        = mysqli_fetch_array($query8);
            $num_row8     = mysqli_num_rows($query8);

            // if ($num_row > 0) {
            //     $_SESSION['user_id'] = $row['user_id'];
            //     header('location:pages/index.php');
            // } elseif ($num_row1 > 0) {
            //     $_SESSION['user_id'] = $row1['user_id'];
            //     header('location:userlog/userdashboard.php');
            // } 
            if ($num_row2 > 0) {
                $_SESSION['user_id'] = $row2['Reception_id'];
                header('location:Reception/userdashboard.php');
            } elseif ($num_row3 > 0) {
                $_SESSION['user_id'] = $row3['Doctor_id'];
                header('location:Doctor/Doctor_dashboard.php');
            } elseif ($num_row4 > 0) {
                $_SESSION['user_id'] = $row4['Emp_id'];
                header('location:Picking_Blood/Picking_Blood_dashboard.php');
            } elseif ($num_row5 > 0) {
                $_SESSION['user_id'] = $row5['Blood_Test_Emp_id'];
                header('location:Blood_Test/Blood_Test_dashboard.php');
            
            } elseif ($num_row6 > 0) {
                $_SESSION['user_id'] = $row6['Blood_Separation_Emp_id'];
                header('location:Blood_Separation_Laboratory/Blood_Separation_Dashboard.php');
            
            }
             elseif ($num_row7 > 0) {
                $_SESSION['user_id'] = $row7['Blood_Stock_Emp_id'];
                header('location:Blood_Drainage_Department/Blood_Drainage_Department_Dashboard.php');
                
                
            } 
             elseif ($num_row8 > 0) {
                $_SESSION['user_id'] = $row8['Blood_Destroy_Emp_id'];
                header('location:Blood_Destroy/Blood_Destroy_Dashboard.php');
                
                
            } 
        
          
            else {
                echo ' <div class="row"> <div class="col-md-4 col-md-offset-4">
								<div class="alert alert-danger alert-dismissible">
                                        Username & Password didnot match! Try Again.
                                    </div> </div> </div> ';
            }
        }
        ?>

    </div>




    <!-- jQuery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js">

    <!-- Bootstrap Core JavaScript -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.5.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Metis Menu Plugin JavaScript -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.6/metisMenu.min.js">

    <!-- Custom Theme JavaScript -->
    <script src="js/startmin.js"></script>



</body>

<!-- Footer -->

<!-- Footer -->

</html>