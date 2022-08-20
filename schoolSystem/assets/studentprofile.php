<?php 
include '../assets/conn/conn.php';
session_start();
if(!isset($_SESSION['id'])){
  header("location:assets/admin_login.php");
}

$s_id= $_SESSION['id'];

$query = "SELECT* FROM student INNER JOIN exam ON student.student_id=exam.pid WHERE student.student_id=$s_id";
$run = mysqli_query($conn,$query);

      while($row=mysqli_fetch_array($run)){

            $st_id= $row['student_id'];
            $Fname= $row['fname'];
            $lastName= $row['lname'];
            $father= $row['father_name'];
            $e_year= $row['enroll_year'];
            $dateOfBirth= $row['dob'];
            $Gender= $row['gender'];
            $aca_year= $row['academic_year'];
            $class= $row['class'];
            
            //mark
            $bangla= $row['bangla'];
            $english= $row['english'];
            $math= $row['math']; 
            $moral= $row['moral'];
            $science= $row['science'];
            $social= $row['social'];
            $total= $bangla+$english+$math+$moral+$science+$social;
            $avg= $total/6;
        }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Info</title>
    <style>
                *{
                          box-sizing: border-box;
                      }
                    html,body{
                            overflow-x: hidden;
                            height: 100%;
                            background: #E4D1B9;
                            font-family: 'Open Sans', sans-serif;
                        }
                        body{
                            font-size:16px;
                            color: Black;
                            background-color: #E4D1B9;            
                            padding: 0;
                            margin: 0;
                        }
                        h1{
                          font-family:Time new roman;
                          font-size:50px;
                          text-shadow: 2px 2px #ff0000;                        
                        }
                      .tbl,.result{
                                
                                margin:0;
                                padding:0;
                                top: 100px;
                                width:95%;
                                left:20px;
                                color:dark;
                                border-collapse: collapse;
                                font-family:arial;
                                text-align:left;
                      }
                      .tbl,tr,td,th{
                                border:1px solid black;
                                text-align:center;
                      }
                      td{
                        padding: 5px;
                      }
                      th{
                        background-color:#CA8C41;
                        font-family:arial;
                      }
                      tr:nth-child(even) {
                                background: #8FBDD3;
                      }
                      .logoutBtn {
                              background-color: white;
                              border: 2px solid black;
                              color: tomato;
                              padding: 5px 10px;
                              text-align: center;
                              display: inline-block;
                              font-size: 20px;
                              margin: 10px 30px;
                              cursor: pointer;
                              text-decoration:none;
                              border-radius:5px;
                      }
                      
    </style>
  </head>
  
  <body>
                  <div class="admin_details_inner">
                     <a href="../assets/ajax/admin_ajax/logout.php" class="logoutBtn" id="logoutBtn">Logout</a>
                   </div>
                   <center>
                      <h1>Student Information</h1>
    <table class="tbl">
                <tr> 
                      <th>Student ID</th> <td><?php echo $st_id ;?></td> 
                </tr>
                <tr>
                      <th>First Name</th> <td><?php echo $Fname ;?></td>
                </tr>
                <tr>
                      <th>Lastname</th> <td><?php echo $lastName ;?></td>
                </tr>
                <tr>
                      <th>Full Name</th> <td><?php echo $Fname." ".$lastName ;?></td>
                </tr>
                <tr>
                      <th>Fathers Name</th> <td><?php echo $father ;?></td>
                </tr>
                <tr>
                      <th>Class</th> <td><?php echo $class ;?></td>
                </tr>
                <tr>
                      <th>Roll</th> <td>...</td>       
                </tr>
                <tr>
                      <th>Date Of Birth</th> <td><?php echo $dateOfBirth ;?></td>
                </tr>
                <tr>
                      <th>Gender</th> <td><?php echo $Gender ;?></td>
                </tr>
                <tr>
                      <th>Enroll Year</th> <td><?php echo $e_year ;?></td>
                </tr>
                <tr>
                      <th>Year</th> <td><?php echo $aca_year ;?></td>
                </tr>
                <!-- <td><img src="../images/Didder.jpg" ></td> -->
    </table>


    <h1>Result</h1>
    <table class="result">
                <tr> 
                      <th>Bangla</th> <td><?php echo $bangla;?></td> 
                <tr>
                      <th>English</th> <td><?php echo $english;?></td>
                </tr>
                <tr>
                      <th>Mathmatics</th> <td><?php echo $math ;?></td>
                </tr>
                <tr>
                      <th>Moral Studies</th> <td><?php echo $moral ;?></td>
                </tr>
                <tr>
                      <th>Science</th> <td><?php echo $science ;?></td>
                </tr>
                <tr>
                      <th>Social</th> <td><?php echo $social ;?></td>
                </tr>
                <tr>
                      <th>Total</th>  <td><?php echo $total;?> </td>      
                </tr>
                <tr>
                      <th>GPA</th> <td><?php echo round($avg,2) ;?></td>
                </tr>        
                <!-- <td><img src="../images/Didder.jpg" ></td> -->
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>

  </body>
  </center>
</html>
