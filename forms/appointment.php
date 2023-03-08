<?php

$link=mysqli_connect("127.0.0.1", "root", "", "project-db") or die("Failed connection");
if($_SERVER["REQUEST_METHOD"] == "POST"){
$param_nume=$_POST["nume"];
    $param_email=$_POST["email"];
    $param_telefon=$_POST["telefon"];
    $param_data=$_POST["data"];
    $param_zile=$_POST["zile"];



    $sql = "INSERT INTO book (nume, email, telefon, data, zile) VALUES ( ?, ?, ?, ?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
     mysqli_stmt_bind_param($stmt, "sssss", $param_nume, $param_email, $param_telefon, $param_data, $param_zile);

          if(mysqli_stmt_execute($stmt))
              echo "Your reservation was successfully recorded!";
         else
                echo "Something went wrong.";

        mysqli_stmt_close($stmt);
    }
}
mysqli_close($link);

?>
