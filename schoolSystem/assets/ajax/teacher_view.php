
<?php 
include '../conn/conn.php';
session_start();
if(!isset($_SESSION['id'])){
  header("location:../admin_login.php");
}

$id= $_SESSION['id'];

$query = "SELECT* FROM teacher WHERE teacher.id=$id";
$run = mysqli_query($conn,$query);

      while($row=mysqli_fetch_array($run)){

            $t_id= $row['id'];
            $Fname= $row['fname'];
            $lastName= $row['lname'];
            $address= $row['address'];
            $Qulification= $row['qualification'];
            $Phone= $row['phone'];
            $Gender= $row['gender'];


        }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teachers Info</title></title>
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
                      .tbl{
                                
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
                  <div class="admin_details_inner">
                     <a href="../ajax/admin_ajax/logout.php" class="logoutBtn" id="logoutBtn">Logout</a>
                   </div>
  <center>
  <body>
                      <h1>Teacher Information</h1>
    <table class="tbl">
                <tr> 
                      <th>Teacher ID</th> <td><?php echo $t_id ;?></td> 
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
                      <th>Address</th> <td><?php echo $address ;?></td>
                </tr>
                <tr>
                      <th>Educational Qulification</th> <td><?php echo $Qulification ;?></td>
                </tr>
                <tr>
                      <th>Phone</th> <td><?php echo $Phone ;?></td>       
                </tr>

                <tr>
                      <th>Gender</th> <td><?php echo $Gender ;?></td>
                </tr>


                
    </table>



                      <h1>Input Student marks</h1>
                      <button id="loadPage">Click</button>
                      
                      <div id="markPage">
                        <!-- markinput.php page will load hare!!! -->
                        

                  </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>            
            <script src="mark.js"></script>
</body>
</html>

