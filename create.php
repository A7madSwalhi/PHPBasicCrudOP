<?php

include "config/config.php";
// Assuming $connect is your mysqli connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['salary'])) {
        $data = [
            'name' => $_POST['name'],
            'address' => $_POST['address'],
            'salary' => $_POST['salary']
        ];

        // Escape values to prevent SQL injection
        $name = mysqli_real_escape_string($connect, $data['name']);
        $address = mysqli_real_escape_string($connect, $data['address']);
        $salary = mysqli_real_escape_string($connect, $data['salary']);

        // Corrected SQL statement
        $sql = "INSERT INTO employee (Name, Address, Salary) VALUES ('$name', '$address', '$salary')";

        // Execute the query
        if (mysqli_query($connect, $sql)) {
            header("Location: index.php");
        } else {

            echo "Error: " . mysqli_error($connect);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: white;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Insert Employee</h2>
            <form id="employeeForm" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" class="form-control" id="salary" placeholder="Enter salary" name="salary" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block" ">Insert</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                    <script>

                    </script>
</body>

</html>