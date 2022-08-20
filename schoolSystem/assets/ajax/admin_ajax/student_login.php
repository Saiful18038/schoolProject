<?php
   session_start();
   include '../../conn/conn.php';
    $id = $_POST['u_name'];
    $password = $_POST['password'];
    $userSearch = "SELECT * FROM student where student_id = '$id' and Pass = '$password'";
    $querySearch = mysqli_query($conn,$userSearch);
    $userCount = mysqli_num_rows($querySearch);

    if($userCount){
    
         $_SESSION['id'] = $id;
       
            header("location:../../studentprofile.php");
     
    }
?>
