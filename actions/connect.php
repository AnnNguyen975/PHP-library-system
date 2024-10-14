<?php
$con = mysqli_connect("localhost", "root", "", "borrow-system");
if ($con) {
    echo "Connection successful";

} else {
    die(mysqli_error($con));
}
