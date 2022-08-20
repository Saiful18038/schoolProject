<?php 
session_start();
if(!isset($_SESSION['username'])){
  header("location:assets/admin_login.php");
}

require 'conn.php';
          //search
          if(isset($_REQUEST['srcbtn']))
          {
            $valueToSearch = $_REQUEST['scarch'];

            $query ="SELECT * FROM exam INNER JOIN student ON student.student_id=exam.pid WHERE CONCAT(pid,class,fname) LIKE '%$valueToSearch%'";
            
            $search_result = filterTable($query);
          }
          else
            {
              $query="SELECT * FROM student INNER JOIN exam ON student.student_id=exam.pid";
              $search_result = filterTable($query);
            }
          function filterTable($query)
            {
            require 'conn.php';
            $filter_Result = mysqli_query($conn, $query);
            return $filter_Result;
            }
                       
            //delete  
            if(isset($_REQUEST['deleteid'])){
              
              $delete_id = $_REQUEST['deleteid'];
              $sql = "DELETE FROM exam WHERE pid=$delete_id";
                  if($query=mysqli_query($conn,$sql)==TRUE){
                    header("location:exam1.php");
                  }else {
              echo "Error deleting record: " . $conn->error;
            }
          }
            $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result</title>
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
                            font-size:22px;
                            color: Black;
                            background-color: #E4D1B9;            
                            padding: 0;
                            margin: 0;
                        }
                      .tbl{
                                position:absolute;
                                margin:0;
                                padding:0;
                                top: 200px;
                                width:95%;
                                left:20px;
                                color:dark;
                                border-collapse: collapse;
                                font-family:Brush Script Std;
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
                        font-family:Brush Script Std;
                      }
                      tr:nth-child(even) {
                                background: #8FBDD3;
                      }
                      .search {
                      width: 100%;
                      position: relative;
                      display: flex;

                    }
                    .searchTerm {
                      width: 400px;
                      border: 3px solid #00B4CC;
                      border-right: none;
                      padding: 10px;
                      height: 35px;
                      border-radius: 10px;
                      outline: none;
                      color: #9DBFAF;
                      font-size:20px;
                      font-family:Brush Script Std;
                      box-shadow: 0 6px 6px rgba(0, 0, 0, 0.6);
              }
                    .searchTerm:focus{
                      color: #00B4CC;
                    }
                    .searchButton {
                      width: 80px;
                      height: 35px;
                      border: 3px solid #00B4CC;
                      background: black;
                      text-align: center;
                      color: red;
                      border-radius: 10px;
                      cursor: pointer;
                      font-size: 20px;
                      font-family:Brush Script Std;
                      outline: none;
                      box-shadow: 0 6px 6px rgba(0, 0, 0, 0.6);
                    }
                    .searchButton:hover{
                      background:green;
                      color:yellow;
                      border: 3px solid yellow;
                      box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
                    }
                    .wrap{
                      position: absolute;
                      top: 150px;
                      left: 50%;
                      transform: translate(-50%, -50%);
                    } 
                    .home{
                      padding:0;
                      margin:0;
                      position:fixed;
                      left:20px;
                      top:40px;
                      cursor: pointer;
                      border: 1px solid #3498db;
                      border-radius:20px;
                      background-color: transparent;
                      height: 50px;
                      width: 200px;
                      color: #black;
                      font-size: 22px;
                      font-family:Brush Script Std;
                      box-shadow: 0 6px 6px rgba(0, 0, 0, 0.6);
                      transition-duration: 0.8s;
                  }
                  .home:hover{
                      background-color:green;
                      color:white;
                      box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
                  }
                  .update{
                      border: 2px solid black;
                      border-radius:8px;
                      background: #FFD24C;
                      text-align: center;
                      color: black;
                      cursor: pointer;
                      font-size: 22px;
                      /*font-family:'Brush Script MT','cursive';*/
                      outline: none;
                      text-decoration:none;
                    }
                    .del{
                      border: 2px solid black;
                      border-radius:8px;                      
                      background: red;
                      text-align: center;
                      color: black;
                      cursor: pointer;
                      font-size: 22px;
                      outline: none;
                      text-decoration:none;
                  }                
    </style>
</head>
<body>
<input type="button" class="home" onclick="location.href='index.php';" value="Go to Homepage" />

        <center>
        <h1 style="font-family:Brush Script Std;">Tabulation Sheet</h1>
<div class="wrap">
   <div class="search">
        <form action="" method="GET">
        <input type="text" name="scarch" class="searchTerm" placeholder="Search student by name, class or ID" > 
        <button type="submit" name="srcbtn" class="searchButton">
        </i>
        Search  
  </button>      
   </div>
</div>     
            <?php
                            echo  '<table class="tbl">
                                <tr>
                                    <th>Student Name</th>
                                      <th>Student ID</th>
                                    <th>Class</th>
                                      <th>Bangla</th>
                                    <th>English</th>
                                      <th>Math</th>
                                    <th>Moral Studies</th>
                                      <th>Science</th>
                                    <th>Social Science</th>       
                                      <th>Action</th>
                            </tr>';
                                          while($data=mysqli_fetch_assoc($search_result)){
                                                $name = $data['fname'];
                                                  $id = $data['pid'];
                                                $class = $data['class'];
                                                  $bangla = $data['bangla'];
                                                $english = $data['english'];
                                                  $math = $data['math'];
                                                $moral = $data['moral'];
                                                  $science = $data['science'];
                                                $social = $data['social'];
       echo "<tr>
                    <td> $name </td>
                    <td> $id </td>
                    <td> $class </td>
                    <td> $bangla </td>
                    <td> $english </td>
                    <td> $math </td>
                    <td> $moral </td>
                    <td> $science </td>
                    <td> $social </td>
                    <td>
                          <span>
                                  <a href='edit.php?editid=$id' class='update'>Update</a>
                          </span>
                          <span>
                                  <a href='exam1.php?deleteid=$id' class='del'>Delete</a>
                          </span>
                    </td>
              </tr>";
             }
             echo "</table>";
        ?> 
        </center>
      </form>
</body>
</html>