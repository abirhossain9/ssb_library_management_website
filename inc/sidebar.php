<div class="col-md-4">

                    <!-- Latest News -->
                    <div class="widget">
                        <h4>Latest Added Books</h4>
                        <div class="title-border"></div>
                        
                        <!-- Sidebar Latest News Slider Start -->
                        <div class="sidebar-latest-news owl-carousel owl-theme">
                        <?php
                        $query =
                            'SELECT  * FROM post ORDER BY post_id DESC LIMIT 3';
                        $allPosts = mysqli_query($connect, $query);
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
                            ?>
                            <!--Latest News Start -->
                            <div class="item">
                                <div class="latest-news">
                                    <!-- Latest News Slider Image -->
                                    <div class="latest-news-image">
                                        <a href="single.php?article=<?php echo $post_id; ?>">
                                            <img src="admin/dist/img/posts/<?php echo $image; ?>" >
                                        </a>
                                    </div>
                                    <!-- Latest News Slider Heading -->
                                    <h5><a href="single.php?article=<?php echo $post_id; ?>"> <?php echo $title; ?> </a> </h5>
                                    <!-- Latest News Slider Paragraph -->
                                    <p><?php echo substr(
                                        $description,
                                        0,
                                        150
                                    ); ?>...</p>
                                </div>
                            </div>
                            <!--Latest News End -->


                       <?php
                        }
                        ?>
              
                        </div>
                        <!-- Sidebar Latest News Slider End -->
                    </div>


                    <!-- Search Bar Start -->
                    <div class="widget"> 
                            <!-- Search Bar -->
                            <h4>Book Search</h4>
                            <div class="title-border"></div>
                            <div class="search-bar">
                                <!-- Search Form Start -->
                                <form action="search.php" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="search" placeholder="Search Here" autocomplete="off" class="form-input">
                                        <i class="fa fa-paper-plane-o"></i>
                                    </div>
                                   <div class="form-group">
                                    <input type="submit" name="searchContent" class="btn btn-primary btn-block" value="search">
                                    
                                    </input>  
                                   </div>
                                </form>
                                <!-- Search Form End -->
                            </div>
                    </div>
                    <!-- Search Bar End -->

                    <!-- Recent Post -->
                    <div class="widget">
                        <h4>Recent Books</h4>
                        <div class="title-border"></div>
                        <div class="recent-post">
                            <!-- Recent Post Item Content Start -->
                            <div class="recent-post-item">
                                <div class="row">
                                    <!-- Item Image -->
                                    <div class="col-md-4">
                                        <img src="assets/images/corporate-team/team-1.jpg">
                                    </div>
                                    <!-- Item Tite -->
                                    <div class="col-md-8 no-padding">
                                        <h5>Corporate World is Here with Technology</h5>
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i>Dec 15, 2018</li>
                                            <li><i class="fa fa-comment-o"></i>15</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Post Item Content End -->

                            <!-- Recent Post Item Content Start -->
                            <div class="recent-post-item">
                                <div class="row">
                                    <!-- Item Image -->
                                    <div class="col-md-4">
                                        <img src="assets/images/corporate-team/team-1.jpg">
                                    </div>
                                    <!-- Item Tite -->
                                    <div class="col-md-8 no-padding">
                                        <h5>Corporate World is Here with Technology</h5>
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i>Dec 15, 2018</li>
                                            <li><i class="fa fa-comment-o"></i>15</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Post Item Content End -->

                            <!-- Recent Post Item Content Start -->
                            <div class="recent-post-item">
                                <div class="row">
                                    <!-- Item Image -->
                                    <div class="col-md-4">
                                        <img src="assets/images/corporate-team/team-1.jpg">
                                    </div>
                                    <!-- Item Tite -->
                                    <div class="col-md-8 no-padding">
                                        <h5>Corporate World is Here with Technology</h5>
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i>Dec 15, 2018</li>
                                            <li><i class="fa fa-comment-o"></i>15</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Post Item Content End -->

                            <!-- Recent Post Item Content Start -->
                            <div class="recent-post-item">
                                <div class="row">
                                    <!-- Item Image -->
                                    <div class="col-md-4">
                                        <img src="assets/images/corporate-team/team-1.jpg">
                                    </div>
                                    <!-- Item Tite -->
                                    <div class="col-md-8 no-padding">
                                        <h5>Corporate World is Here with Technology</h5>
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i>Dec 15, 2018</li>
                                            <li><i class="fa fa-comment-o"></i>15</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Post Item Content End -->

                        </div>
                    </div>

                    <!-- All Category -->
                    <div class="widget">
                        <h4>Blog Categories</h4>
                        <div class="title-border"></div>
                        <!-- Blog Category Start -->
                        <div class="blog-categories">
                            <ul>
                                <!-- Category Item -->
                                <li>
                                    <i class="fa fa-check"></i>
                                    Information Technology 
                                    <span>[22]</span>
                                </li>
                                <!-- Category Item -->
                                <li>
                                    <i class="fa fa-check"></i>
                                    Corporate News 
                                    <span>[20]</span>
                                </li>
                                <!-- Category Item -->
                                <li>
                                    <i class="fa fa-check"></i>
                                    Web Design and Development 
                                    <span>[35]</span>
                                </li>
                                <!-- Category Item -->
                                <li>
                                    <i class="fa fa-check"></i>
                                    Social Media Marketing 
                                    <span>[29]</span>
                                </li>
                                <!-- Category Item -->
                                <li>
                                    <i class="fa fa-check"></i>
                                    Search Engine Optimization 
                                    <span>[27]</span>
                                </li>
                            </ul>
                        </div>
                        <!-- Blog Category End -->
                    </div>

                    <!-- Recent Comments -->
                    <div class="widget">
                        <h4>Recent Comments</h4>
                        <div class="title-border"></div>
                        <div class="recent-comments">
                            
                            <!-- Recent Comments Item Start -->
                            <div class="recent-comments-item">
                                <div class="row">
                                    <!-- Comments Thumbnails -->
                                    <div class="col-md-4">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                    <!-- Comments Content -->
                                    <div class="col-md-8 no-padding">
                                        <h5>admin on blog posts</h5>
                                        <!-- Comments Date -->
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Comments Item End -->

                            <!-- Recent Comments Item Start -->
                            <div class="recent-comments-item">
                                <div class="row">
                                    <!-- Comments Thumbnails -->
                                    <div class="col-md-4">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                    <!-- Comments Content -->
                                    <div class="col-md-8 no-padding">
                                        <h5>admin on blog posts</h5>
                                        <!-- Comments Date -->
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Comments Item End -->

                            <!-- Recent Comments Item Start -->
                            <div class="recent-comments-item">
                                <div class="row">
                                    <!-- Comments Thumbnails -->
                                    <div class="col-md-4">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                    <!-- Comments Content -->
                                    <div class="col-md-8 no-padding">
                                        <h5>admin on blog posts</h5>
                                        <!-- Comments Date -->
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Comments Item End -->

                        </div>
                    </div>

                    <!-- Meta Tag Start -->
                    <div class="widget">
                        <h4>Tags</h4>
                        <div class="title-border"></div>
                        <!-- Meta Tag List Start -->
                        <div class="meta-tags">

                        <?php
                        $query = 'SELECT * FROM post limit 10 ';
                        $allTags = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_assoc($allTags)) {
                            $tags = $row['tags'];
                            $tt = explode(',', $tags);
                            foreach ($tt as $t) { ?> 
                            <a href="search.php?tags=<?php echo $t; ?>"><span><?php echo $t; ?></span></a>
                            <?php }
                        }
                        ?>      
                        </div>
                        <!-- Meta Tag List End -->
                    </div>
                    <!-- Meta Tag End -->
                </div>