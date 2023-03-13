<?php
// Check if form is submitted
if(isset($_POST['submit'])) {
    $info="";
	// Check if all fields are filled out
	if(!empty($_POST['username']) && !empty($_POST['useremail']) && !empty($_POST['yourpass']) && !empty($_FILES['profilePhoto']['name'])) {
		$name = $_POST['username'];
		$email = $_POST['useremail'];
		$password = $_POST['yourpass'];
		$profile_picture = $_FILES['profilePhoto']['name'];

		// Check if email is valid
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

			// Create a unique filename for the profile picture
			$timestamp = date('YmdHis');
			$extension = pathinfo($profile_picture, PATHINFO_EXTENSION);
			$profile_picture_name = 'uploads/'.$timestamp.'.'.$extension;

			// Save the profile picture to the server
			move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $profile_picture_name);

			// Save user's name, email, and profile picture filename to CSV file
			$user_data = array($name, $email, $profile_picture_name);
			$file = fopen('users.csv', 'a');
			fputcsv($file, $user_data);
			fclose($file);

		} else {
			$info= 'Invalid email format';
		}

	} else {
		$info= 'All fields are required';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" />
    <style>
        .form-container{
            background: #eee;
            padding: 25px;
        }
    </style>
</head>
<body>
   
    <div class="container">
        
        <p class="text-center text-success"><?php if(isset($info)){
            echo $info;
        }?></p>
        <div class="row">
            <div class="col-md-4">
                <div class="form-container">
                    <h2 class="text-center">Please Fill This Form</h2>
                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]?>" enctype="multipart/form-data">
                        <div class="form-group my-3">
                            <input type="text" class="form-control" name="username" placeholder="Your Name">
                        </div>
                        <div class="form-group my-3">
                            <input type="email" class="form-control" name="useremail" placeholder="Your Email">
                        </div>
                        <div class="form-group my-3">
                            <input type="password" class="form-control" name="yourpass" placeholder="Your Password">
                        </div>
                        <div class="form-group my-3">
                            <input type="file" class="form-control" name="profilePhoto">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $file = fopen('users.csv', 'r');
                        while (($data = fgetcsv($file)) !== FALSE) {
                            ?>
                            <tr>
                                <td><img src="<?= $data[2]?>" width="50px"></td>
                                <td><?= $data[0]?></td>
                                <td><?= $data[1]?></td>
                            </tr>
                            <?php
                        }
                        fclose($file);
			        ?>
            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>