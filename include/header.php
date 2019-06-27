<?php
error_reporting(E_ALL);
    include_once 'lib/class.globalfunction.php';
    $gblFunc = new GlobalFunction();
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="images/favicon.png">
        <title>Studio Basic</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css?ver=1.1" rel="stylesheet">
        <link href="css/plugins.css?ver=1.1" rel="stylesheet">
        <link href="css/style.css?ver=1.1" rel="stylesheet">
        <link href="css/color/blue.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link href="css/icons.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css"/>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="preloader"><div class="textload">Welcome to Studio Basic</div><div id="status"><div class="spinner"></div></div></div>
        <main class="body-wrapper">
            <nav class="navbar solid dark">
                <div class="navbar-header">
                    <div class="basic-wrapper"> 
                        <div class="navbar-brand"> 
                            <a href="index.php">
                                <img src="#" srcset="images/studio-basics-logo_new.png 1x, images/studio-basics-logo_new.png 2x" class="logo-light" alt="" />
                                <img src="#" srcset="images/studio-basics-logo_new.png 1x, images/studio-basics-logo_new.png 2x" class="logo-dark" alt="" />
                                <!--<span>Studio Basics</span>-->
                            </a> 
                        </div>
                        <a class="btn responsive-menu" data-toggle="collapse" data-target=".navbar-collapse"><i></i></a>
                    </div>
                    <!-- /.basic-wrapper -->  
                </div>
                <!-- /.navbar-header -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="current" id="liPage_1">
                            <a href="aboutus.php" >About Us </a>
                        </li>
                        <li class="" id="liPage_2">
                            <a href="projects.php">Projects </a>
                        </li> 
                        <li class="" id="liPage_3">
                            <a href="service.php" >Services </a>
                        </li>
                        <li class="" id="liPage_4">
                            <a href="design-process.php" >Design process</a>
                        </li>                       
                        <li class="" id="liPage_5">
                            <a href="contactus.php">Contact Us </a>
                        </li>
                        <!--                        <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle js-activated" data-toggle="dropdown">Headers <span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="about2.html">Transparent</a></li>
                                                        <li><a href="index5.html">Light Solid</a></li>
                                                        <li><a href="index6.html">Dark Solid</a></li>
                                                    </ul>
                                                </li>-->

                    </ul>
                    <!-- /.navbar-nav --> 
                </div>
                <!-- /.navbar-collapse -->
                <div class="social-wrapper">
                    <ul class="social naked">
                        <li><a href="https://www.facebook.com/StudioBasicDesigns/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/hashtag/studiosimple?src=hash"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com/studiobasic/"><i class="fa fa-instagram"></i></a></li>
                        <li class="vl"></li>
                    </ul>
                    <!-- /.social --> 
                </div>
                <div class="social-wrapper" style="width:9%;">
                    <ul class="social naked">                        
                        <li>
                            <a class="btn btn-sm" href="contactus.php">
                                get a quote
                            </a>
                        </li>
                    </ul>
                    <!-- /.social --> 
                </div>
                <!-- /.social-wrapper --> 
            </nav>
            <!-- /.navbar -->


