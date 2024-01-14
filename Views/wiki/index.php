<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Wiki</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <header class="tada-container">
        <!-- MENU DESKTOP -->

        <nav class="menu-desktop menu-sticky">

            <ul class="tada-menu">
                <li><a href="/" class="active">HOME</a>
                </li>
                <?php if ($_SESSION["user_id"]) : ?>
                    <li><a href="<?= $_SESSION["user_role"] == "Author" ? "/author" : "/admin" ?>">Dashboard</a></li>
                    <li><a href="/logout">Logout</a></li>
                <?php else : ?>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                <?php endif ?>
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
        <form class="form_search" onsubmit="search(event)">
            <div class="bg-white d-flex justify-content-center align-items-center border border-top py-4 gap-4">
                <div style="min-width: 400px">
                    <input class="form-control me-2 bg-light" type="search" name="keyword" placeholder="Wiki name or category ..." aria-label="Search">
                </div>
                <div style="min-width: 100px" class="align-self-stretch">
                    <select class="form-select h-100" name="type" required>
                        <option value="wiki">Wikis</option>
                        <option value="tag">Tags</option>
                        <option value="category">Categories</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary align-self-stretch">Search</button>
            </div>
            <div class="search_results hidden">
                <ul class="list-group px-4 py-4">
                    <li class="list-group-item list-group-item-success">An item</li>
                    <li class="list-group-item list-group-item-success">An item</li>
                    <li class="list-group-item list-group-item-success">An item</li>
                    <li class="list-group-item list-group-item-success">An item</li>
                </ul>
            </div>
        </form>

    </header><!--END HEADER-->

    <!--******************************************************************************************************************************************
    ****************************************************************** SECTION *******************************************************************
    *******************************************************************************************************************************************-->

    <section class="tada-container content-posts">

        <!-- *** CONTENT *** -->

        <div class="content col-xs-8">
            <div id="articles"></div>
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
            <span class="copyright">Theme Created by Anass Drissi © 2024. All Rights Reserved</span>
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

</html>