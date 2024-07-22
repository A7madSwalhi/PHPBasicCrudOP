<?php
include 'config/config.php';



$sql = "SELECT * FROM employee";
$query = mysqli_query($connect, $sql);









?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Employee Management</h1>
        <button id="createBtn" class="btn btn-success mb-3" onclick="window.location.href='create.php'">Create New Employee</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="employeeTable">
                <?php while ($rows = mysqli_fetch_assoc($query)) : ?>
                    <tr data-id="<?php echo $rows['id'] ?>">
                        <td><?php echo $rows['id'] ?></td>
                        <td><?php echo $rows['Name'] ?></td>
                        <td><?php echo $rows['Address'] ?></td>
                        <td><?php echo $rows['salary'] ?></td>
                        <td>
                            <button class="btn btn-info btn-sm viewBtn" onclick="window.location.href = 'read.php?id=<?php echo $rows['id'] ?>'">View</button>
                            <button class="btn btn-warning btn-sm updateBtn" onclick="window.location.href = 'update.php?id=<?php echo $rows['id'] ?>'">Update</button>
                            <button class=" btn btn-danger btn-sm deleteBtn" onclick="window.location.href = 'delete.php?id=<?php echo $rows['id'] ?>'">Delete</button>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>



    </script>
</body>

</html>