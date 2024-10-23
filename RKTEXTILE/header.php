<?php
session_start();
ob_start();
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
        <title >Textile</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">		
        <!-- Custom styles for this template -->
        <link href="css/owl.carousel.css" rel="stylesheet">
        <link href="css/owl.theme.default.min.css"  rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <style>
        .navbar {
            background-color: white; /* Set the background color to blue */
        }
    </style>
    <body id="page-top">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" style="height:15%;align-item:center;">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top"><img style="height:100%;margin:5%" src="images/logo.png" alt="Sanza theme logo"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse"  id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" style="font-size:large;background-color: green;color: white;margin:5%" href="index.php" onmouseover="this.style.color='red'" onmouseout="this.style.color='white'">Home</a>
                        </li>
                        <li>
                            <a class="page-scroll" style="font-size:large;background-color: green;color: white;margin:5%" href="login.php" onmouseover="this.style.color='red'" onmouseout="this.style.color='white'"
                            >Login</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <div style="background-color: green;color: white;font-weight:bolder">
                    <marquee scrollamount="10" >VISION: Best Delivery for Customer Satisfaction ! &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; MISSION: Quality And Sureity Products ! </marquee>
                </div>
        </nav>
        <!-- Header -->
        