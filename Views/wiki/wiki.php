<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tada & Blog - Post with Right Sidebar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png" />
    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slippry.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Sarina' rel='stylesheet' type='text/css'>
</head>

<body>

    <header class="tada-container no-slider">
        <!-- MENU DESKTOP -->

        <nav class="menu-desktop menu-sticky">

            <ul class="tada-menu">
                <li><a href="/" class="active">HOME</a>
                </li>
                <li><a href="/about">ABOUT US</a></li>
                <li><a href="/contact">CONTACT</a></li>
                <?php if ($_SESSION["user_id"]) : ?>
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
                    <li><a href="#">HOME <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                            <li><a href="home-1-column.html">Home 1 Column</a></li>
                            <li><a href="index-2.html">Home 1 Column + Sidebar</a></li>
                            <li><a href="home-2-columns-with-sidebar.html">Home 2 Columns + Sidebar</a></li>
                            <li><a href="home-2-columns.html">Home 2 Columns</a></li>
                            <li><a href="home-3-columns.html">Home 3 Columns</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="active">FEATURES <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                            <li><a href="page.html">Page</a></li>
                            <li><a href="page-with-right-sidebar.html">Page + Right Sidebar</a></li>
                            <li><a href="page-with-left-sidebar.html">Page + Left Sidebar</a></li>
                            <li><a href="post.html">Post Full Width</a></li>
                            <li><a href="post-with-right-sidebar.html" class="active">Post + Right Sidebar</a></li>
                            <li><a href="post-with-left-sidebar.html">Post + Left Sidebar</a></li>
                            <li><a href="no-sticky.html">No Sticky Menu</a></li>
                            <li><a href="no-slider.html">No Slider</a></li>
                            <li><a href="#">Submenu <i class="icon-arrow-right8"></i></a>
                                <ul class="submenu">
                                    <li><a href="#">Item 1</a></li>
                                    <li><a href="#">Item 2</a></li>
                                    <li><a href="#">Item 3</a></li>
                                    <li><a href="#">Item 4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">BLOG <i class="icon-arrow-down8"></i></a>
                        <ul class="submenu">
                            <li><a href="blog-1-column.html">Blog 1 Column</a></li>
                            <li><a href="blog-1-column-with-sidebar.html">Blog + Sidebar</a></li>
                            <li><a href="blog-2-columns-with-sidebar.html">Blog 2 Columns + Sidebar</a></li>
                            <li><a href="blog-2-columns.html">Blog 2 Columns</a></li>
                            <li><a href="blog-3-columns.html">Blog 3 Columns</a></li>
                        </ul>
                    </li>
                    <li><a href="about-us.html">ABOUT US</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                </ul>
            </div>
        </div> <!-- # menu responsive container -->

    </header><!--END HEADER-->

    <!--******************************************************************************************************************************************
    ****************************************************************** SECTION *******************************************************************
    *******************************************************************************************************************************************-->

    <section class="tada-container content-posts post sidebar-right">

        <!-- *** CONTENT *** -->

        <div class="content">
            <!-- ARTICLE 1 -->
            <article>
                <div class="post-image">
                    <img src="assets/img/<?= $wiki->img ?>" alt="post image 1">
                </div>
                <div class="category">
                    <a href="#"><?= $wiki->category ?></a>
                </div>
                <div class="post-text">
                    <span class="date"><?= $wiki->updatedAt ?></span>
                    <h2><?= $wiki->title ?></h2>
                </div>
                <div class="post-text text-content">
                    <div class="post-by">Post By <a href="#"><?= $wiki->author ?></a></div>
                    <div class="text">
                        <?= $wiki->content ?>
                    </div>
                </div>

            </article>

        </div>

    </section>

    <!--******************************************************************************************************************************************
    ****************************************************************** FOOTER ********************************************************************
    *******************************************************************************************************************************************-->

    <footer class="tada-container">
    </footer>

    <!--******************************************************************************************************************************************
    ****************************************************************** SCRIPT ********************************************************************
    *******************************************************************************************************************************************-->

    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/slippry.js"></script>
    <script src="assets/js/main.js"></script>

</body>

<!-- Mirrored from themes.ad-theme.com/html/tada/post-with-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2024 14:40:03 GMT -->

</html>