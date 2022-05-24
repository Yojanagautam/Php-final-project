<?php
//This script will handle login
//session_start();
//
//// check if the user is already logged in
//if(isset($_SESSION['username']))
//{
//    header("location: login1.php");
//    exit;
//}


$conn = mysqli_connect("localhost", "root", "", "yojana");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
// Prepare an insert statement
    $sql = "INSERT INTO `attandence`( `Name`, `Rollno`)VALUES(?,?)";
    if ($stmt = mysqli_prepare($conn, $sql)) {
// Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $name, $Rollno,);
        // set parameters
        $name = $_POST["name"];
        $Rollno = $_POST["Rollno"];

        mysqli_stmt_execute($stmt);


        echo "Records inserted successfully.";
    } else {
        echo "ERROR: Could not prepare query: $sql. " . mysqli_error($conn);

    }


// Close statement
    mysqli_stmt_close($stmt);

// Close connection
    mysqli_close($conn);
}
?>
<html>
<head>
    <title>
        Attendance
    </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="common.css" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><span style="color: #fd4c66;"><u>Attendance</u> </span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="attendence.php">Attendance</a>
                    </li>



                    <p><a class="btn btn-outline-success" href="singhout.php">SighOut</a></p>

            </div>
        </div>
    </nav>
</header>
<br>
<br>
<br>
<br>
<div class="container">
    <p class="login-text"><u> <b> <h1> ATTANDENCE</h1></b></u></p>
    <form class="login-email" method="post" action="attendence.php">
        <p class="login-text"></p>
        <div class="input-group">
            <input type="text" placeholder="name"  name="name" required>
        </div>
        <div class="input-group">
            <input type="text" placeholder="Rollno" name="Rollno"required>
        </div>
        <div class="input-group">
            <button  type="submit" class="btn">submit</button>
        </div>
    </form>
