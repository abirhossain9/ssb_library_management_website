<?php include 'inc/header.php'; ?>

        <!-- :::::::::: Page Banner Section Start :::::::: -->
        <section class="blog-bg background-img">
            <div class="container">
                <!-- Row Start -->
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-title">Search Books</h2>
                        <!-- Page Heading Breadcrumb Start -->
                        <nav class="page-breadcrumb-item">
                            <ol>
                                <li>
                                    <a href="index.php">Home
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </li>
                                <!-- Active Breadcrumb -->
                                <li class="active">Book</li>
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
                   
                    <?php if (isset($_POST['searchContent'])) {
                        $data = mysqli_real_escape_string(
                            $connect,
                            $_POST['search']
                        );

                        //search query
                        $query = "SELECT  * FROM post  WHERE title LIKE '%$data%' OR description LIKE '%$data%' ORDER BY post_id DESC";
                        $allPosts = mysqli_query($connect, $query);
                        $count = mysqli_num_rows($allPosts);
                        if ($count <= 0) {
                            echo '<div class = "alert alert-info">No post found based on your search : <strong>' .
                                $data .
                                '</strong></div>';
                        } else {
                            while ($row = mysqli_fetch_assoc($allPosts)) {

                                $post_id = $row['post_id'];
                                $title = $row['title'];
                                $description = $row['description'];
                                $category_id = $row['category_id'];
                                $adder_id = $row['adder_id'];
                                $author_name = $row['author_name'];
                                $tags = $row['tags'];
                                $status = $row['status'];
                                $post_date = $row['post_date'];
                                $image = $row['image'];
                                ?>
                              <!-- Single Item Blog Post Start -->
                        <div class="blog-post">
                            <!-- Blog Banner Image -->
                            <div class="blog-banner">
                                <a href="single.php?article=<?php echo $post_id; ?>">
                                   
                                    <?php if (!empty($image)) { ?>
                                            <img src="admin/dist/img/posts/<?php echo $image; ?>" >
                                        <?php } else { ?>
                                            <img src="admin/dist/img/posts/default.png" >
                                            <?php } ?>
                                     </a>         
                                    <!-- Post Category Names -->
                                    <div class="blog-category-name">
                                        
                                        <?php
                                        $query = "SELECT * FROM category WHERE cat_id = '$category_id' ";
                                        $category_name = mysqli_query(
                                            $connect,
                                            $query
                                        );
                                        while (
                                            $row = mysqli_fetch_assoc(
                                                $category_name
                                            )
                                        ) {

                                            $cat_id = $row['cat_id'];
                                            $cat_name = $row['cat_name'];
                                            $parent_id = $row['parent_id'];
                                            ?>
                                            
                                            <h6><?php echo $cat_name; ?> </h6>
                                            <?php
                                        }
                                        ?>
                                    </div>
                              
                            </div>
                            <!-- Blog Title and Description -->
                            <div class="blog-description">
                                <a href="single.php?article=<?php echo $post_id; ?>">
                                    <h3 class="post-title"><?php echo $title; ?></h3>
                                </a>
                                <p><?php echo substr(
                                    $description,
                                    0,
                                    300
                                ); ?>...</p>
                                <!-- Blog Info, Date and Author -->
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="blog-info">
                                            <ul>
                                                <li>
                                                    <i class="fa fa-calendar"></i>
                                                    
                                                    <?php echo $post_date; ?>   

                                                    </li>
                                                <li>
                                                    <i class="fa fa-user"></i>
            

                                                By - <?php echo $author_name; ?> 
                                                <?php
                            } ?>
                                                    
                                                    </li>
                                                <!-- <li>
                                                    <i class="fa fa-heart"></i>(50)</li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-4 read-more-btn">
                                        <a href="single.php?article=<?php echo $post_id; ?>" class="btn btn-primary">View Details
                                            <i class="fa fa-angle-double-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item Blog Post End -->
                        <?php
                        }
                    } elseif (isset($_GET['tags'])) {
                        $tags = $_GET['tags'];
                        $query = "SELECT  * FROM post  WHERE tags LIKE '%$tags%'";
                        $allPosts = mysqli_query($connect, $query);
                        $count = mysqli_num_rows($allPosts);
                        if ($count <= 0) {
                            echo '<div class = "alert alert-info">No post found based on your search : <strong>' .
                                $data .
                                '</strong></div>';
                        } else {
                            while ($row = mysqli_fetch_assoc($allPosts)) {

                                $post_id = $row['post_id'];
                                $title = $row['title'];
                                $description = $row['description'];
                                $category_id = $row['category_id'];
                                $adder_id = $row['adder_id'];
                                $tags = $row['tags'];
                                $status = $row['status'];
                                $post_date = $row['post_date'];
                                $image = $row['image'];
                                $author_name = $row['author_name'];
                                ?>
                              <!-- Single Item Blog Post Start -->
                        <div class="blog-post">
                            <!-- Blog Banner Image -->
                            <div class="blog-banner">
                                <a href="single.php?article=<?php echo $post_id; ?>">
                                   
                                    <?php if (!empty($image)) { ?>
                                            <img src="admin/dist/img/posts/<?php echo $image; ?>" >
                                        <?php } else { ?>
                                            <img src="admin/dist/img/posts/default.png" >
                                            <?php } ?>
                                     </a>         
                                    <!-- Post Category Names -->
                                    <div class="blog-category-name">
                                        
                                        <?php
                                        $query = "SELECT * FROM category WHERE cat_id = '$category_id' ";
                                        $category_name = mysqli_query(
                                            $connect,
                                            $query
                                        );
                                        while (
                                            $row = mysqli_fetch_assoc(
                                                $category_name
                                            )
                                        ) {

                                            $cat_id = $row['cat_id'];
                                            $cat_name = $row['cat_name'];
                                            $parent_id = $row['parent_id'];
                                            ?>
                                            
                                            <h6><?php echo $cat_name; ?> </h6>
                                            <?php
                                        }
                                        ?>
                                    </div>
                              
                            </div>
                            <!-- Blog Title and Description -->
                            <div class="blog-description">
                                <a href="single.php?article=<?php echo $post_id; ?>">
                                    <h3 class="post-title"><?php echo $title; ?></h3>
                                </a>
                                <p><?php echo substr(
                                    $description,
                                    0,
                                    300
                                ); ?>...</p>
                                <!-- Blog Info, Date and Author -->
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="blog-info">
                                            <ul>
                                                <li>
                                                    <i class="fa fa-calendar"></i>
                                                    
                                                    <?php echo $post_date; ?>   

                                                    </li>
                                                <li>
                                                    <i class="fa fa-user"></i>
                                                     

                                                By - <?php echo $author_name; ?> 
                                                <?php
                            } ?>
                                                    
                                                    </li>
                                                <!-- <li>
                                                    <i class="fa fa-heart"></i>(50)</li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-4 read-more-btn">
                                        <a href="single.php?article=<?php echo $post_id; ?>" class="btn btn-primary">View Details
                                            <i class="fa fa-angle-double-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item Blog Post End -->
                        <?php
                        }
                    } ?>

                      
                    </div>

                    <!-- Blog Right Sidebar -->
                     <?php include 'inc/sidebar.php'; ?>
                    <!-- Right Sidebar End -->
                </div>
            </div>
        </section>
        <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
<?php include 'inc/footer.php'; ?>

