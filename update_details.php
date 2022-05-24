<?php
require_once "config_demo.php";
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$sql = "SELECT * FROM persons WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);




if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "UPDATE persons SET first_name=?, last_name=?, email=?  WHERE id=?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssi", $first_name,$last_name, $email, $id_param);
        $id_param= $id;
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];

        if (mysqli_stmt_execute($stmt)) {
            // Records updated successfully. Redirect to landing page
            header("location: retrieve.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}
?>

<html>
<head>
    <title>Update page</title>
</head>
<body>
<form method="post" action="">
    <input type="text" name="first_name" value="<?php echo $row["first_name"] ?>"><br>
    <input type="text" name="last_name" value="<?php echo $row["last_name"] ?>"><br>
    <input type="email" name="email" value="<?php echo $row["email"] ?>"><br>
    <input type="submit" value="Update">
</form>
</body>
</html>