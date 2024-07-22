<?php
include 'config/config.php';
$id_up = null;

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    global $id_up;
    $id_up = $_GET['id'];

    $sql_getinfo = "SELECT * FROM employee WHERE id=$id_up";
    $query_fetinfo = mysqli_query($connect, $sql_getinfo);
    $row = mysqli_fetch_assoc($query_fetinfo);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['salary'])) {
        $id_up = $_GET['id'];
        $data = [
            'name' => $_POST['name'],
            'address' => $_POST['address'],
            'salary' => $_POST['salary']
        ];

        // Escape values to prevent SQL injection
        $name = mysqli_real_escape_string($connect, $data['name']);
        $address = mysqli_real_escape_string($connect, $data['address']);
        $salary = mysqli_real_escape_string($connect, $data['salary']);

        // Corrected SQL statement with proper quotes around values
        $sql = "UPDATE employee SET Name='$name', Address='$address', salary='$salary' WHERE id=$id_up";
        echo $sql;

        if (mysqli_query($connect, $sql)) {
            header("Location: index.php"); // Redirect to index page after successful update
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($connect);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: white;
            border-radius: 10px;
        }

        .form-title {
            margin-bottom: 30px;
            text-align: center;
        }

        .btn-update {
            background-color: #007bff;
            border: none;
        }

        .btn-update:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Update Employee</h2>
            <form id="updateEmployeeForm" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" value="<?php echo htmlspecialchars($row['Name']); ?>" placeholder="Enter name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" value="<?php echo htmlspecialchars($row['Address']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" class="form-control" id="salary" placeholder="Enter salary" value="<?php echo htmlspecialchars($row['salary']); ?>" name="salary" required>
                </div>
                <button type="submit" class="btn btn-primary btn-update btn-block">Update</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>