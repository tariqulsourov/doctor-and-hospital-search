<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Online Search</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/style4.css">
    
    <!-- Custom styles for this template -->
    <style>
        body {
            padding-top: 50px;
        }

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>
   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Doctor&Hospital</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="../../../public/view/welcome/index.php">Home</a></li>


                <li class="navbar-item dropdown" class="dropdown">
                    <a href="#Searching" class="nav-link dropdown-toggle" data-toggle="dropdown" class="dropbtn">Searching For</a>
                    <div class="dropdown-menu" class="dropdown-content">
                        <a href="../../../public/view/doctor/search.php" class="dropdown-item">Doctor</a>
                        <a href="../../../public/view/hospital/search.php" class="dropdown-item">Hospital</a>

                    </div>
                </li>



                <li><a href="../../../public/view/doctor/list.php">Doctors</a></li>
                <li><a href="../../../public/view/hospital/list.php">Hospitals</a></li>
               

                <?php
                    if (isset($_SESSION['user_name'])) {
                        echo "<li><a href=\"../../../public/view/doctor/profile.php\">My Profile</a></li>";
                        echo "<li style=\"float: right\"><a href=\"../../../web/functions/logout_function.php\">
                                Logout</a></li>";
                    }
                ?>

                <?php
                    if (!isset($_SESSION['user_name'])) {
                        echo "<li><a href=\"../../../public/view/doctor/register.php\">Register</a></li>";
                        echo "<li style=\"float: right\"><a href=\"../../../public/view/auth/login.php\">Login</a></li>";
                




                    }
                ?>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<div class="container">