<?php
include 'admin/inc/db.php';
ob_start();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required Meta Tags -->
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Website Description -->
        <meta
            name="description"
            content="Blue Chip: Corporate Multi Purpose Business Template"/>
        <meta name="author" content="Blue Chip"/>

        <!-- Favicons / Title Bar Icon -->
        <link rel="shortcut icon" href="assets/images/favicon/favicon.png"/>
        <link
            rel="apple-touch-icon-precomposed"
            href="assets/images/favicon/favicon.png">
        <link
            rel="apple-touch-icon-precomposed"
            sizes="72x72"
            href="assets/images/favicon/favicon.png"/>
        <link
            rel="apple-touch-icon-precomposed"
            sizes="114x114"
            href="assets/images/favicon/favicon.png"/>

        <title>Blue Chip | Blog Right Sidebar</title>

        <!-- Bootstrap CSS -->
        <link
            rel="stylesheet"
            type="text/css"
            href="assets/bootstrap/css/bootstrap.min.css">

        <!-- Font Awesome CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

        <!-- Flat Icon CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">

        <!-- Animate CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">

        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
        <link
            rel="stylesheet"
            type="text/css"
            href="assets/css/owl.theme.default.min.css">

        <!-- Fency Box CSS -->
        <link
            rel="stylesheet"
            type="text/css"
            href="assets/css/jquery.fancybox.min.css">

        <!-- Theme Main Style CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

        <!-- Responsive CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    </head>

    <body>
        <!-- :::::::::: Header Section Start :::::::: -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light ">
                            <a class="navbar-brand" href="index.php">Online Library</a>
                            <button
                                class="navbar-toggler"
                                type="button"
                                data-toggle="collapse"
                                data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent"
                                aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">

                                <?php
                                $sql =
                                    'SELECT * FROM category WHERE parent_id = 0 AND status = 1';
                                $parentMenu = mysqli_query($connect, $sql);
                                $count = mysqli_num_rows($parentMenu);
                                while ($row = mysqli_fetch_assoc($parentMenu)) {

                                    $cat_id = $row['cat_id'];
                                    $cat_name = $row['cat_name'];
                                    $is_parent = $row['parent_id'];
                                    $status = $row['status'];
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="category.php?category=<?php echo $cat_name; ?>"><?php echo $cat_name; ?></a>
                                    </li>
                                    <?php
                                }
                                ?>



                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Link</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </nav>

                    </div>

                </div>
            </div>

        </header>

        <!-- ::::::::::: Header Section End ::::::::: -->