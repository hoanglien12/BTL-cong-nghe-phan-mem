<?php ob_start(); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lien</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="publics/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="publics/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="publics/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="publics/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="publics/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="publics/js/custom.js"></script>
</head>
<body>
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="publics/img/login/lien.jpg" width="60" height="60" />
                    </a>
                </div>
                <span class="logout-spn" >
                  <a href="#" style="color:#fff;font-size: 14px;">Hello Admin </a>
                  <span style="color:#fff;font-size: 14px;">|</span>
                  <a href="?c=login&m=logout" style="color:#fff;font-size: 14px;">Logout</a>
                </span>
            </div>
        </div>