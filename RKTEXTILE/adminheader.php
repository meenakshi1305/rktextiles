<?php
session_start();
ob_start();
if (!isset($_SESSION['adminuserid'])) {
    header("Location:index.php");
}
include './db.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">
        <title>Textile</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">		
        <!-- Custom styles for this template -->
        <link href="css/owl.carousel.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css"  rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top"><img src="images/logo.png" alt="Sanza theme logo"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div style="background-color: green;color: white;font-weight:bolder">
                    <marquee scrollamount="10" >VISION: Best Delivery for Customer Satisfaction ! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; MISSION: Quality And Sureity Products ! </marquee>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- Header -->
        <section class="light-bg" style="padding-top: 100px;min-height: 590px;">
        <div style="display: flex; flex-direction: row;background-color: green; padding:1%;">
            <a class="page-scroll" href="adminhome.php">Stock</a>
            <div class="dropdown" >
                <button class="dropbtn">Sales and purchase</button>
                <div class="dropdown-content">
                    <div class="dropdown">
                        <div class="dropbtn1" onclick="toggleWholesaleDropdown()">Wholesale</div>
                        <div class="dropdown-content" style="display:none" id="wholesaleDropdownContent">
                            <a class="page-scroll" href="purchase.php">Purchase</a>
                            <a class="page-scroll" href="sales.php">Sales</a>
                            <a class="page-scroll" href="stitch.php">Stitch</a>
                            <a class="page-scroll" href="yettopay.php">Yet to Pay</a>
                            <a class="page-scroll" href="report.php">Report</a>
                        </div>
                        <button class="dropbtn1" onclick="toggleRetailDropdown()">Retail</button>
                        <div class="dropdown-content" style="display:none" id="RetailDropdownContent">
                            <a class="page-scroll" href="purchase.php">Purchase</a>
                            <a class="page-scroll" href="sales.php">Sales</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="page-scroll" href="employee.php">Employee</a>
            <a class="page-scroll" href="salary.php">Salary</a>
            <a class="page-scroll" href="signout.php">Signout</a>
        </div>
    </body>
    <style>
        a {
            margin: 1%;
            color: white; 
            border-radius: 10px;
            font-weight:bold;
        }
        .dropdown {
            margin: 0.3%;
            font-weight:bold;
        }
        /* Dropdown button */
        .dropbtn {
            background-color: transparent;
            color: white;
            padding: 10px 20px;
            font-size: 16;
            border: none;
            cursor: pointer;
        }
        .dropbtn1{
            background-color: transparent;
            font-size: 16px;
            border: grey;
            cursor: pointer;
            margin:1%;
        }
        /* Dropdown content (hidden by default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of links on hover */
        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Change the background color of the dropdown button when the dropdown content is shown */
        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>
    <script>
    // JavaScript function to toggle the visibility of the wholesale dropdown
    function toggleWholesaleDropdown() {
        var dropdownContent = document.getElementById("wholesaleDropdownContent");
        if (dropdownContent.style.display === "none") {
            dropdownContent.style.display = "block";
        } else {
            dropdownContent.style.display = "none";
        }
    }
    function toggleRetailDropdown() {
        var dropdownContent = document.getElementById("RetailDropdownContent");
        if (dropdownContent.style.display === "none") {
            dropdownContent.style.display = "block";
        } else {
            dropdownContent.style.display = "none";
        }
    }
</script>
