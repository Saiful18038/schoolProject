

<!DOCTYPE html>
<html>
<head>

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

              if(isset($_REQUEST['pid'])&& isset($_REQUEST['bangla']) && isset($_REQUEST['english']) && isset($_REQUEST['math']) 
                && isset($_REQUEST['moral'])&& isset($_REQUEST['science'])&& isset($_REQUEST['social'])){
      
                  $id = $_REQUEST['pid'];

                  $check_duplicate_id="SELECT student_id FROM student WHERE student_id='$id' ";
                  $result=mysqli_query($conn,$check_duplicate_id);
                  $count = mysqli_num_rows($result);
                  
                  if($count <= 0){

                              echo "<center><h2> Invalid student ID !!! </h2></center>";

                  }else{

                      $bangla = $_REQUEST['bangla'];
                      $english = $_REQUEST['english'];
                      $math = $_REQUEST['math'];
                      $moral = $_REQUEST['moral'];
                      $science = $_REQUEST['science'];
                      $social = $_REQUEST['social'];
                


                    $sql = "INSERT INTO exam(pid,Bangla,English,Math,Moral,Science,Social) 
                    VALUES('$id','$bangla','$english','$math','$moral','$science','$social')";
                    //FOREIGN KEY (i_id) REFERENCES items(i_id),
                          if(mysqli_query($conn, $sql)){
                                  echo "<center><h4>successfully inserted</h4></center>";
                          }else {
                                  echo "ERROR";   
                                }
      }
    }    
     
    
  
    ?>
    <input type="button" class="home" onclick="location.href='index.php';" value="Go to Homepage" />
    <center>
    <h1 style="font-family:comic sans ms">Mark Entry</h1>
<form action="" method="POST">
  <section class="center-text">
    
      <div class="Entry">
            <fieldset class="all">
              <div class="form-group">
                <label for="Student ID">Student ID:&emsp;&nbsp;&nbsp;</label>
                <input type="text" class="form-control" name="pid" placeholder="Student ID" required>
              </div>
              <div class="form-group">
                <label for="bangla">Bangla:&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" class="form-control" name="bangla">
              </div>
              <div class="form-group">
                <label for="english">English:&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" class="form-control" name="english">
              </div>
                <div class="form-group">
                <label for="math">Math:&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</label>
                <input type="text" class="form-control" name="math">
              </div>
              <div class="form-group">
                <label for="moral">Moral Studies:&nbsp;&nbsp;</label>
                <input type="text" class="form-control" name="moral">
              </div>
              <div class="form-group">
                <label for="science">Science:&nbsp;&nbsp;&emsp;&emsp;&nbsp;&nbsp;</label>
                <input type="text" class="form-control" name="science">
              </div>
              <div class="form-group">
                <label for="social">Social Science:&nbsp;</label>
                <input type="text" class="form-control" name="social">
              </div>
            </fieldset>
        </div>
        <input class="btn" type="submit" name="btn" value="Insert">
    </div>
  </section>
</form>
</center>
</body>
</html>
