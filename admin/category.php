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
                    <h1 class="m-0">Manage All Category</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Manage All Category</li>
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
                <div class="col-md-6">

                    <?php if (isset($_GET['update_id'])) {
                        $update_cat_id = $_GET['update_id'];
                        $data = "SELECT * FROM category WHERE cat_id = $update_cat_id";
                        $readData = mysqli_query($connect, $data);
                        while ($row = mysqli_fetch_assoc($readData)) {

                            $cat_id = $row['cat_id'];
                            $cat_name = $row['cat_name'];
                            $cat_desc = $row['cat_desc'];
                            $parent_id = $row['parent_id'];
                            $status = $row['status'];
                            ?>

                    <!-- Edit Block Start-->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Category</h3>

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
                            <form action="" method="post">
                                <!-- category name -->
                                <div class="form-group">
                                    <label for="inputName">Category / Sub Category Name</label>
                                    <input type="text" id="inputName" class="form-control" name="cat_name" value="<?php echo $cat_name; ?>">
                                </div>
                                <!-- category description -->
                                <div class="form-group">
                                    <label for="inputDescription">Category Description</label>
                                    <textarea
                                        id="inputDescription"
                                        class="form-control"
                                        rows="4"
                                        name="description"> <?php echo $cat_desc; ?> </textarea>
                                </div>
                                <!--Parent category-->
                                <div class="form-group">
                                    <label for="inputParent">Parent category [optional]</label>
                                    <select id="inputParent" class="form-control custom-select" name="parent_id">
                                        <option value="0">Select the parent category</option>
                                        <?php
                                        $query =
                                            'SELECT * FROM category WHERE parent_id = 0 ORDER BY cat_name ASC';
                                        $readParent = mysqli_query(
                                            $connect,
                                            $query
                                        );
                                        while (
                                            $row = mysqli_fetch_assoc(
                                                $readParent
                                            )
                                        ) {

                                            $parent_cat_id = $row['cat_id'];
                                            $parent_cat_name = $row['cat_name'];
                                            ?>
                                        <option value="<?php echo $parent_cat_id; ?>" <?php if (
    $parent_cat_id == $parent_id
) {
    echo 'selected';
} ?>> <?php echo $parent_cat_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- category status -->
                                <div class="form-group">
                                    <label for="inputStatus">Status</label>
                                    <select id="inputStatus" class="form-control custom-select" name="status">
                                        <option value="0">Select the Status</option>
                                        <option value="1" <?php if (
                                            $status == 1
                                        ) {
                                            echo 'selected';
                                        } ?>>Active</option>
                                        <option value="0" <?php if (
                                            $status == 0
                                        ) {
                                            echo 'selected';
                                        } ?>>Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="save" class="btn btn-primary" value="Save Changes">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Edit Block end-->
                    <?php
                        }
                    } ?>

                    <!-- Update Category info -->
                    <?php if (isset($_POST['save'])) {
                        $cat_name = mysqli_real_escape_string(
                            $connect,
                            $_POST['cat_name']
                        );
                        $cat_desc = mysqli_real_escape_string(
                            $connect,
                            $_POST['description']
                        );
                        $parent_id = $_POST['parent_id'];
                        $status = $_POST['status'];
                        $updateQuery = "UPDATE category SET cat_name = '$cat_name', cat_desc = '$cat_desc', parent_id = '$parent_id', status = '$status' 
                        WHERE cat_id = '$update_cat_id' ";
                        $updateCategoryInfo = mysqli_query(
                            $connect,
                            $updateQuery
                        );
                        if ($updateCategoryInfo) {
                            header('Location: category.php');
                        } else {
                            die(
                                'Database connection failed ' .
                                    mysqli_error($connect)
                            );
                            header('Location: index.php');
                        }
                    } ?>

                    <!-- Add Category Block end-->

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Category</h3>

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
                            <form action="" method="post">
                                <!-- category name -->
                                <div class="form-group">
                                    <label for="inputName">Category / Sub Category Name</label>
                                    <input type="text" id="inputName" class="form-control" name="cat_name">
                                </div>
                                <!-- category description -->
                                <div class="form-group">
                                    <label for="inputDescription">Category Description</label>
                                    <textarea
                                        id="inputDescription"
                                        class="form-control"
                                        rows="4"
                                        name="description"></textarea>
                                </div>
                                <!--Parent category-->
                                <div class="form-group">
                                    <label for="inputParent">Parent category [optional]</label>
                                    <select id="inputParent" class="form-control custom-select" name="parent_id">
                                        <option value="0">Select the parent category</option>
                                        <?php
                                        $query =
                                            'SELECT * FROM category WHERE parent_id = 0 ORDER BY cat_name ASC';
                                        $readParent = mysqli_query(
                                            $connect,
                                            $query
                                        );
                                        while (
                                            $row = mysqli_fetch_assoc(
                                                $readParent
                                            )
                                        ) {

                                            $parent_cat_id = $row['cat_id'];
                                            $parent_cat_name = $row['cat_name'];
                                            ?>
                                        <option value="<?php echo $parent_cat_id; ?>"><?php echo $parent_cat_name; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- category status -->
                                <div class="form-group">
                                    <label for="inputStatus">Status</label>
                                    <select id="inputStatus" class="form-control custom-select" name="status">
                                        <option value="0">Select the Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input
                                        type="submit"
                                        name="add_cat"
                                        class="btn btn-primary"
                                        value="Add New Category">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Insert category to db -->
            <?php if (isset($_POST['add_cat'])) {
                # code...
                $cat_name = mysqli_real_escape_string(
                    $connect,
                    $_POST['cat_name']
                );
                $cat_desc = mysqli_real_escape_string(
                    $connect,
                    $_POST['description']
                );
                $parent_id = $_POST['parent_id'];
                $status = $_POST['status'];

                $query = "INSERT INTO  category(cat_name,cat_desc,parent_id,status) VALUES ('$cat_name','$cat_desc','$parent_id','$status')";
                $addCategory = mysqli_query($connect, $query);
                if ($addCategory) {
                    header('Location: category.php');
                } else {
                    die('Database connection failed ' . mysqli_error($connect));
                    header('Location: index.php');
                }
            } ?>
                <!-- Add new category end -->
                <!-- manage all category -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Manage all category</h3>

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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#SL</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Primary / Sub</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query =
                                        'SELECT * FROM category WHERE parent_id= 0 ORDER BY cat_name ASC';
                                    $allCat = mysqli_query($connect, $query);
                                    $i = 0;
                                    while ($row = mysqli_fetch_assoc($allCat)) {

                                        $cat_id = $row['cat_id'];
                                        $cat_name = $row['cat_name'];
                                        $cat_desc = $row['cat_desc'];
                                        $parent_id = $row['parent_id'];
                                        $status = $row['status'];
                                        $i++;
                                        ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td><?php echo $cat_name; ?></td>
                                        <td>
                                            <?php echo '<span class="badge badge-info">Primary</span>'; ?>

                                        </td>
                                        <td>
                                        <?php if ($status == 0) {
                                            # code...
                                            echo '<span class="badge badge-danger" >Inactive</span>';
                                        } elseif ($status == 1) {
                                            echo '<span class="badge badge-success" >Active</span>';
                                        } ?>
                                        </td>
                                        <td>
                                            <div class="action_bar">
                                                <ul>
                                                    <li>
                                                        <a href="category.php?update_id=<?php echo $cat_id; ?> ">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>
                                    </tr>

                                    <?php
                                    $childCatQuery = "SELECT * FROM category WHERE parent_id = '$cat_id' ORDER BY cat_name ASC";
                                    $childCat = mysqli_query(
                                        $connect,
                                        $childCatQuery
                                    );
                                    while (
                                        $row = mysqli_fetch_assoc($childCat)
                                    ) {

                                        $child_cat_id = $row['cat_id'];
                                        $cat_name = $row['cat_name'];
                                        $cat_desc = $row['cat_desc'];
                                        $parent_id = $row['parent_id'];
                                        $status = $row['status'];
                                        $i++;
                                        ?>
                                    <tr>
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td>--
                                            <?php echo $cat_name; ?></td>
                                        <td>
                                            <?php echo '<span class="badge badge-dark">Child</span>'; ?>
                                        </td>
                                        <td>
                                        <?php if ($status == 0) {
                                            # code...
                                            echo '<span class="badge badge-danger" >Inactive</span>';
                                        } elseif ($status == 1) {
                                            echo '<span class="badge badge-success" >Active</span>';
                                        } ?>
                                        </td>
                                        <td>
                                            <div class="action_bar">
                                                <ul>
                                                    <li>
                                                        <a href="category.php?update_id=<?php echo $child_cat_id; ?> ">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>
                                    </tr>

                                    <?php
                                    }

                                    }
                                    ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- Main body content area end-->

    </div>
    <!-- body content ends -->

    <?php include 'inc/admin/footer.php';
?>
