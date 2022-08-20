
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/admin_login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" 
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Admin Login</title>
</head>
<style>
    .login_page .row2 .right{
    justify-content:space-around;
    }
.login_page .row2 .right .admin_form {
  display: flex;
  overflow:hidden;
  position: relative;

}
.login_page .row2 .right .student {
  display: flex;
  overflow:hidden;
  position: relative;

}
.login_page .row2 .right .teacher {
  display: flex;
  overflow:hidden;
  position: relative;

}
.login_page .row2 .right .admin_form .form1 h1 {
  text-align: center;
  margin-bottom: 20px;
}
.login_page .row2 .right .student .form2 h1 {
  text-align: center;
  margin-bottom: 20px;
}
.login_page .row2 .right .teacher .form3 h1 {
  text-align: center;
  margin-bottom: 20px;
}
.login_page .row2 .right .admin_form  .form1{
    border: 1px solid #ddd;
    /* position: absolute; */
 padding: 20px;
}
.login_page .row2 .right .student  .form2{
    border: 1px solid #ddd;
    /* position: absolute; */

 padding: 20px;
}
.login_page .row2 .right .teacher  .form3{
    border: 1px solid #ddd;
    /* position: absolute; */

 padding: 20px;
}
.login_page .row2 .right .admin_form .form1 input[type="text"],
input[type="password"] {
  width: 100%;
  margin-top: 10px;
  margin-bottom: 20px;
  outline:none;
  border:none;
  box-shadow:none;
  background-color: #f0f1f3;
  padding: 15px;
}
.login_page .row2 .right .student .form2 input[type="text"],
input[type="password"] {
  width: 100%;
  margin-top: 10px;
  margin-bottom: 20px;
  outline:none;
  border:none;
  box-shadow:none;
  background-color: #f0f1f3;
  padding: 15px;
}
.login_page .row2 .right .teacher .form3 input[type="text"],
input[type="password"] {
  width: 100%;
  margin-top: 10px;
  margin-bottom: 20px;
  outline:none;
  border:none;
  box-shadow:none;
  background-color: #f0f1f3;
  padding: 15px;
}
.login_page .row2 .right .admin_form .form1 input[type="submit"] {
  padding: 0px 20px;
  margin: 20px 0px;
  cursor: pointer;
  background-color: yellowgreen;
  color:#fff;
  font-size:17px;
  line-height:29px;
  border:1px solid yellowgreen;
  transition:0.5s;
}
.login_page .row2 .right .student .form2 input[type="submit"] {
  padding: 0px 20px;
  margin: 20px 0px;
  cursor: pointer;
  background-color: yellowgreen;
  color:#fff;
  font-size:17px;
  line-height:29px;
  border:1px solid yellowgreen;
  transition:0.5s;
}
.login_page .row2 .right .teacher .form3 input[type="submit"] {
  padding: 0px 20px;
  margin: 20px 0px;
  cursor: pointer;
  background-color: yellowgreen;
  color:#fff;
  font-size:17px;
  line-height:29px;
  border:1px solid yellowgreen;
  transition:0.5s;
}
.login_page .row2 .right .admin_form .form1 input[type="submit"]:hover{
    background-color:transparent;
    color:#000;
}
.login_page .row2 .right .student .form2 input[type="submit"]:hover{
    background-color:transparent;
    color:#000;
}
.login_page .row2 .right .teacher .form3 input[type="submit"]:hover{
    background-color:transparent;
    color:#000;
}
.login_page .row2 .right .admin_form .form1 a{
   text-decoration:none;
}
/* center login form start here===================== */
.login_page .row2 .right .admin_form_center{
    width:200px;
    text-align:center;
    color:yellowgreen;
}
.login_page .row2 .right .admin_form_center img{
    width:100%;
}

</style>
<body>
    <div class="login_page">
        <div class="row">
            <div class="left">
              
            </div>
            <div class="right">
               
            </div>
        </div>
        <div class="row2">
            <div class="left">
                <h3>Welcome To</h3>
				<br/>
                <h2>𝙈𝙖𝙣𝙖𝙧𝙖𝙩 𝙄𝙣𝙩𝙚𝙧𝙣𝙖𝙩𝙞𝙤𝙣𝙖𝙡 𝙎𝙘𝙝𝙤𝙤𝙡</h2>
				<br/>
                
				
				<p>  Khagan Asulia Dhaka</p>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<p Style="color:black; font-size:20px;">  &copy; Copy Right. Md Jahid Hasan Juel
                </p>
				<br/>
            </div>
            <div class="right">
                <div class="admin_form">
                    
                    <form class="form1" action="../assets/ajax/admin_ajax/login.php" method="POST">
                    <h1>Admin Login</h1>
                        <label for="u_name">User Name</label><br>
                        <input type="text" id="u_name" name="u_name"><br>
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="password">
                    
                        <!-- <br />
                             <input type="checkbox" id="psw" onclick="showPassLogin()" />
                             <label for="pass">Show Password</label> -->

                        <br>
                        <input type="submit" name='submit' value="Login">
                        <br>
                    </form>
                </div>

                <div class="student">
                    
                    <form class="form2" action="../assets/ajax/admin_ajax/student_login.php" method="POST">
                    <h1>Student Login</h1>
                        <label for="id">Student ID</label><br>
                        <input type="text" id="u_name" name="u_name"><br>
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="password">
                    
                        <br />
                             <!-- <input type="checkbox" id="psw" onclick="showPassLogin()" />
                             <label for="pass">Show Password</label>

                        <br> -->
                        <input type="submit" name='submit' value="Login">
                        <br>
                    </form>
                </div>
                <div class="teacher">
                    
                    <form class="form3" action="../assets/ajax/admin_ajax/teacher_login.php" method="POST">
                    <h1>teacher Login</h1>
                        <label for="u_name">User Name</label><br>
                        <input type="text" id="u_name" name="u_name"><br>
                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="password">
                    
                        <br />
                             <!-- <input type="checkbox" id="psw" onclick="showPassLogin()" />
                             <label for="pass">Show Password</label>

                        <br> -->
                        <input type="submit" name='submit' value="Login">
                        <br>
                    </form>
                </div>

                </div>
            </div>
        </div>
		
    </div>
    <div id="login_after_signup"></div>
    <script>
        function showPassLogin() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    //   function showPassSignUp() {
    //     var x = document.getElementById("c_password");
    //     if (x.type === "password") {
    //       x.type = "text";
    //     } else {
    //       x.type = "password";
    //     }
    //   }
    </script>

        <script src="../js/admin_login.js">

        </script>

</body>
</html>