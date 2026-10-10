<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$server = "127.0.0.1";
$username = "root";
$password = "";
$database = "trip";

$con = mysqli_connect($server,$username, $password,$database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {$name = $_POST['name'] ?? '';$age = !empty($_POST['age']) ? (int)$_POST['age'] : 0;
    $gender =$_POST['gender'] ?? '';
    $email =$_POST['email'] ?? '';
    $phone =$_POST['phone'] ?? '';
    $desc =$_POST['desc'] ?? '';

    $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `other`) 
            VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc')";

    if (mysqli_query($con,$sql)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Please submit the form from index.html";
}

mysqli_close($con);
?>