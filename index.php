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



                 <a class="btn btn-outline-success" href="singhout.php">SighOut</a>

            </div>
        </div>
    </nav>
</header>
<br>
<br>
<br>
<br>
<?php
/* Attempt Mysql server connection. Assuming you are running MySQL
server with default setting  (user 'root' with no password)*/
$link=mysqli_connect("localhost","root", "", "demo");
if($link===false){
    die("ERROR: could not connect". mysqli_connect_error());
}

$sql="SELECT * FROM persons";
if($result=mysqli_query($link,$sql)){
    if(mysqli_num_rows($result)>0){
        echo"<table border='1'>";
        echo"<tr>";
        echo"<th>id</th>";
        echo"<th>First Name</th>";
        echo"<th>Last Name</th>";
        echo"<th>Email</th>";
        echo"<th>Edit</th>";
        echo "<th>Delete</th>";

        echo"</tr>";
        foreach ($result as $row){
            echo"<tr>";
            echo"<td>".$row['id']."</td>";
            echo"<td>".$row['first_name']."</td>";
            echo"<td>".$row['last_name']."</td>";
            echo"<td>".$row['email']."</td>";
            echo '<td><a href="update_details.php?id=' . $row['id']. '">Edit</a></td>';
            echo '<td><a href="delete_details.php? id=' . $row['id'] .'">Delete</a> </td>';
            echo"</tr>";

        }
        echo"</table>";
        //Free Result Set

        mysqli_free_result($result);
    }else{
        echo"ERROR:Could not able to execute $sql.".mysqli_error($link);
    }
    mysqli_close($link);

}
?>