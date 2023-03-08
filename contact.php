<?php

$link=mysqli_connect("127.0.0.1", "root", "", "project-db") or die("Failed connection");
if($_SERVER["REQUEST_METHOD"] == "POST"){
 $param_nume=$_POST["nume"];
  $param_email=$_POST["email"];
     $param_subiect=$_POST["subiect"];
     $param_mesaj=$_POST["mesaj"];
    
$sql = "INSERT INTO contact (nume, email, subiect, mesaj) VALUES ( ?, ?, ?, ?)";
    
     if($stmt = mysqli_prepare($link, $sql)){
          mysqli_stmt_bind_param($stmt, "ssss", $param_nume, $param_email, $param_subiect, $param_mesaj);
         if(mysqli_stmt_execute($stmt))
      header("location: ../mesaj_trimis.html");
         else
         echo "Something went wrong";
          mysqli_stmt_close($stmt);
    }
}

    mysqli_close($link);
?>
