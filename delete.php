<?php

include_once 'config/config.php';

if ($_SERVER['REQUEST_METHOD']  == 'GET') {
    if (isset($_GET)) {

        $sql = "DELETE from employee WHERE id = {$_GET['id']};";
        $query = mysqli_query($connect, $sql);


        if ($query) {
            // Redirect to index.php after successful deletion
            header("Location: index.php");
            exit(); // Ensure script stops executing after redirect
        } else {
            // Log or display the error if the query fails
            echo "Error deleting record: " . mysqli_error($connect);
        }
    } else {
        echo "ID parameter is missing.";
    }
}
