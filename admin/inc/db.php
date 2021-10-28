<?php
$connect = mysqli_connect('localhost', 'root', '', 'mylibrary');
if ($connect) {
} else {
    # code...
    die('Database connection failed ' . mysqli_error($connect));
}

?>
