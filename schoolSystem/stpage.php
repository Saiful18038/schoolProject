
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="schoolSystem";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection

// $sql = "SELECT * FROM student ORDER BY student_id DESC";
// $data =mysqli_query($conn, $sql);
// $row =mysqli_fetch_assoc($data);

// $firstname=$row['student_id'];
// $image= $row['image'];

// echo $firstname;
// echo "<img src='images/Didder.jpg'>";
// echo $image;

error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./images/" . $filename;

	// $db = mysqli_connect("localhost", "root", "", "geeksforgeeks");

	// Get all the submitted data from the form
	$sql = "INSERT INTO student (image) VALUES ('$filename')";

	// Execute query
	mysqli_query($conn, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Image uploaded successfully!</h3>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
}



?>
<!DOCTYPE html>
<html>

<head>
	<title>Image Upload</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css" />


</head>

<body>
	<div id="content">
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
			</div>
		</form>
	</div>
	<div id="display-image">
	<?php
		$query = " select * from student ";
		$result = mysqli_query($conn , $query);

		while ($data = mysqli_fetch_assoc($result)) {
	?>
		<img src="./images/<?php echo $data['image']; ?>">

	<?php
		}
	?>
	</div>
</body>

</html>





