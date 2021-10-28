<?php include 'inc/header.php'; ?>

<!-- :::::::::: Page Banner Section Start :::::::: -->
<section class="blog-bg background-img">
    <div class="container">
        <!-- Row Start -->
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">All Books</h2>
                <!-- Page Heading Breadcrumb Start -->
                <nav class="page-breadcrumb-item">
                    <ol>
                        <li>
                            <a href="index.php">Home
                                <i class="fa fa-angle-double-right"></i>
                            </a>
                        </li>
                        <!-- Active Breadcrumb -->
                        <li class="active">Books</li>
                    </ol>
                </nav>
                <!-- Page Heading Breadcrumb End -->
            </div>

        </div>
        <!-- Row End -->
    </div>
</section>
<!-- ::::::::::: Page Banner Section End ::::::::: -->

<!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
<section>
    <div class="container">
        <div class="row">
            <!-- Blog Posts Start -->
            <div class="col-md-8">

            <?php
            $query = 'SELECT  * FROM post ORDER BY post_id DESC';
            $allPosts = mysqli_query($connect, $query);
            $count = mysqli_num_rows($allPosts);
            if ($count <= 0) {
                echo '<div class = "alert alert-info">No post created yet</div>';
            } else {
                while ($row = mysqli_fetch_assoc($allPosts)) {

                    $post_id = $row['post_id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $category_id = $row['category_id'];
                    // $author_id = $row['author_id'];
                    $tags = $row['tags'];
                    $status = $row['status'];
                    $post_date = $row['post_date'];
                    $image = $row['image'];
                    ?>
                <!--Show all Books start -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <a href="single.php?article=<?php echo $post_id; ?>">

                                <?php if (!empty($image)) { ?>
                                <img src="admin/dist/img/posts/<?php echo $image; ?>">
                            <?php } else { ?>
                                <img src="admin/dist/img/posts/default.png">
                                <?php } ?>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $title; ?></h5>
                                <p class="card-text"><?php echo substr(
                                    $description,
                                    0,
                                    50
                                ); ?>...</p>
                                <a href="single.php?article=<?php echo $post_id; ?>" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!--Show all Books end -->

                <!-- Single Item Blog Post Start -->

                <!-- Single Item Blog Post End -->
                <?php
                }
            }
            ?>

                <!-- Blog Paginetion Design Start -->
                <div class="paginetion">
                    <ul>
                        <!-- Next Button -->
                        <li class="blog-prev">
                            <a href="">
                                <i class="fa fa-long-arrow-left"></i>
                                Previous</a>
                        </li>
                        <li>
                            <a href="">1</a>
                        </li>
                        <li>
                            <a href="">2</a>
                        </li>
                        <li class="active">
                            <a href="">3</a>
                        </li>
                        <li>
                            <a href="">4</a>
                        </li>
                        <li>
                            <a href="">5</a>
                        </li>
                        <!-- Previous Button -->
                        <li class="blog-next">
                            <a href="">
                                Next
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Blog Paginetion Design End -->
            </div>

            <!-- Blog Right Sidebar -->
            <?php include 'inc/sidebar.php'; ?>
            <!-- Right Sidebar End -->
        </div>
    </div>
</section>
<!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
<?php include 'inc/footer.php'; ?>
