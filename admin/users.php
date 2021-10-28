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
                    <h1 class="m-0">Manage All The Users</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Manage Users</li>
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

                <?php if ($_SESSION['user_role'] == 1) { ?>
                    <?php
                    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
                    //read all the users
                    if ($do == 'Manage') { ?>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Manage all Users</h3>

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
                                        <th scope="col">Image</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Join Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = 'SELECT  * FROM users';
                                    $allUsers = mysqli_query($connect, $query);
                                    $i = 1;
                                    while (
                                        $row = mysqli_fetch_assoc($allUsers)
                                    ) {

                                        $user_id = $row['user_id'];
                                        $fullname = $row['fullname'];
                                        $username = $row['username'];
                                        $email = $row['email'];
                                        $password = $row['password'];
                                        $phone = $row['phone'];
                                        $address = $row['address'];
                                        $status = $row['status'];
                                        $user_role = $row['user_role'];
                                        $join_date = $row['join_date'];
                                        $image = $row['image'];
                                        ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <th scope="row">
                                            <?php if (!empty($image)) { ?>
                                            <img src="dist/img/users/<?php echo $image; ?>" width="75">
                                        <?php } else { ?>
                                            <img src="dist/img/users/default.png" width="75">
                                            <?php } ?>
                                        </th>
                                        <th scope="row"><?php echo $fullname; ?></th>
                                        <th scope="row"><?php echo $username; ?></th>
                                        <th scope="row"><?php echo $email; ?></th>
                                        <th scope="row"><?php echo $phone; ?></th>
                                        <th scope="row">
                                            <?php if ($status == 1) { ?>
                                            <span class="badge badge-success">Active</span>
                                        <?php } elseif ($status == 2) { ?>
                                            <span class="badge badge-danger">Inactive</span>
                                            <?php } ?>

                                        </th>
                                        <th scope="row">
                                            <?php if ($user_role == 1) { ?>
                                            <span class="badge badge-success">Super-Admin</span>
                                        <?php } elseif ($user_role == 2) { ?>
                                            <span class="badge badge-primary">Editor</span>
                                        <?php } elseif ($user_role == 3) { ?>
                                            <span class="badge badge-info">users</span>
                                            <?php } ?>
                                        </th>
                                        <th scope="row"><?php echo $join_date; ?></th>

                                        <td>
                                            <div class="action_bar">
                                                <ul>
                                                    <li>
                                                        <a href="users.php?do=Edit&u_id=<?php echo $user_id; ?>">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="" data-toggle="modal" data-target="#deleteUser<?php echo $user_id; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>
                                        <!-- Modal -->
                                        <div
                                            class="modal fade"
                                            id="deleteUser<?php echo $user_id; ?>"
                                            tabindex="-1"
                                            role="dialog"
                                            aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Do you confirm to delete ?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form action="users.php?do=Delete&d_id=<?php echo $user_id; ?>" method="POST">
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
                            <h3 class="card-title">Manage all Users</h3>
                        </div>
                        <div class="card-body">
                            <!-- card body start -->
                            <form method="POST" action="users.php?do=Insert" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                name="fullname"
                                                required="required"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                name="username"
                                                required="required"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input
                                                class="form-control"
                                                type="email"
                                                name="email"
                                                required="required"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input
                                                class="form-control"
                                                type="password"
                                                name="password"
                                                required="required"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input
                                                class="form-control"
                                                type="password"
                                                name="repassword"
                                                required="required"
                                                autocomplete="off">
                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label>Phone No.</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                name="phone"
                                                required="required"
                                                autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input
                                                class="form-control"
                                                type="text"
                                                name="address"
                                                required="required"
                                                autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <label>User Status</label>
                                            <select name="status" class="form-control">
                                                <option value="2">Please select the status</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>User Role</label>
                                            <select name="user_role" class="form-control">
                                                <option value="3">Please select the user role</option>
                                                <option value="1">Super-admin</option>
                                                <option value="2">Editor</option>
                                                <option value="3">User</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input class="form-control-file" type="File" name="image">
                                        </div>
                                        <div class="form-group">

                                            <input
                                                class="btn btn-primary"
                                                type="Submit"
                                                name="register"
                                                value="Add New User">
                                        </div>

                                    </div>

                                </div>

                            </form>

                        </form>
                        <!-- card body end -->
                    </div>
                </div>

            <?php } elseif ($do == 'Insert') {
                        if (isset($_POST['register'])) {
                            $username = $_POST['username'];
                            $fullname = $_POST['fullname'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $address = $_POST['address'];
                            $status = $_POST['status'];
                            $user_role = $_POST['user_role'];

                            $password = $_POST['password'];
                            $repassword = $_POST['repassword'];

                            //take the image file and name

                            $image = $_FILES['image']['name'];

                            //take the image file and tamporary folder name name
                            $image_tmp = $_FILES['image']['tmp_name'];

                            if ($password == $repassword) {
                                $hashedPass = sha1($password);

                                if (!empty($image)) {
                                    //changing image name
                                    $randomNumber = rand(0, 9999999);
                                    $imageFile = $randomNumber . $image;

                                    //move the uploaded file to its destination
                                    move_uploaded_file(
                                        $image_tmp,
                                        'dist/img/users/' . $imageFile
                                    );
                                    $query = "INSERT INTO users(fullname,username,email,password,phone,address,status,user_role,join_date,image)
                                        VALUES ('$fullname','$username','$email','$hashedPass','$phone','$address','$status','$user_role', now() , '$imageFile')";

                                    $registerUser = mysqli_query(
                                        $connect,
                                        $query
                                    );

                                    if ($registerUser) {
                                        header('Location: users.php?do=Manage');
                                    } else {
                                        die(
                                            'MySql database error ' .
                                                mysqli_error($connect)
                                        );
                                    }
                                } else {
                                    $query = "INSERT INTO users(fullname,username,email,password,phone,address,status,user_role,join_date)
                                        VALUES ('$fullname','$username','$email','$hashedPass','$phone','$address','$status','$user_role', now())";

                                    $registerUser = mysqli_query(
                                        $connect,
                                        $query
                                    );

                                    if ($registerUser) {
                                        header('Location: users.php?do=Manage');
                                    } else {
                                        die(
                                            'MySql database error ' .
                                                mysqli_error($connect)
                                        );
                                    }
                                }
                            }
                        }
                    } elseif ($do == 'Edit') {
                        if (isset($_GET['u_id'])) {
                            $u_id = $_GET['u_id'];
                            $query = "SELECT * FROM users WHERE user_id = '$u_id'";
                            $select_user = mysqli_query($connect, $query);
                            while ($row = mysqli_fetch_assoc($select_user)) {

                                $user_id = $row['user_id'];
                                $fullname = $row['fullname'];
                                $username = $row['username'];
                                $email = $row['email'];
                                $password = $row['password'];
                                $phone = $row['phone'];
                                $address = $row['address'];
                                $status = $row['status'];
                                $user_role = $row['user_role'];
                                $join_date = $row['join_date'];
                                $image = $row['image'];
                                ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update User Information</h3>
                    </div>
                    <div class="card-body">
                        <!-- card body start -->
                        <form method="POST" action="users.php?do=Update" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="fullname"
                                            required="required"
                                            autocomplete="off"
                                            value="<?php echo $fullname; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="username"
                                            required="required"
                                            autocomplete="off"
                                            value="<?php echo $username; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input
                                            class="form-control"
                                            type="email"
                                            name="email"
                                            required="required"
                                            autocomplete="off"
                                            value="<?php echo $email; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input
                                            class="form-control"
                                            type="password"
                                            name="password"
                                            autocomplete="off"
                                            placeholder="******">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input
                                            class="form-control"
                                            type="password"
                                            name="repassword"
                                            autocomplete="off"
                                            placeholder="******">
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>Phone No.</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="phone"
                                            required="required"
                                            autocomplete="off"
                                            value="<?php echo $phone; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="address"
                                            required="required"
                                            autocomplete="off"
                                            value="<?php echo $address; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>User Status</label>
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
                                        <label>User Role</label>
                                        <select name="user_role" class="form-control">
                                            <option value="3">Please select the user role</option>
                                            <option value="1" <?php if (
                                                $user_role == 1
                                            ) {
                                                echo 'selected';
                                            } ?>>Super-admin</option>
                                            <option value="2" <?php if (
                                                $user_role == 2
                                            ) {
                                                echo 'selected';
                                            } ?>>Editor</option>
                                            <option value="3" <?php if (
                                                $user_role == 3
                                            ) {
                                                echo 'selected';
                                            } ?>>User</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <br>
                                        <?php if (!empty($image)) { ?>
                                        <img src="dist/img/users/<?php echo $image; ?>" width="75">
                                    <?php } else {echo 'No picture uploaded';} ?>

                                        <input class="form-control-file" type="File" name="image">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="updateUserID" value="<?php echo $user_id; ?>">

                                        <input
                                            class="btn btn-primary"
                                            type="Submit"
                                            name="savechange"
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
                        if (isset($_POST['savechange'])) {
                            $updateUserID = $_POST['updateUserID'];
                            $username = $_POST['username'];
                            $fullname = $_POST['fullname'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $address = $_POST['address'];
                            $status = $_POST['status'];
                            $user_role = $_POST['user_role'];

                            $password = $_POST['password'];
                            $repassword = $_POST['repassword'];

                            //take the image file and name

                            $image = $_FILES['image']['name'];

                            //take the image file and tamporary folder name name
                            $image_tmp = $_FILES['image']['tmp_name'];
                            if (!empty($password) && !empty($image)) {
                                if ($password == $repassword) {
                                    $hashedPass = sha1($password);

                                    //remove image
                                    $removeQuery = "SELECT * FROM users WHERE user_id = '$updateUserID'";
                                    $removeImage = mysqli_query(
                                        $connect,
                                        $removeQuery
                                    );
                                    while (
                                        $row = mysqli_fetch_assoc($removeImage)
                                    ) {
                                        $rImage = $row['image'];
                                        unlink('dist/img/users/' . $rImage);
                                    }

                                    //changing image name
                                    $randomNumber = rand(0, 9999999);
                                    $imageFile = $randomNumber . $image;

                                    //move the uploaded file to its destination
                                    move_uploaded_file(
                                        $image_tmp,
                                        'dist/img/users/' . $imageFile
                                    );
                                    $query = "UPDATE users SET fullname ='$fullname' ,username = '$username' ,email =  '$email',password = '$hashedPass' ,
                                    phone = '$phone' ,address = '$address',status = '$status',user_role = '$user_role' ,image = '$imageFile' WHERE user_id = '$updateUserID'";

                                    $updateUserInfo = mysqli_query(
                                        $connect,
                                        $query
                                    );

                                    if ($updateUserInfo) {
                                        header('Location: users.php?do=Manage');
                                    } else {
                                        die(
                                            'MySql database error ' .
                                                mysqli_error($connect)
                                        );
                                    }
                                }
                            } elseif (!empty($password) && empty($image)) {
                                if ($password == $repassword) {
                                    $hashedPass = sha1($password);

                                    //changing image name
                                    $randomNumber = rand(0, 9999999);
                                    $imageFile = $randomNumber . $image;

                                    //move the uploaded file to its destination
                                    move_uploaded_file(
                                        $image_tmp,
                                        'dist/img/users/' . $imageFile
                                    );
                                    $query = "UPDATE users SET fullname ='$fullname' ,username = '$username' ,email =  '$email',password = '$hashedPass' ,
                                    phone = '$phone' ,address = '$address',status = '$status',user_role = '$user_role' WHERE user_id = '$updateUserID'";

                                    $updateUserInfo = mysqli_query(
                                        $connect,
                                        $query
                                    );

                                    if ($updateUserInfo) {
                                        header('Location: users.php?do=Manage');
                                    } else {
                                        die(
                                            'MySql database error ' .
                                                mysqli_error($connect)
                                        );
                                    }
                                }
                            } elseif (empty($password) && !empty($image)) {
                                //remove image
                                $removeQuery = "SELECT * FROM users WHERE user_id = '$updateUserID'";
                                $removeImage = mysqli_query(
                                    $connect,
                                    $removeQuery
                                );
                                while (
                                    $row = mysqli_fetch_assoc($removeImage)
                                ) {
                                    $rImage = $row['image'];
                                    unlink('dist/img/users/' . $rImage);
                                }

                                //changing image name
                                $randomNumber = rand(0, 9999999);
                                $imageFile = $randomNumber . $image;

                                //move the uploaded file to its destination
                                move_uploaded_file(
                                    $image_tmp,
                                    'dist/img/users/' . $imageFile
                                );
                                $query = "UPDATE users SET fullname ='$fullname' ,username = '$username' ,email =  '$email',
                                    phone = '$phone' ,address = '$address',status = '$status',user_role = '$user_role' ,image = '$imageFile' WHERE user_id = '$updateUserID'";

                                $updateUserInfo = mysqli_query(
                                    $connect,
                                    $query
                                );

                                if ($updateUserInfo) {
                                    header('Location: users.php?do=Manage');
                                } else {
                                    die(
                                        'MySql database error ' .
                                            mysqli_error($connect)
                                    );
                                }
                            } elseif (empty($password) && empty($image)) {
                                $query = "UPDATE users SET fullname ='$fullname' ,username = '$username' ,email =  '$email',
                                    phone = '$phone' ,address = '$address',status = '$status',user_role = '$user_role' WHERE user_id = '$updateUserID'";

                                $updateUserInfo = mysqli_query(
                                    $connect,
                                    $query
                                );

                                if ($updateUserInfo) {
                                    header('Location: users.php?do=Manage');
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
                            $deleteUserId = $_GET['d_id'];

                            $removeQuery = "SELECT * FROM users WHERE user_id = '$deleteUserId'";

                            $removeImage = mysqli_query($connect, $removeQuery);
                            while ($row = mysqli_fetch_assoc($removeImage)) {
                                $rImage = $row['image'];
                                unlink('dist/img/users/' . $rImage);
                            }
                            $query = "DELETE FROM users WHERE user_id = '$deleteUserId'";

                            $delUser = mysqli_query($connect, $query);
                            if ($delUser) {
                                header('Location: users.php?do=Manage');
                            } else {
                                die('database error.' . mysqli_error($connect));
                            }
                        }
                    } else {
                        header('Location:404.php');
                    }
                    ?>
            </div>


                    <?php } else {echo '<div class = "alert alert-warning">OPPSS!! You dont have access to this page</div>';} ?>

                    

        </div>
    </div>
</section>
<!-- Main body content area end-->

</div>
<!-- body content ends -->

<?php include 'inc/admin/footer.php';
?>
