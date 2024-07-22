<?php
include 'config/config.php';



if ($_SERVER['REQUEST_METHOD']  == 'GET') {
    if (isset($_GET)) {

        $sql = "SELECT * FROM employee WHERE id = {$_GET['id']};";
        $query = mysqli_query($connect, $sql);
        global $data;
        $data = mysqli_fetch_assoc($query);
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employee</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: white;
            border-radius: 10px;
        }

        .info {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-view {
            display: block;
            margin: 20px auto;
            background-color: #007bff;
            color: white;
            border: none;
        }

        .btn-view:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Employee Details</h2>
        <div class="info">
            <p><strong>ID:</strong> <span id="employeeId"><?php echo $data['id'] ?></span></p>
            <p><strong>Name:</strong> <span id="employeeName"><?php echo $data['Name'] ?></span></p>
            <p><strong>Address:</strong> <span id="employeeAddress"><?php echo $data['Address'] ?></span></p>
            <p><strong>Salary:</strong> <span id="employeeSalary"><?php echo $data['salary'] ?></span></p>
        </div>
        <button class="btn btn-primary btn-view" onclick="window.location.href='index.php'">View Employees</button>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript to dynamically fill in employee details if needed -->
    <script>

    </script>
</body>

</html>