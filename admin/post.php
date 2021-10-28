<?php
include 'inc/admin/header.php';
include 'inc/admin/topbar.php';
include 'inc/admin/menubar.php';
?>

<!-- body content starts -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage All The Books</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Manage Books</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main body content area start-->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <?php
                    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
                    //read all the users
                    if ($do == 'Manage') { ?>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Manage all Books</h3>

                            <div class="card-tools">
                                <button
                                    type="button"
                                    class="btn btn-tool"
                                    data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered ">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#SL</th>
                                        <th scope="col">Thumbnil</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query =
                                        'SELECT  * FROM post ORDER BY post_id DESC';
                                    $allPosts = mysqli_query($connect, $query);
                                    $count = mysqli_num_rows($allPosts);
                                    if ($count <= 0) {
                                        echo '<div class = " alert alert-info">No Book added yet, Please add new Book</div>';
                                    }
                                    $i = 1;
                                    while (
                                        $row = mysqli_fetch_assoc($allPosts)
                                    ) {

                                        $post_id = $row['post_id'];
                                        $title = $row['title'];
                                        $description = $row['description'];
                                        $category_id = $row['category_id'];
                                        $author_name = $row['author_name'];
                                        $tags = $row['tags'];
                                        $status = $row['status'];
                                        $post_date = $row['post_date'];
                                        $image = $row['image'];
                                        ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <th scope="row">
                                            <?php if (!empty($image)) { ?>
                                            <img src="dist/img/posts/<?php echo $image; ?>" width="75">
                                        <?php } else { ?>
                                            <img src="dist/img/posts/default.png" width="75">
                                            <?php } ?>
                                        </th>
                                        <th scope="row"><?php echo $title; ?></th>
                                        <th scope="row">
                                       
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

                                            echo $cat_name;
                                        }
                                        ?>
                                        
                                        </th>
                                        <th scope="row">

                                                 <?php echo $author_name; ?> 
                                            
                                        
                                        </th>
                                        <th scope="row">
                                            <?php if ($status == 1) { ?>
                                            <span class="badge badge-success">Active</span>
                                        <?php } elseif ($status == 2) { ?>
                                            <span class="badge badge-danger">Inactive</span>
                                            <?php } ?>

                                        </th>
                                        <th scope="row"><?php echo $post_date; ?></th>

                                        <td>
                                            <div class="action_bar">
                                                <ul>
                                                    <li>
                                                        <a href="post.php?do=Edit&p_id=<?php echo $post_id; ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="" data-toggle="modal" data-target="#deletePost<?php echo $post_id; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>
                                        <!-- Modal -->
                                        <div
                                            class="modal fade"
                                            id="deletePost<?php echo $post_id; ?>"
                                            tabindex="-1"
                                            role="dialog"
                                            aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete this Book ?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="post.php?do=Delete&d_id=<?php echo $post_id; ?>" method="POST">
                                                            <input type="submit" name="deleteuser" class="btn btn-danger" value="Delete">
                                                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    <?php $i++;
                                    }
                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>

                <?php } elseif ($do == 'Add') { ?>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add New Post</h3>
                        </div>
                        <div class="card-body">
                            <!-- card body start -->
                            <form method="POST" action="post.php?do=Insert" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                name="title"
                                                required="required"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category_id" class="form-control">
                                            <option value="0" > Please Select a category/sub category</option>
                                            <?php
                                            $query =
                                                'SELECT * FROM category WHERE parent_id= 0 ORDER BY cat_name ASC';
                                            $parent_cat = mysqli_query(
                                                $connect,
                                                $query
                                            );
                                            while (
                                                $row = mysqli_fetch_assoc(
                                                    $parent_cat
                                                )
                                            ) {

                                                $cat_id = $row['cat_id'];
                                                $cat_name = $row['cat_name'];

                                                $parent_id = $row['parent_id'];
                                                ?>

                                                <option value="<?php echo $cat_id; ?>"> <?php echo $cat_name; ?> </option>

                                                <?php
                                                $query2 = "SELECT * FROM category WHERE parent_id= '$cat_id' ORDER BY cat_name ASC";
                                                $child_cat = mysqli_query(
                                                    $connect,
                                                    $query2
                                                );
                                                while (
                                                    $row = mysqli_fetch_assoc(
                                                        $child_cat
                                                    )
                                                ) {

                                                    $cat_id = $row['cat_id'];
                                                    $cat_name =
                                                        $row['cat_name'];
                                                    ?>
                                                
                                                 <option value="<?php echo $cat_id; ?>"> -- <?php echo $cat_name; ?> </option>
                                                <?php
                                                }

                                            }
                                            ?>
                                            
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Tags [seperate the tags using comma (,)]</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                name="tags"
                                                autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <label>Author Name</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                name="author"
                                                autocomplete="off">
                                        </div>
                                      
                                        
                                        <div class="form-group">
                                            <label>Book Status</label>
                                            <select name="status" class="form-control">
                                                <option value="2">Please select the status</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Book Thumbnail</label>
                                            <input class="form-control-file" type="File" name="image">
                                        </div>

                                    </div>

                                    <div class="col-lg-6">


                                        
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea
                                                class="form-control"
                                                type="text"
                                                name="description"
                                                id="inputdescription"
                                                rows="4"
                                                >
                                                </textarea>
                                        </div>
                                        
                                        <div class="form-group">

                                            <input
                                                class="btn btn-primary"
                                                type="Submit"
                                                name="publish"
                                                value="Publish Post">
                                        </div>

                                    </div>

                                </div>

                            </form>

                        </form>
                        <!-- card body end -->
                    </div>
                </div>

            <?php } elseif ($do == 'Insert') {
                        if (isset($_POST['publish'])) {
                            $title = mysqli_real_escape_string(
                                $connect,
                                $_POST['title']
                            );
                            $description = mysqli_real_escape_string(
                                $connect,
                                $_POST['description']
                            );
                            $category_id = $_POST['category_id'];
                            $adder_id = $_SESSION['user_id'];
                            $status = $_POST['status'];
                            $tags = mysqli_real_escape_string(
                                $connect,
                                $_POST['tags']
                            );
                            $author_name = mysqli_real_escape_string(
                                $connect,
                                $_POST['author']
                            );

                            //take the image file and name

                            $image = $_FILES['image']['name'];

                            //take the image file and tamporary folder name name
                            $image_tmp = $_FILES['image']['tmp_name'];

                            //changing image name
                            $randomNumber = rand(0, 9999999);
                            $imageFile = $randomNumber . $image;

                            //move the uploaded file to its destination
                            move_uploaded_file(
                                $image_tmp,
                                'dist/img/posts/' . $imageFile
                            );
                            $query = "INSERT INTO post(title,description,category_id,adder_id,author_name,tags,status,image,post_date)
                                        VALUES ('$title','$description','$category_id','$adder_id','$author_name','$tags','$status', '$imageFile', now() )";

                            $publishPost = mysqli_query($connect, $query);

                            if ($publishPost) {
                                header('Location: post.php?do=Manage');
                            } else {
                                die(
                                    'MySql database error ' .
                                        mysqli_error($connect)
                                );
                            }
                        }
                    } elseif ($do == 'Edit') {
                        if (isset($_GET['p_id'])) {
                            $p_id = $_GET['p_id'];
                            $query = "SELECT * FROM post WHERE post_id = '$p_id'";
                            $select_post = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_assoc($select_post)) {

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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Book </h3>
                    </div>
                    <div class="card-body">
                        <!-- card body start -->
                        <form method="POST" action="post.php?do=Update" enctype="multipart/form-data">
                             <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                name="title"
                                                required="required"
                                                autocomplete="off"
                                                value="<?php echo $title; ?>"
                                                >
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="category_id" class="form-control">
                                            <option value="0" > Please Select a category/sub category</option>
                                            <?php
                                            $query =
                                                'SELECT * FROM category WHERE parent_id= 0 ORDER BY cat_name ASC';
                                            $parent_cat = mysqli_query(
                                                $connect,
                                                $query
                                            );
                                            while (
                                                $row = mysqli_fetch_assoc(
                                                    $parent_cat
                                                )
                                            ) {

                                                $cat_id = $row['cat_id'];
                                                $cat_name = $row['cat_name'];

                                                $parent_id = $row['parent_id'];
                                                ?>

                                                <option value="<?php echo $cat_id; ?>" <?php if (
    $category_id == $cat_id
) {
    echo 'selected';
} ?> > <?php echo $cat_name; ?> </option>

                                                <?php
                                                $query2 = "SELECT * FROM category WHERE parent_id= '$cat_id' ORDER BY cat_name ASC";
                                                $child_cat = mysqli_query(
                                                    $connect,
                                                    $query2
                                                );
                                                while (
                                                    $row = mysqli_fetch_assoc(
                                                        $child_cat
                                                    )
                                                ) {

                                                    $cat_id = $row['cat_id'];
                                                    $cat_name =
                                                        $row['cat_name'];
                                                    ?>
                                                
                                                 <option value="<?php echo $cat_id; ?>" <?php if (
    $category_id == $cat_id
) {
    echo 'selected';
} ?>> -- <?php echo $cat_name; ?> </option>
                                                <?php
                                                }

                                            }
                                            ?>
                                            
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Tags [seperate the tags using comma (,)]</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                name="tags"
                                                autocomplete="off"
                                                value="<?php echo $tags; ?>"
                                                >
                                        </div>

                                        <div class="form-group">
                                            <label>Author Name</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                name="author"
                                                autocomplete="off"
                                                value="<?php echo $author_name; ?>"
                                                >
                                        </div>
                                      
                                        
                                        <div class="form-group">
                                            <label>Book Status</label>
                                            <select name="status" class="form-control">
                                                 <option value="2">Please select the status</option>
                                            <option value="1" <?php if (
                                                $status == 1
                                            ) {
                                                echo 'selected';
                                            } ?>>Active</option>
                                            <option value="2" <?php if (
                                                $status == 2
                                            ) {
                                                echo 'selected';
                                            } ?>>Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Book Thumbnail</label>
                                            <?php if (!empty($image)) { ?>
                                            <img src="dist/img/posts/<?php echo $image; ?>" width="150" style="display: block; margin-bottom: 15px;"> 
                                        <?php } else { ?>
                                            <h4> No Book thumbnail uploaded </h4>
                                            <?php } ?>
                                            <input class="form-control-file" type="File" name="image">
                                        </div>

                                    </div>

                                    <div class="col-lg-6">


                                        
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea
                                                class="form-control"
                                                type="text"
                                                name="description"
                                                id="inputdescription"
                                                rows="4"
                                                >
                                                <?php echo $description; ?>
                                                </textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                        <input 
                                        type="hidden"
                                        name="postUpdateId"
                                        value="<?php echo $post_id; ?>"
                                        >

                                            <input
                                                class="btn btn-primary"
                                                type="Submit"
                                                name="updatepost"
                                                value="Save Changes">
                                        </div>

                                    </div>

                                </div>

                        </form>

                    </form>
                    <!-- card body end -->
                </div>

            <?php
                            }
                        }
                    } elseif ($do == 'Update') {
                        if (isset($_POST['updatepost'])) {
                            $updatePostId = $_POST['postUpdateId'];
                            $title = mysqli_real_escape_string(
                                $connect,
                                $_POST['title']
                            );
                            $description = mysqli_real_escape_string(
                                $connect,
                                $_POST['description']
                            );
                            $author_name = mysqli_real_escape_string(
                                $connect,
                                $_POST['author']
                            );
                            $category_id = $_POST['category_id'];
                            $adder_id = $_SESSION['adder_id'];
                            $status = $_POST['status'];
                            $tags = mysqli_real_escape_string(
                                $connect,
                                $_POST['tags']
                            );
                            //take the image file and name

                            $image = $_FILES['image']['name'];

                            //take the image file and tamporary folder name name
                            $image_tmp = $_FILES['image']['tmp_name'];

                            if (!empty($image)) {
                                //changing image name
                                $randomNumber = rand(0, 9999999);
                                $imageFile = $randomNumber . $image;

                                //move the uploaded file to its destination
                                move_uploaded_file(
                                    $image_tmp,
                                    'dist/img/posts/' . $imageFile
                                );
                                $deletePostThumbnail = "SELECT * FROM post WHERE post_id = '$updatePostId' ";
                                $removeImage = mysqli_query(
                                    $connect,
                                    $deletePostThumbnail
                                );
                                while (
                                    $row = mysqli_fetch_assoc($removeImage)
                                ) {
                                    $rImage = $row['image'];
                                    unlink('dist/img/posts/' . $rImage);
                                }

                                $query = "UPDATE post SET title = '$title',description = '$description',category_id ='$category_id',adder_id ='$adder_id', author_name='$author_name',tags = '$tags' , 
                                status = '$status' , image = '$imageFile' WHERE post_id = '$updatePostId'   ";
                                $updatePostInfo = mysqli_query(
                                    $connect,
                                    $query
                                );

                                if ($updatePostInfo) {
                                    header('Location: post.php?do=Manage');
                                } else {
                                    die(
                                        'MySql database error ' .
                                            mysqli_error($connect)
                                    );
                                }
                            } else {
                                $query = "UPDATE post SET title = '$title',description = '$description',category_id ='$category_id', adder_id = '$adder_id',author_name='$author_name', tags ='$tags' , 
                                status = '$status' WHERE post_id = '$updatePostId'   ";
                                $updatePostInfo = mysqli_query(
                                    $connect,
                                    $query
                                );

                                if ($updatePostInfo) {
                                    header('Location: post.php?do=Manage');
                                } else {
                                    die(
                                        'MySql database error ' .
                                            mysqli_error($connect)
                                    );
                                }
                            }
                        }
                    } elseif ($do == 'Delete') {
                        if (isset($_GET['d_id'])) {
                            $deletePostId = $_GET['d_id'];

                            $removeQuery = "SELECT * FROM post WHERE post_id = '$deletePostId'";

                            $removePost = mysqli_query($connect, $removeQuery);
                            while ($row = mysqli_fetch_assoc($removePost)) {
                                $rImage = $row['image'];
                                unlink('dist/img/posts/' . $rImage);
                            }
                            $query = "DELETE FROM post WHERE post_id = '$deletePostId'";

                            $delPost = mysqli_query($connect, $query);
                            if ($delPost) {
                                header('Location: post.php?do=Manage');
                            } else {
                                die('database error.' . mysqli_error($connect));
                            }
                        }
                    } else {
                        header('Location:404.php');
                    }
                    ?>
            </div>

        </div>
    </div>
</section>
<!-- Main body content area end-->

</div>
<!-- body content ends -->

<?php include 'inc/admin/footer.php';
?>
