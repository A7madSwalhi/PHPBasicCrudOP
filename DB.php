<?php
$database_info = include __DIR__ . "/config/database.php";

$connect = mysqli_connect(
    $database_info['servername'],
    $database_info['username'],
    $database_info['password'],
    $database_info['database']
);

if (!$connect) {
    die('connection Faild' . mysqli_connect_error());
}
$sql = "SELECT * FROM students WHERE   first_name like '%';";
$query = mysqli_query($connect,  "UPDATE students SET first_name = 'aHMAD JAMIL' WHERE last_name = 'Jamil';");
$q2 = mysqli_query($connect, "SELECT * FROM students WHERE   first_name like 'a%';");



$numRow = mysqli_num_rows($q2);


/* $rows = mysqli_fetch_assoc($query);
echo "<pre>";
echo    print_r($rows);
echo "</pre>"; */


if ($numRow > 0) {

    while ($rows = mysqli_fetch_assoc($q2)) {
        echo $rows['first_name']  . "-" . $rows['last_name'] . "-" . $rows['gender'] . '<br>';
    }
}




/* echo "<pre>";
echo    print_r($query);
echo "</pre>"; */




/* echo "<pre>";
echo    print_r($connect);
echo "</pre>"; */

mysqli_close($connect);
