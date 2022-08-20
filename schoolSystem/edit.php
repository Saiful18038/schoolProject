<?php 
session_start();
if(!isset($_SESSION['username'])){
  header("location:assets/admin_login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<!-- hello -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Student Mark Entry</title>

  <style>

          body{

            background-image: linear-gradient(yellowgreen,lightgreen);
          }
          .all{

            margin: auto;
            width: 30%;
            padding: 10px;

          }

          .form-control{

            padding:10px;
            margin:10px;
            border-radius:10px;
            width:35%;
            font-family:inherit;
            font-size: inherit;
      

            
          }

          .form-control:hover{

            background-color:rgb(224, 214, 228);
            color:white;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
              }

          .btn{

                    border:0;
                    border-bottom:1px solid yellowgreen;
                    padding:10px;
                    border:0;
                    box-shadow:0 0 15px 4px rgba(0,0,0,0.3);
                    margin:20px;
                    padding:10px;
                    border-radius:20px;
                    width:100px;
                    font-family:comic sans ms;
                    font-size: 20px;
                    font-weight: bold;
                    background-color: yellowgreen;
                    transition-duration: 0.8s;

                  }
.btn:hover{

background-color:green;
color:white;
box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

label{

  font-family:comic sans ms;
                    font-size: 20px;
                    font-weight: bold;

}
.all{

  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);


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
            font-size: 1.5em;
            box-shadow: 0 6px 6px rgba(0, 0, 0, 0.6);
            transition-duration: 0.8s;
          }
  .home:hover{

            background-color:green;
            color:white;
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
            }

  </style>

    
</head>
<body>

    <?php

    include "conn.php";

                  //update
                  if(isset($_REQUEST['editid'])){
                            
                    $edit_id = $_REQUEST['editid'];
                    $db_ID = "SELECT * FROM exam WHERE pid=$edit_id";
                    $query=mysqli_query($conn,$db_ID);
                          //header("location:exam1.php");
                     $data = mysqli_fetch_assoc($query);

                     $bangla = $data['bangla'];
                     $english = $data['english'];
                     $math = $data['math'];
                     $moral = $data['moral'];
                     $science = $data['science'];
                     $social = $data['social'];       
                  }  

              if(isset($_REQUEST['id']) && isset($_REQUEST['bangla']) && isset($_REQUEST['english']) && isset($_REQUEST['math']) 
                  && isset($_REQUEST['moral'])&& isset($_REQUEST['science'])&& isset($_REQUEST['social'])){
                      $id = $_REQUEST['id'];
                      $bangla = $_REQUEST['bangla'];
                      $english = $_REQUEST['english'];
                      $math = $_REQUEST['math'];
                      $moral = $_REQUEST['moral'];
                      $science = $_REQUEST['science'];
                      $social = $_REQUEST['social'];     
                    
                    $sql1 = "UPDATE exam SET bangla='$bangla', english='$english',
                            math='$math', moral='$moral', science ='$science', social='$social'
                            WHERE pid = '$id' ";
                    
                    if(mysqli_query($conn, $sql1)==TRUE){
                            echo "<center><h4>successfully updated</h4></center>";
                    }else {
                            echo "Not updated!!!";   
                          }
      }
    ?>
    <input type="button" class="home" onclick="location.href='exam1.php';" value="Result Show" />
    <center>
    <h1 style="font-family:comic sans ms">Update Marks</h1>
<form action="" method="POST">
  <section class="center-text">
      <div class="Entry">
            <fieldset class="all">
                <input type="text" name="id" value="<?php echo $edit_id?>" hidden>
              <div class="form-group">
                <label for="bangla">Bangla:&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" class="form-control" name="bangla" value="<?php echo $bangla?>">
              </div>
              <div class="form-group">
                <label for="english">English:&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" class="form-control" name="english" value="<?php echo $english?>">
              </div>
                <div class="form-group">
                <label for="math">Math:&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</label>
                <input type="text" class="form-control" name="math" value="<?php echo $math?>">
              </div>
              <div class="form-group">
                <label for="moral">Moral Studies:&nbsp;&nbsp;</label>
                <input type="text" class="form-control" name="moral" value="<?php echo $moral?>">
              </div>
              <div class="form-group">
                <label for="science">Science:&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;</label>
                <input type="text" class="form-control" name="science" value="<?php echo $science?>">
              </div>
              <div class="form-group">
                <label for="social">Social Science:&nbsp;</label>
                <input type="text" class="form-control" name="social" value="<?php echo $social?>">
              </div>
            </fieldset>
        </div>
        <input class="btn" type="submit" name="btn" value="Update">
    </div>
  </section>
</form>
</center>
</body>
</html>
