<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Mvc-Shop</title>
        <link href="/frontend/css/bootstrap.min.css" rel="stylesheet">
        <link href="/frontend/css/font-awesome.min.css" rel="stylesheet">
        <link href="/frontend/css/prettyPhoto.css" rel="stylesheet">
        <link href="/frontend/css/price-range.css" rel="stylesheet">
        <link href="/frontend/css/animate.css" rel="stylesheet">
        <link href="/frontend/css/main.css" rel="stylesheet">
        <link href="/frontend/css/responsive.css" rel="stylesheet">
        <script src="/frontend/js/jquery.js"></script>
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="/frontend/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/frontend/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/frontend/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/frontend/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/frontend/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
        <div class="wrapper">
        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="/"><i class="fa fa-phone"></i> +380974028747</a></li>
                                    <li><a href="/"><i class="fa fa-envelope"></i> sidunoleh@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="/"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="/"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="/frontend/index.html"><img src="images/home/logo.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">                                    
                                    <li><a href="/cart/"><i class="fa fa-shopping-cart"></i> 
                                        Cart[<?php echo isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; ?>]
                                    </a></li>

                                    <?php if(!isset($_SESSION['user'])): ?>
                                        <li><a href="/login/"><i class="fa fa-lock"></i> Log in</a></li>

                                    <?php else: ?>
                                        <li><a href="/user/"><i class="fa fa-user"></i> Account</a></li>
                                        <li><a href="/logout/"><i class="fa fa-unlock"></i> Log out</a></li>

                                    <?php endif; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="/">Home</a></li>
                                    <li class="dropdown"><a href="/catalog/">Shop<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="/catalog/">Catalog</a></li>
                                            <li><a href="/cart/">Cart</a></li> 
                                        </ul>
                                    </li> 
                                    <li><a href="/contacts/">Contacts</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
            
        </header><!--/header-->