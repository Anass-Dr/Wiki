<!doctype html>
<html lang="en">

<!-- Mirrored from themes.ad-theme.com/html/tada/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2024 14:39:43 GMT -->

<head>
    <meta charset="utf-8">
    <title>Tada & Blog - Personal Blog HTML Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="assets/assets/img/favicon.png" />
    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slippry.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Sarina' rel='stylesheet' type='text/css'>
    <script src="assets/js/Wiki/WikiArticleComponent.js" type="module"></script>
    <script src="assets/js/Wiki/WikiPostComponent.js" type="module"></script>
</head>

<body>

    <!--******************************************************************************************************************************************
    ****************************************************************** PRELOADER ********************************************************************
    *******************************************************************************************************************************************-->


    <div id="preloader-container">
        <div id="preloader-wrap">
            <div id="preloader"></div>
        </div>
    </div>

    <!--******************************************************************************************************************************************
    ****************************************************************** HEADER ********************************************************************
    *******************************************************************************************************************************************-->

    <header class="tada-container">

        <!-- LOGO -->

        <div class="logo-container">
            <a href="index-2.html"><img src="assets/img/logo.png" alt="logo"></a>
            <div class="tada-social">
                <a href="#"><i class="icon-facebook5"></i></a>
                <a href="#"><i class="icon-twitter4"></i></a>
                <a href="#"><i class="icon-google-plus"></i></a>
                <a href="#"><i class="icon-vimeo4"></i></a>
                <a href="#"><i class="icon-linkedin2"></i></a>
            </div>
        </div>

        <!-- MENU DESKTOP -->

        <nav class="menu-desktop menu-sticky">

            <ul class="tada-menu">
                <li><a href="#" class="active">HOME</a>
                </li>
                <li><a href="/about">ABOUT US</a></li>
                <li><a href="/contact">CONTACT</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            </ul>

        </nav>

        <!-- MENU MOBILE -->

        <div class="menu-responsive-container">
            <div class="open-menu-responsive">|||</div>
            <div class="close-menu-responsive">|</div>
            <div class="menu-responsive">
                <ul class="tada-menu">
                    <li><a href="#" class="active">HOME</a>
                    </li>
                    <li><a href="about-us.html">ABOUT US</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                </ul>
            </div>
        </div> <!-- # menu responsive container -->


        <!-- SEARCH -->

        <div class="tada-search">
            <form>
                <div class="form-group-search">
                    <input type="search" class="search-field" placeholder="Search and hit enter...">
                    <button type="submit" class="search-btn"><i class="icon-search4"></i></button>
                </div>
            </form>
        </div>

        <!-- SLIDER -->

        <div class="tada-slider">
            <ul id="tada-slider">
                <li>
                    <img src="assets/img/image-slider-1.jpg" alt="image slider 1">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>
                </li>
                <li>
                    <img src="assets/img/image-slider-2.jpg" alt="image slider 2">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>MAECENAS CONSECTETUR</h1>
                        <h2>Lorem <span class="main-color">ipsum dolor</span> sit amet</h2>
                        <span class="button"><a href="#">READ ME</a></span>
                    </div>
                </li>
                <li>
                    <img src="assets/img/image-slider-3.jpg" alt="image slider 3">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>
                </li>
                <li>
                    <img src="assets/img/image-slider-4.jpg" alt="image slider 4">
                    <div class="pattern"></div>
                    <div class="tada-text-container">
                        <h1>AENEAN AC DIAM</h1>
                        <h2>VIVAMUS <span class="main-color">TINCIDUNT</span> FERMENTUM</h2>
                        <span class="button"><a href="#">TEXT BUTTON</a></span>
                    </div>
                </li>
            </ul>

        </div>

        <!-- END SLIDER -->


    </header><!--END HEADER-->

    <!--******************************************************************************************************************************************
    ****************************************************************** SECTION *******************************************************************
    *******************************************************************************************************************************************-->

    <section class="tada-container content-posts">

        <!-- *** CONTENT *** -->

        <div class="content col-xs-8">
            <div id="articles"></div>


            <div class="navigation">
                <a href="#" class="prev"><i class="icon-arrow-left8"></i> Previous Posts</a>
                <a href="#" class="next">Next Posts <i class="icon-arrow-right8"></i></a>
                <div class="clearfix"></div>
            </div>

        </div>

        <!-- *** SIDEBAR *** -->

        <div class="sidebar col-xs-4">

            <!-- LATEST POSTS -->

            <div class="widget latest-posts">
                <h3 class="widget-title">
                    Latest Posts
                </h3>
                <div class="posts-container"></div>
            </div>

            <!-- FOLLOW US -->

            <div class="widget follow-us">
                <h3 class="widget-title">
                    Follow Us
                </h3>
                <div class="follow-container">
                    <a href="#"><i class="icon-facebook5"></i></a>
                    <a href="#"><i class="icon-twitter4"></i></a>
                    <a href="#"><i class="icon-google-plus"></i></a>
                    <a href="#"><i class="icon-vimeo4"></i></a>
                    <a href="#"><i class="icon-linkedin2"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>

            <!-- TAGS -->

            <div class="widget tags">
                <h3 class="widget-title">
                    Tags
                </h3>
                <div class="tags-container"></div>
                <div class="clearfix"></div>
            </div>

        </div> <!-- #SIDEBAR -->

        <div class="clearfix"></div>

    </section>

    <!--******************************************************************************************************************************************
    ****************************************************************** FOOTER ********************************************************************
    *******************************************************************************************************************************************-->

    <footer class="tada-container">

        <!-- FOOTER BOTTOM -->

        <div class="footer-bottom">
            <span class="copyright">Theme Created by <a href="#">AD-Theme</a> Copyright © 2016. All Rights Reserved</span>
            <span class="backtotop">TOP <i class="icon-arrow-up7"></i></span>
            <div class="clearfix"></div>
        </div>

    </footer>

    <!--******************************************************************************************************************************************
    ****************************************************************** SCRIPT ********************************************************************
    *******************************************************************************************************************************************-->

    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/slippry.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/Wiki/index.js"></script>

</body>

<!-- Mirrored from themes.ad-theme.com/html/tada/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2024 14:39:57 GMT -->

</html>